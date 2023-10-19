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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('message');

            //Restricción de clave foránea para la columna 'category_id'
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade') //Eliminación en cascada si la categoría se elimina
                ->onUpdate('cascade');//Actualización en cascada si el id de la categoría cambia

            //Restricción de clave foránea utilizando foreignId para la columna 'user_id'
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
        Schema::dropIfExists('posts');
    }
};
