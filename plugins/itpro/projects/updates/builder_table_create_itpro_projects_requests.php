<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsRequests extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_requests', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('description');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->dateTime('manager_defined_at')->nullable();
            $table->dateTime('completed_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_requests');
    }
}
