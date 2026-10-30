
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Produk tetap ada, tetapi kategori lama dilepas.
        DB::table('products')->update([
            'category_id' => null,
        ]);

        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['store_id']);
            $table->dropColumn('store_id');
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->foreignId('store_id')
                ->nullable()
                ->constrained('stores')
                ->nullOnDelete();
        });
    }
};
