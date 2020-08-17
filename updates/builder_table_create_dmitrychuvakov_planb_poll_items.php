<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateDmitrychuvakovPlanbPollItems extends Migration
{
    public function up()
    {
        Schema::create('dmitrychuvakov_planb_poll_items', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->integer('poll_id')->nullable()->unsigned();
            $table->string('name');
            $table->integer('age')->unsigned();
            $table->string('city');
            $table->string('children');
            $table->integer('photo_id');
            $table->text('about');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('dmitrychuvakov_planb_poll_items');
    }
}
