<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders2 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->renameColumn('order_completed_at', 'completed_at');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->renameColumn('completed_at', 'order_completed_at');
        });
    }
}
