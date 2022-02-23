<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsPlatforms extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_platforms', function($table)
        {
            $table->renameColumn('name', 'title');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_platforms', function($table)
        {
            $table->renameColumn('title', 'name');
        });
    }
}
