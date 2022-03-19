<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders5 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->string('file')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->dropColumn('file');
        });
    }
}
