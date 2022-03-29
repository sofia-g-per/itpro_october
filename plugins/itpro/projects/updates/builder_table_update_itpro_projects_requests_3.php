<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsRequests3 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->integer('manager_id')->nullable();
            $table->dropColumn('manager_defined_at');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->dropColumn('manager_id');
            $table->dateTime('manager_defined_at')->nullable();
        });
    }
}
