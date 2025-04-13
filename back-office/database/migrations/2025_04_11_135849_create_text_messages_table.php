<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  // Migration
public function up()
{
    Schema::table('text_messages', function (Blueprint $table) {
        // Remove 'type' column if it's already there.
        // You don't need it anymore
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('text_messages', function (Blueprint $table) {
        $table->dropColumn('type'); // Drop the type column if you need to rollback
    });
}

};
