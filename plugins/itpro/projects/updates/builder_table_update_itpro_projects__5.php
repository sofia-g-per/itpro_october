<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjects5 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->dropColumn('video');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->text('video')->nullable();
        });
    }
}
