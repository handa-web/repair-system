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
		Schema::create('mst_shop', function (Blueprint $table) {
			$table->id();
			$table->string('name')->nullable();
			$table->string('zip')->nullable();
			$table->string('address')->nullable();
			$table->string('staff')->nullable();
			$table->string('tel')->nullable();
			$table->string('fax')->nullable();
			$table->string('mail1')->nullable();
			$table->string('mail2')->nullable();
			$table->string('mail3')->nullable();
			$table->string('resv_mail_status1')->nullable();
			$table->string('resv_mail_status2')->nullable();
			$table->string('resv_mail_status3')->nullable();
			$table->string('resv_mail_status4')->nullable();
			$table->string('resv_mail_status5')->nullable();
			$table->tinyInteger('is_resv_stop')->nullable();
			$table->tinyInteger('is_stop')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mst_shop');
    }
};
