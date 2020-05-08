<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToDiary extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diary', function (Blueprint $table) {
            DB::statement('DELETE FROM diary');//DMの中身を削除してるだけ
            $table->unsignedBigInteger('user_id');//追加
            $table->foreign('user_id')->references('id')->on('users');
            //foreignキーの指定->対象を指定->対象のテーブルを指定
            $table->string('pic')->nullable();;//追加
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
            // 外部キー付きのカラムを削除するにはまず必ず外部キー制約を外す必要があります
            $table->dropForeign(['user_id']);//foreignキーを外し
            $table->dropColumn('user_id');//削除
            $table->dropColumn('pic');//削除
        });
    }
}
