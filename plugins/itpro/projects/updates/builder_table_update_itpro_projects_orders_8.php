<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders8 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->integer('manager_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->dropColumn('manager_id');
        });
    }
}
