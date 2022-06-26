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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('lastname');
            $table->string('firstname');
            $table->string('middlename')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('department_id')->constrained()->nullOnDelete();
            $table->foreignId('city_id')->constrained()->nullOnDelete();
            $table->foreignId('state_id')->constrained()->nullOnDelete();
            $table->foreignId('country_id')->constrained()->nullOnDelete();
            $table->char('zip_code', 10);
            $table->date('birthdate')->nullable();
            $table->date('date_hired')->nullable();
            $table->string('time_work');
            $table->timestamps();
            $table->timestamp('delete_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
