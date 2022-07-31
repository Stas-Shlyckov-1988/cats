<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('cats_has_file', function (Blueprint $table) {
            $table->id();
            $table->integer('cat_id');
            $table->integer('file_id');
            $table->index(['cat_id', 'file_id']);
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cats');
        Schema::dropIfExists('cats_has_file');
    }
};
