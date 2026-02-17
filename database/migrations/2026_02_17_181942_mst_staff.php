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
        Schema::create('mst_staff', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('mail')->nullable();
			$table->string('pass')->nullable();
			$table->string('tel')->nullable();
			$table->string('memo')->nullable();
			$table->tinyInteger('admin')->nullable();
			$table->tinyInteger('sort')->nullable();
			$table->tinyInteger('is_stop')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_staff');
    }
};
