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
		Schema::create('staff_schedules', function (Blueprint $table) {
			$table->id();
			// 外部キー：スタッフと予約
			$table->foreignId('staff_id')->constrained('staff')->cascadeOnDelete();
			$table->foreignId('repair_appointment_id')->nullable()->constrained('repair_appointments')->nullOnDelete();
			
			// 日時情報
			$table->date('scheduled_date');       // 予定日
			$table->time('start_time');           // 開始（旧: staff_cale_time1）
			$table->time('end_time');             // 終了（旧: staff_cale_time2）
			
			// 以前の plan_id（作業内容）を紐付け
			$table->foreignId('work_plan_id')->nullable()->constrained('work_plans');

			$table->timestamps();

			// 同じスタッフが同じ時間に重複して入らないためのインデックス（必要に応じて）
			$table->unique(['staff_id', 'scheduled_date', 'start_time'], 'staff_schedule_unique');
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff_schedules');
    }
};
