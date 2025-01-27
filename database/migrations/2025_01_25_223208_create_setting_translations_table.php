<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings_translation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('settings_id')->unsigned();
            $table->string('locale');
            $table->longText('value')->nullable();

            $table->unique(['settings_id','locale']);
            $table->foreign('settings_id')->references('id')->on('settings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setting_translations');
    }
};
