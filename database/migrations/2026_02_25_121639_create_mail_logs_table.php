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
        Schema::create('mail_logs', function (Blueprint $table) {
			$table->id();
			$table->foreignId('repair_appointment_id')->constrained('repair_appointments')->cascadeOnDelete();
			$table->string('to_email');           // 送信先アドレス
			$table->string('subject');            // 件名
			$table->text('body');                 // 本文
			$table->integer('status_code');       // 送信時の予約ステータス（旧: resv_mail_status）
			$table->boolean('is_sent')->default(false); // 送信完了フラグ（旧: resv_mail_ok）
			$table->dateTime('sent_at');
			$table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mail_logs');
    }
};
