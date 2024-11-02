<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rejects', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->date('date');
            $table->string('created_by');
            $table->string('dateline');
            $table->string('total_cost');
            $table->string ('email');
            $table->string ('phone');
            $table->string ('status')->default('مرفوض');
            $table->string ('reject_reason')->default('مرفوض');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_rejects');
    }
};
