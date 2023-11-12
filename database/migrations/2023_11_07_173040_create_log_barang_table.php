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
        Schema::disableForeignKeyConstraints();

        Schema::create('log_barang', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user');
            $table->bigInteger('barang');
            $table->bigInteger('notes');
            $table->bigInteger('jumlah');
            $table->bigInteger('tanggal_pengembalian');
            $table->bigInteger('status');
            $table->bigInteger('status_approval');
            $table->bigInteger('notes_approval');
            $table->bigInteger('tanggal_approval');
            $table->bigInteger('approval_by');
            $table->bigInteger('created_at');
            $table->bigInteger('updated_at');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_barang');
    }
};
