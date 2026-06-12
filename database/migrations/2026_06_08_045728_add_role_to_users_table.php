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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['guru', 'siswa', 'admin'])->default('siswa')->after('name');
            $table->string('nis')->nullable()->after('role'); // untuk siswa
            $table->string('nip')->nullable()->after('nis'); // untuk guru
            $table->string('no_hp')->nullable()->after('nip');
            $table->text('alamat')->nullable()->after('no_hp');
        }); 
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'nis', 'nip', 'no_hp', 'alamat']);
        });
    }
};
