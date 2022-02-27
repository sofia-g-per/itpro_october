<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableDeleteItproProjectsVideos extends Migration
{
    public function up()
    {
        Schema::dropIfExists('itpro_projects_videos');
    }
    
    public function down()
    {
        Schema::create('itpro_projects_videos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('url', 191);
            $table->smallInteger('project_id');
        });
    }
}
