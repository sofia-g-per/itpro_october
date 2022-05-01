<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsVrheadsets extends Migration
{
    public function up()
    {
        Schema::rename('itpro_projects_vr_headsets', 'itpro_projects_vrheadsets');
    }
    
    public function down()
    {
        Schema::rename('itpro_projects_vrheadsets', 'itpro_projects_vr_headsets');
    }
}
