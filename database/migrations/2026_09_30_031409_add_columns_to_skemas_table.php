<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            $table->string('kode_skema')->unique();
            $table->string('nama_skema');
            $table->text('deskripsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('skemas', function (Blueprint $table) {
            $table->dropColumn([
                'kode_skema',
                'nama_skema',
                'deskripsi',
            ]);
        });
    }
};