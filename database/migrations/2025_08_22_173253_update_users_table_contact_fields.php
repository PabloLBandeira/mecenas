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
            $table->dropColumn(['bio', 'avatar', 'status']);

            $table->string('phone1');
            $table->string('phone2')->nullable();
            $table->string('state');
            $table->string('city');
            $table->string('neighborhood');
            $table->string('street');
            $table->string('number')->nullable();
            $table->string('zip_code');
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->enum('status', ['ativo', 'inativo'])->default('ativo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'phone1',
                'phone2',
                'state',
                'city', 
                'neighborhood',
                'street',
                'number',
                'zip_code',
                'bio',
                'avatar',
                'role',
                'status'
            ]);
        });
    }
};
