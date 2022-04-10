<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsTestKeys extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_test_keys', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('key')->nullable();
            $table->integer('status_id')->nullable();
            $table->date('given_at')->nullable();
            $table->dateTime('requested_at')->nullable();
            $table->date('expires_at')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_test_keys');
    }
}
