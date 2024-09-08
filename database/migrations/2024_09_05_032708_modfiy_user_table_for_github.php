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
            $table->string("password")->nullable()->change();
            $table->rememberToken()->nullable()->change();

            $table->addColumn('string', 'github_id')->nullable()->unique();
            $table->addColumn('string', 'github_token')->nullable();
            $table->addColumn('string', 'github_refresh_token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string("password")->nullable(false)->change();
            $table->rememberToken()->nullable(false)->change();

            $table->dropColumn('github_id');
            $table->dropColumn('github_token');
            $table->dropColumn('github_refresh_token');
        });
    }
};
