<?php namespace DmitryChuvakov\Planb\Components;

use Cms\Classes\ComponentBase;
use ApplicationException;
use DmitryChuvakov\Planb\Models\Poll;
use DmitryChuvakov\Planb\Models\PollItem;
use DmitryChuvakov\Planb\Models\Vote;
use Response;
use Carbon\Carbon;


class PlanB extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'План Б Голосование',
            'description' => 'Выводит голосование.'
        ];
    }

    // This array becomes available on the page as {{ component.posts }}
    public function polls()
    {
        $polls = Poll::where('activated', true)->with(['items' => function ($query) {
                    $query->withCount('votes')->orderBy('votes_count', 'desc');
                }])->get();

        return $polls;
    }

    public function pollsWithoutSort()
    {
        $polls = Poll::where('activated', true)->get();

        return $polls;
    }

    public function onPoll()
    {
        if (post('item_id') == null) return 0;
        $ip = $_SERVER['REMOTE_ADDR'];
        $itemId = post('item_id');
        $resolution = post('resolution_height') . post('resolution_width');
        $dateNow = Carbon::now();
        $return = [];

        $pollId = PollItem::find($itemId);

        $vote = Vote::whereHas('item', function ($query) use ($pollId) {
                        $query->where('poll_id', $pollId->poll_id);
                    })
                    ->where('ip', $ip)
                    ->where('resolution', $resolution)
                    ->whereDate('created_at', '=', $dateNow)->count();

        if ($vote > 0) {
            $return = [
                'success' => false,
                'message' => 'Голосовать можно только 1 раз в сутки!',
                'votes' => $vote,
                'date_now' => $dateNow->toDateTimeString(),
            ];
        } else {
            $saveVote = new Vote();
            $saveVote->ip = $ip;
            $saveVote->resolution = $resolution;
            $saveVote->item_id = $itemId;
            $saveVote->save();

            $return = [
                'success' => true,
                'message' => 'Ваш голос учтён!',
            ];
        }


        return Response::json($return, 200);
    }
}