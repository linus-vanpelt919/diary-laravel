<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCategoryIdToDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diary', function (Blueprint $table) {
//            $table->bigInteger('category_id');//bigintに
            //unsignedつけないとだめ
        });//foreign key設定できない
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
            //$table->dropForeign(['category_id']);//foreignキーを消して
//            $table->dropColumn('category_id');//category_idを削除
        });
    }
}
