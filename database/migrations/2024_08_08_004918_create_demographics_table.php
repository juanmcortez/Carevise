<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('demographics', function (Blueprint $table) {
            $table->id();

            $table->string('title', 12)->nullable()->default('mr');
            $table->string('first_name', 128)->nullable()->index();
            $table->string('middle_name', 128)->nullable();
            $table->string('last_name', 128)->nullable()->index();
            $table->date('date_of_birth')->nullable()->index();
            $table->string('gender', 128)->nullable()->default('unassigned');

            // $table->foreignId('address_id')->nullable()->constrained('demographics_addresses')->cascadeOnDelete();
            // $table->foreignId('phone_id')->nullable()->constrained('demographics_phones')->cascadeOnDelete();
            // $table->foreignId('cellphone_id')->nullable()->constrained('demographics_phones')->cascadeOnDelete();
            // $table->foreignId('email_id')->nullable()->constrained('demographics_emails')->cascadeOnDelete();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demographics');
    }
};
