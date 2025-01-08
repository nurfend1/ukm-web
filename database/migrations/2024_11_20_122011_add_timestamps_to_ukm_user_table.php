<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToUkmUserTable extends Migration
{
    public function up()
    {
        Schema::table('ukm_user', function (Blueprint $table) {
            $table->timestamps();  // Menambahkan created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::table('ukm_user', function (Blueprint $table) {
            $table->dropTimestamps();  // Menghapus kolom created_at dan updated_at
        });
    }
}
