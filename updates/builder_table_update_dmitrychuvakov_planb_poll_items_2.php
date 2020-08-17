<?php namespace DmitryChuvakov\Planb\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateDmitrychuvakovPlanbPollItems2 extends Migration
{
    public function up()
    {
        Schema::table('dmitrychuvakov_planb_poll_items', function($table)
        {
            $table->string('name', 255)->nullable()->change();
            $table->integer('age')->nullable()->change();
            $table->string('city', 255)->nullable()->change();
            $table->string('children', 255)->nullable()->change();
            $table->text('about')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('dmitrychuvakov_planb_poll_items', function($table)
        {
            $table->string('name', 255)->nullable(false)->change();
            $table->integer('age')->nullable(false)->change();
            $table->string('city', 255)->nullable(false)->change();
            $table->string('children', 255)->nullable(false)->change();
            $table->text('about')->nullable(false)->change();
        });
    }
}
