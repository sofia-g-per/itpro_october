<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsOrders extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->dropColumn('name');
            $table->dropColumn('phone');
            $table->dropColumn('email');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_orders', function($table)
        {
            $table->string('name', 191);
            $table->integer('phone');
            $table->string('email', 191);
        });
    }
}
