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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();
            $table->string('no_peserta')->unique();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('jenis_kelamin');
            $table->text('alamat')->nullable();
            $table->string('no_telepon')->nullable();
            $table->foreignId('skema_id')->constrained('skemas')->onDelete('cascade');
            $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
