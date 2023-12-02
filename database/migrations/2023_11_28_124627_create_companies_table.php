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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('person')->nullable();
            $table->string('company')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('chap')->nullable();
            $table->string('gifts')->nullable();
            $table->string('adsmanager')->nullable();
            $table->string('tablosardarb')->nullable();
            $table->string('decor')->nullable();
            $table->string('stand')->nullable();
            $table->string('adsagency')->nullable();
            $table->string('cip')->nullable();
            $table->string('bastebandi')->nullable();
            $table->string('graphist')->nullable();
            $table->string('freelancer')->nullable();
            $table->string('narator')->nullable();
            $table->string('exhibition')->nullable();
            $table->string('age')->nullable();
            $table->string('city')->nullable();
            $table->string('site')->nullable();
            $table->string('email')->nullable();
            $table->string('quality')->nullable();
            $table->string('codeeghtesadi')->nullable();
            $table->string('shenasemelli')->nullable();
            $table->string('shenasesabt')->nullable();
            $table->string('codekargah')->nullable();
            $table->string('codesabtashkhas')->nullable();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
