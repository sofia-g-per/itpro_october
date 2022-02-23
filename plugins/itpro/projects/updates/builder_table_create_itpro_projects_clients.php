<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsClients extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_clients', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->integer('phone');
            $table->smallInteger('email');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_clients');
    }
}
