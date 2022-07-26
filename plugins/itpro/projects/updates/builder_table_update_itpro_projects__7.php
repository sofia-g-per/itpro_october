<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjects7 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->text('cover_img');
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->dropColumn('cover_img');
        });
    }
}
