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
            $table->dropColumn('id');
        });

        Schema::table('users', function(Blueprint $table) {
            $table->uuid('id')->primary();
            $table->enum('role', ['customer', 'artist', 'moderator', 'admin'])->default('customer')->after('email');
            $table->enum('status', ['ativo', 'inativo'])->default('ativo')->after('role');
            $table->string('avatar')->nullable()->after('status');
            $table->text('bio')->nullable()->after('avatar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['id','role','status','avatar','bio']);
            $table->id();
        });
    }
};
