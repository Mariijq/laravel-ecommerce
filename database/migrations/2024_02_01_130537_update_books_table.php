<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateBooksTable extends Migration
{
    public function up()
    {
        // Remove the existing 'publishing year' column
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('publishing year');
        });

        // Add the new 'publishing_year' column
        Schema::table('books', function (Blueprint $table) {
            $table->integer('publishing_year')->nullable();
        });
    }

    public function down()
    {
        // Rollback changes if needed
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('publishing_year');
        });
    }
}
