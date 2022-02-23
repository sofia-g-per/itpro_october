<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjects extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->integer('technology_id');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->dropColumn('technology_id');
        });
    }
}
