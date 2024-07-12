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
        Schema::create('priorities', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('level')->unique();
            $table->timestamps();
        });

        Schema::table('contacts', function (Blueprint $table) {
            $table->foreignId('priority_id')->references('id')->on('priorities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign('contacts_priority_id_foreign');
        });
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('priority_id');
        });
        Schema::dropIfExists('priorities');
    }
};
