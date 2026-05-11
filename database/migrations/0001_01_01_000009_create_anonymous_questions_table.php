<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anonymous_questions', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('category')->nullable();
            $table->boolean('is_answered')->default(false);
            $table->string('status')->default('pending');
            $table->integer('views')->default(0);
            $table->timestamps();
            $table->index('status');
            $table->index('is_answered');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anonymous_questions');
    }
};
