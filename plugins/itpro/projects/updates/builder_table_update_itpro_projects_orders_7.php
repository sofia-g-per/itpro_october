<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders7 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->smallInteger('status_id')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->smallInteger('status_id')->nullable(false)->change();
        });
    }
}
