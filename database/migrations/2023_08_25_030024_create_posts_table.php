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
            $table->string('title',255);
            $table->string('alias',255);
            $table->string('thumb', 255)->nullable();
            $table->unsignedBigInteger('cate_id');
            $table->foreign('cate_id')->references('id')->on('cates');
            $table->text('description')->nullable();
            $table->longText('contents');
            $table->binary('active')->nullable();
            $table->binary('ishot')->nullable();
            $table->binary('isnewfeed')->nullable();
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
