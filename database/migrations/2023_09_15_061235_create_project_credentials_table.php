<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('project_credentials', function (Blueprint $table) {
            $table->id();
            $table->string('project_name');
            $table->string('assigned_to');
            $table->string('project_url');
            $table->string('project_username');
            $table->string('project_password');
            $table->timestamps();
            $table->unsignedBigInteger('emp_id');
            $table->foreign('emp_id')->references('id')->on('emps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_credentials');
    }
};