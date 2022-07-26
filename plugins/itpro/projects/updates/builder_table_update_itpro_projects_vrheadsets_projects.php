<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsVrheadsetsProjects extends Migration
{
    public function up()
    {
        Schema::rename('itpro_projects_vr_headsets_projects', 'itpro_projects_vrheadsets_projects');
    }
    
    public function down()
    {
        Schema::rename('itpro_projects_vrheadsets_projects', 'itpro_projects_vr_headsets_projects');
    }
}
