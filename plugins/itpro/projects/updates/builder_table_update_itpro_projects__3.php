<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjects3 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->text('images')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->dropColumn('images');
        });
    }
}
