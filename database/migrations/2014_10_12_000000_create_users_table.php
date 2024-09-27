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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('user_type')->comment('1=admin;2=customer');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('avatar')->nullable();
            $table->tinyInteger('status')->default(0)->comment('1=active;0=inactive');
            $table->rememberToken();
            $table->timestamps();
        });
        // Call seeder
        Artisan::call('db:seed', [
            '--class' => 'DatabaseSeeder',
            '--force' => true
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }

    

};
