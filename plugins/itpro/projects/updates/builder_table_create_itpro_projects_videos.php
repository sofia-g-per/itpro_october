<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsVideos extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_videos', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('url');
            $table->smallInteger('project_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_videos');
    }
}
