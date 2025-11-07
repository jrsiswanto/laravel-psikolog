<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tanya_jawab', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->text('pertanyaan');
            $table->text('jawaban')->nullable();
            $table->foreignId('psikiater_id')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['belum dijawab', 'sudah dijawab'])->default('belum dijawab');
            $table->string('kategori')->nullable();
            $table->bigInteger('views')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tanya_jawab');
    }
};
