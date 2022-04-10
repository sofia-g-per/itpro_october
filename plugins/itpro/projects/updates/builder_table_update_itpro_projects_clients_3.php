<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsClients3 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->integer('phone')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('organization')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->dropColumn('phone');
            $table->dropColumn('first_name');
            $table->dropColumn('surname');
            $table->dropColumn('organization');
        });
    }
}
