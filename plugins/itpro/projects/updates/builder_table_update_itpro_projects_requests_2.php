<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsRequests2 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->integer('status_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->integer('status_id')->nullable(false)->change();
        });
    }
}
