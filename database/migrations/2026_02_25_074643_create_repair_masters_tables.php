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
        // 1. 車両区分 (旧: mst_rep_size)
        Schema::create('car_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);       // 軽自動車、普通車など
            $table->integer('charge_rate');    // 料金倍率 (90, 110など)
            $table->text('description')->nullable();
            $table->text('memo')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();             // 論理削除
            $table->timestamps();
        });

        // 2. 車両形状 (旧: mst_rep_shape)
        Schema::create('car_shapes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);        // トラック、乗用車など
            $table->text('description')->nullable();
            $table->text('memo')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        // 3. 修理箇所 (旧: mst_rep_parts)
        Schema::create('car_location', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);       // フロント、左サイドなど
            $table->text('description')->nullable();
            $table->text('memo')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });

        // 4. 損害の程度 (旧: mst_rep_level)
        Schema::create('car_damage', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);        // 小破、中破など
            $table->integer('estimated_minutes'); // 作業時間 (45, 90, 180分など)
            $table->text('description')->nullable();
            $table->text('memo')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->softDeletes();
            $table->timestamps();
        });
	}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
		Schema::dropIfExists('car_damage');
        Schema::dropIfExists('car_location');
        Schema::dropIfExists('car_shapes');
        Schema::dropIfExists('car_categories');
    }
};
