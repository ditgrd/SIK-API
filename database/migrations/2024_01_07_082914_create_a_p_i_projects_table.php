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
        Schema::create('api_projects', function (Blueprint $table) {
            $table->id();
            $table->string('nama_project');
            $table->string('client_id');
            $table->string('client_secret');
            $table->string('access_token')->nullable();
            $table->timestampTz('expired_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('a_p_i_projects');
    }
};
