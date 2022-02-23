<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsPlatformsProjects extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_platforms_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('project_id');
            $table->integer('platform_id');
            $table->primary(['project_id','platform_id']);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_platforms_projects');
    }
}
