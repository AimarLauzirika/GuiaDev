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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('subject_id')->constrained();
            $table->foreignId('chapter_id')->nullable()->constrained();
            $table->boolean('public')->default(1);
            $table->boolean('finished')->default(1);

            $table->unique(['title', 'subject_id']);
            $table->unique(['description', 'subject_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
