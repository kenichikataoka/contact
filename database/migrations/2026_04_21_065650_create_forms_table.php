<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // formsテーブルは、フォーム名とURL
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');                         //フォーム名(例：修理受付フォーム)
            $table->string('slug')->unique();               //URL用(例：repair-form)
            $table->text('description')->nullable();        //このフォームは何のためのものか
            $table->boolean('is_active')->default(true);    //公開/非公開
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
