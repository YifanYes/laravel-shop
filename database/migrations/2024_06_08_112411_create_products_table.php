<?php

use App\ValueObjects\Currency;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void {
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->uuid('uuid')->index();
      $table->string('name')->index();
      $table->mediumText('description')->nullable();
      $table->unsignedInteger('price');
      $table->string('currency')->default(Currency::EUR);
      $table->string('image_url')->nullable();
      $table->string('cta_url')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void {
    Schema::dropIfExists('products');
  }
};
