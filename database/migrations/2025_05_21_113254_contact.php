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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('comment')->nullable();
            $table->string('email')->unique();
            $table->timestamps();
        });

        Schema::create('contact_tag', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('contact')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('contact_tags');
        Schema::drop('contact');
    }
};
