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
        Schema::table('users', function (Blueprint $table) {
            $table->longText('aditional_information')->nullable()->after('remember_token');
            $table->string('taxonomy', 16)->nullable()->after('remember_token');
            $table->string('federal_tax_id', 16)->nullable()->after('remember_token');
            $table->string('npi', 16)->nullable()->after('remember_token');
            $table->string('specialty', 128)->nullable()->after('remember_token');

            $table->foreignId('demographic_id')->nullable()->after('remember_token')->constrained('demographics')->cascadeOnDelete();

            $table->boolean('is_active')->default(true)->after('remember_token');
            $table->boolean('is_user_provider')->default(false)->after('remember_token');
        });

        Schema::table('demographics', function (Blueprint $table) {
            $table->foreignId('address_id')->nullable()->after('gender')->constrained('demographics_addresses')->cascadeOnDelete();
            // $table->foreignId('phone_id')->nullable()->constrained('demographics_phones')->cascadeOnDelete();
            // $table->foreignId('cellphone_id')->nullable()->constrained('demographics_phones')->cascadeOnDelete();
            // $table->foreignId('email_id')->nullable()->constrained('demographics_emails')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('demographics', function (Blueprint $table) {
            // $table->dropConstrainedForeignId('email_id');
            // $table->dropConstrainedForeignId('cellphone_id');
            // $table->dropConstrainedForeignId('phone_id');
            $table->dropConstrainedForeignId('address_id');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_user_provider');
            $table->dropColumn('is_active');

            $table->dropConstrainedForeignId('demographic_id');

            $table->dropColumn('specialty');
            $table->dropColumn('npi');
            $table->dropColumn('federal_tax_id');
            $table->dropColumn('taxonomy');
            $table->dropColumn('aditional_information');
        });
    }
};
