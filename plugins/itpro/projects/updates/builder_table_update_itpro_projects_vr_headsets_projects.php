<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsVrHeadsetsProjects extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_vr_headsets_projects', function($table)
        {
            $table->renameColumn('vr_headset_id', 'vrheadset_id');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_vr_headsets_projects', function($table)
        {
            $table->renameColumn('vrheadset_id', 'vr_headset_id');
        });
    }
}
