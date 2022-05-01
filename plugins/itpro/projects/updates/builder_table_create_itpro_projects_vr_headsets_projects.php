<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsVrHeadsetsProjects extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_vr_headsets_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('vr_headset_id');
            $table->integer('project_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_vr_headsets_projects');
    }
}
