<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateItproProjectsTestKeysProjects extends Migration
{
    public function up()
    {
        Schema::create('itpro_projects_test_keys_projects', function($table)
        {
            $table->engine = 'InnoDB';
            $table->integer('test_key_id');
            $table->integer('project_id');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('itpro_projects_test_keys_projects');
    }
}
