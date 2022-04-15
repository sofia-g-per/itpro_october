<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsTestKeysStatuses extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_test_keys_statuses', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_test_keys_statuses');
    }
}
