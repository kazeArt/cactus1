<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('text_messages', function (Blueprint $table) {
        if (!Schema::hasColumn('text_messages', 'type')) {
            $table->string('type')->default('body_paragraph');
        }
    });
}


public function down(): void
{
    Schema::table('text_messages', function (Blueprint $table) {
        if (Schema::hasColumn('text_messages', 'type')) {
            $table->dropColumn('type');
        }
    });
}

};

