<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create("activity",
            function (Blueprint $table) {
                $table->bigIncrements("id");
                $table->string("activity_name")->comment("活动名");
                $table->string("activity_description")->nullable()->comment("活动详情");
                $table->string("activity_thumbnail")->default("http://www.nz120.com/uploads/allimg/190227/1-1Z22G0414A34.jpg")->comment("活动的缩略图");
                $table->boolean("state")->default(FALSE)->comment("状态 0.停用 1.启用");
                $table->boolean("info_state")->default(TRUE)->comment("需要填写信息 0.不需要 1.需要");
                $table->string('remarks')->nullable()->comment("备注");
                $table->string('reply_keyword')->unique()->comment("回复关键词");
                $table->timestamps();
            });

        Schema::create("card_activity",
            function (Blueprint $table) {
                $table->bigInteger("card_id");
                $table->bigInteger("activity_id");
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists("activity");
        Schema::dropIfExists("card_activity");
    }
}
