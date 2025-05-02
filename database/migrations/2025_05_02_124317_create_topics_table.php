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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->enum('type', ['text', 'video', 'quiz', 'assignment'])->default('text')->comment('text, video, quiz, assignment');
            $table->string('file')->nullable();
            $table->string('order')->nullable()->comment('Order of the topic in the course');
            $table->boolean('status')->default(0)->comment('0 = inactive, 1 = active');
            $table->boolean('is_free')->default(0)->comment('0 = paid, 1 = free');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topics');
    }
};
