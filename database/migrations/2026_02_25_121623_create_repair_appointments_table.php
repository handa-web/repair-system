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
        Schema::create('repair_appointments', function (Blueprint $table) {
            $table->id();
            // 予約コード (旧: resv_code)
            $table->string('appointment_code')->unique(); 
            
            // 外部キー制約 (参照先のテーブルが先に存在している必要があります)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('car_category_id')->constrained('car_categories');
            $table->foreignId('car_shape_id')->constrained('car_shapes');
            $table->foreignId('car_damage_id')->constrained('car_damage');
            
            // 車両・修理情報
            $table->string('car_number', 4);
            // 修理箇所のIDリストをJSON形式で保存 (旧: rep_parts_id_list)
            $table->json('car_location_ids')->comment('修理箇所のIDリスト'); 
            
            // 日時・ステータス
            $table->date('in_date')->nullable();
            $table->date('out_date')->nullable();
            $table->integer('status')->default(0);
            
            // ステータス変更履歴 (旧: status1_time 〜 5_time を集約)
            $table->json('status_log')->nullable();
            
            $table->text('customer_text')->nullable();
            $table->text('internal_memo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repair_appointments');
    }
};
