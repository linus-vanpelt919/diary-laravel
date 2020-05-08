<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeginKeyToCategoryIdOnDiary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//エラー
        Schema::table('diary', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')
                ->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diary', function (Blueprint $table) {
            //DB::statement('DELETE FROM diary');//ほんとは消す
            $table->dropForeign(['category_id']);//foreignキーを消す
        });
    }
}
