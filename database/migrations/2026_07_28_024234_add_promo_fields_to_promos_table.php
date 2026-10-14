<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('promos', function (Blueprint $table) {

            $table->string('kode_promo')->unique()->after('judul');

            $table->enum('jenis_diskon', ['persen', 'nominal'])
                  ->default('persen')
                  ->after('kode_promo');

            $table->decimal('nilai_diskon', 10, 2)
                  ->default(0)
                  ->after('jenis_diskon');

            $table->decimal('minimal_pembelian', 10, 2)
                  ->default(0)
                  ->after('nilai_diskon');

            $table->boolean('aktif')
                  ->default(true)
                  ->after('minimal_pembelian');

        });
    }

    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {

            $table->dropColumn([
                'kode_promo',
                'jenis_diskon',
                'nilai_diskon',
                'minimal_pembelian',
                'aktif'
            ]);

        });
    }
};