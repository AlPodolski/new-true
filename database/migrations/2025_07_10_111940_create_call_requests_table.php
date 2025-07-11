<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('call_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('posts_id');
            $table->string('name');
            $table->string('phone');
            $table->text('text')->nullable();
            $table->timestamps();

            $table->foreign('posts_id')->references('id')->on('posts')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('call_requests');
    }
};
