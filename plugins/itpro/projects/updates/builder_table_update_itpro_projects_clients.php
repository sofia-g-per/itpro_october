<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsClients extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->dropColumn('phone');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->integer('phone');
        });
    }
}
