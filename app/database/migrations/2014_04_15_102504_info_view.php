<?php

use Illuminate\Database\Migrations\Migration;

class Create_News_Table extends Migration {

    public function up() {
        Schema::table("news", function($table) {
            $table->create();
            $table->increments("id");
            $table->integer("heading_if", 255);
            $table->text("name");
            $table->text("text");
            $table->text("author");
            $table->timestamps();
        });
    }

    public function down() {
        Schema::drop("news");
    }

}
