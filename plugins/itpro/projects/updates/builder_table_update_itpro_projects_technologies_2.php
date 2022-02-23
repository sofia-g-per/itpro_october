<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjectsTechnologies2 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_technologies', function($table)
        {
            $table->renameColumn('id', 'technology_id');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_technologies', function($table)
        {
            $table->renameColumn('technology_id', 'id');
        });
    }
}
