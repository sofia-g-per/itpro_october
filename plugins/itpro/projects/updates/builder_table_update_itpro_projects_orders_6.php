<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders6 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->dropColumn('description');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->text('description');
        });
    }
}
