<?php namespace Genius\Banners\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateBannersTable extends Migration
{

    public function up()
    {
        Schema::create('genius_banners_banners', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('tag');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genius_banners_banners');
    }

}
