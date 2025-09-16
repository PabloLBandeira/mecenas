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
            $table->string('phone1')->nullable()->change();
            $table->string('state')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('neighborhood')->nullable()->change();
            $table->string('street')->nullable()->change();
            $table->string('zip_code')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->string('phone1')->nullable(false)->change();
        $table->string('state')->nullable(false)->change();
        $table->string('city')->nullable(false)->change();
        $table->string('neighborhood')->nullable(false)->change();
        $table->string('street')->nullable(false)->change();
        $table->string('zip_code')->nullable(false)->change();
        });
    }
};
