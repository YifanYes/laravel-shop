<?php

namespace Database\Seeders;

use App\Models\{Category, User};
use App\ValueObjects\ProductCategory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  /**
   * Seed the application's database.
   */
  public function run(): void {
    User::firstOrCreate(
      ['name' => 'Test User', 'email' => 'test@example.com'],
      ['password' => 'asdfasdf']
    );

    foreach (ProductCategory::all() as $category) {
      Category::firstOrCreate(['name' => $category]);
    }
  }
}
