
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // Produk milik toko tertentu
            $table->foreignId('store_id')
                ->constrained('stores')
                ->cascadeOnDelete();

            // Kategori produk, boleh belum dipilih
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('categories')
                ->nullOnDelete();

            $table->string('nama_produk');
            $table->string('foto')->nullable();
            $table->decimal('harga', 12, 2);
            $table->text('deskripsi')->nullable();
            $table->unsignedInteger('stok')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
