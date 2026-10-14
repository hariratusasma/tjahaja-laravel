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
    Schema::create('produks', function (Blueprint $table) {
        $table->id();

        $table->foreignId('brand_id')->constrained()->cascadeOnDelete();

        $table->foreignId('kategori_id')->constrained('kategoris')->cascadeOnDelete();

        $table->string('nama_produk');

        $table->text('deskripsi')->nullable();

        $table->decimal('harga', 12, 2);

        $table->string('gambar')->nullable();

        $table->boolean('recommended')->default(false);

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
