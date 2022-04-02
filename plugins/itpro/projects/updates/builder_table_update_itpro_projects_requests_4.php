<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsRequests4 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->text('description')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_requests', function($table)
        {
            $table->text('description')->nullable(false)->change();
        });
    }
}
