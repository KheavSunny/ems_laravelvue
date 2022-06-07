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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->cascadeOnDelete();
            $table->date('date');
            $table->foreignId('t1')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('t2')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('t3')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('t4')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('t5')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('t6')->nullable()->references('id')->on('attendance_records')->cascadeOnUpdate()->nullOnDelete();
            $table->string('t')->nullable();
            $table->string('overtime')->default('00:00:00');
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
        Schema::dropIfExists('attendances');
    }
};
