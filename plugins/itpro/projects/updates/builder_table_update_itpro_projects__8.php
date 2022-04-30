<?php namespace Itpro\Projects\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateItproProjects8 extends Migration
{
    public function up()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->text('cover_img')->nullable()->change();
        });
    }
    
    public function down()
    {
        Schema::table('itpro_projects_', function($table)
        {
            $table->text('cover_img')->nullable(false)->change();
        });
    }
}
