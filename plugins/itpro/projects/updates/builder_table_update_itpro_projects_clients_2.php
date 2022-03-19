<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsClients2 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->string('email', 191)->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_clients', function($table)
        {
            $table->smallInteger('email')->nullable(false)->unsigned(false)->default(null)->change();
        });
    }
}
