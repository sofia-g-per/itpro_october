<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsTechnologies extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_technologies', function($table)
        {
            $table->renameColumn('name', 'title');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_technologies', function($table)
        {
            $table->renameColumn('title', 'name');
        });
    }
}
