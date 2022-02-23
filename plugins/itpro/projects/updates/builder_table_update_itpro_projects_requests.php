<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsRequests extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->integer('project_id');
            $table->integer('status_id');
            $table->integer('client_id');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->dropColumn('project_id');
            $table->dropColumn('status_id');
            $table->dropColumn('client_id');
        });
    }
}
