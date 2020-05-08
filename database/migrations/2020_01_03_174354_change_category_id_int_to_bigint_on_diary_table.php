<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeCategoryIdIntToBigintOnDiaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diary', function (Blueprint $table) {
            $table->dropColumn('category_id');//一旦消してcategory_idを再度作成
        });//削除と作成同時にできないかもalready exist
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
            $table->Integer('category_id');//intに戻す
        });
    }
}
