<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('publishing_year')->nullable(); // Create the new column
        });

        // Copy data from old column to the new column
        DB::statement('UPDATE books SET publishing_year = `publishing year`');

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('publishing year'); // Drop the old column
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            $table->integer('publishing year')->nullable();
        });

        DB::statement('UPDATE books SET `publishing year` = publishing_year');

        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('publishing_year');
        });
    }
};
