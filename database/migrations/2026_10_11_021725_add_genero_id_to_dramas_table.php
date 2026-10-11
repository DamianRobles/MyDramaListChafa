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
        Schema::table('dramas', function (Blueprint $table) {
            $table->foreignId('genero_id')
                ->nullable()
                ->after('estado')
                ->constrained('generos')
                ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('dramas', function (Blueprint $table) {
            $table->dropConstrainedForeignId('genero_id');
        });
    }
};
