<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'penjual', 'pembeli'])
                ->default('pembeli')
                ->after('email');

            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])
                ->nullable()
                ->after('role');

            $table->date('tanggal_lahir')
                ->nullable()
                ->after('jenis_kelamin');

            $table->string('no_hp', 20)
                ->nullable()
                ->after('tanggal_lahir');

            $table->text('alamat')
                ->nullable()
                ->after('no_hp');

            $table->enum('status', ['active', 'pending', 'rejected'])
                ->default('active')
                ->after('alamat');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'jenis_kelamin',
                'tanggal_lahir',
                'no_hp',
                'alamat',
                'status',
            ]);
        });
    }
};