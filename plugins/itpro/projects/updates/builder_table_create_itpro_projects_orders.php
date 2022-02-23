<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsOrders extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_orders', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('name');
            $table->integer('phone');
            $table->string('email');
            $table->text('description');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->dateTime('manager_defined_at')->nullable();
            $table->dateTime('order_completed_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_orders');
    }
}
