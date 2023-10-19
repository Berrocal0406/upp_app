<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();

            $table->string('message');
            $table->string('video_path');//Campo para almacenar la ruta o nombre del archivo

            //Restricciones de clave foranea 
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade') //Eliminación en cascada si la categoría se elimina
                ->onUpdate('cascade');//Actualización en cascada si el id de la categoría cambia

            $table->foreignId('user_id')->references('id')->on('users')
                ->onDelete('cascade') //Eliminación en cascada si el usuario se elimina
                ->onUpdate('cascade');//Actualización en cascada si el id del usuario cambia


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
