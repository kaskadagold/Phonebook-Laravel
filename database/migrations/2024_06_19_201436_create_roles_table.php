<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('role_id')->nullable()->references('id')->on('roles')->nullOnDelete();
        });

        $role = Role::factory()->create();

        $user = User::factory()->create([
            'name' => 'admin',
            'email' => config('mail.admin.email'),
        ]);

        $user->role_id = $role->id;
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
};
