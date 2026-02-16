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
			$shop_name = $table->string('shop_name')->nullable();
			$shop_zip = $table->string('shop_zip')->nullable();
			$shop_addr = $table->string('shop_addr')->nullable();
			$shop_staff = $table->string('shop_staff')->nullable();
			$shop_tel = $table->string('shop_tel')->nullable();
			$shop_fax = $table->string('shop_fax')->nullable();
			$shop_mail1 = $table->string('shop_mail1')->nullable();
			$shop_mail2 = $table->string('shop_mail2')->nullable();
			$shop_mail3 = $table->string('shop_mail3')->nullable();
			$shop_resv_mail_status1 = $table->string('shop_resv_mail_status1')->nullable();
			$shop_resv_mail_status2 = $table->string('shop_resv_mail_status2')->nullable();
			$shop_resv_mail_status3 = $table->string('shop_resv_mail_status3')->nullable();
			$shop_resv_mail_status4 = $table->string('shop_resv_mail_status4')->nullable();
			$shop_resv_mail_status5 = $table->string('shop_resv_mail_status5')->nullable();
			$shop_resv_stop = $table->tinyInteger('shop_resv_stop')->nullable();
			$shop_stop = $table->tinyInteger('shop_stop')->nullable();
		});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
