<?php

namespace Database\Seeders;

use App\Models\{Category, User};
use App\ValueObjects\Currency;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  public const CATEGORIES = ['food', 'clothing', 'electronics'];
  public const PRODUCTS = [
    [
      'name' => 'iphone 15 Pro',
      'description' => 'Apple iPhone 15 Pro Max, Titanio Natural, 256 GB, 5G, 6.7" Pantalla Super Retina XDR, Chip A17 Bionic, iOS',
      'price' => 100000,
      'currency' => Currency::USD,
      'image_url' => 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcT0yrU0WPvmrcrStvOSpwS11wLSaQy3qmLgX7Dtiw8rRrZQgfN8Cdb7CSuEE7hWnnmKDEKA0nsFkLLNyp05qppnho-ZOJ_4obnWC5-3npw-o8Fu70AufWUuzXaLxHCKE-zNIXOZxlTjMCY&usqp=CAc',
      'cta_url' => 'https://www.apple.com/es/iphone/'
    ]
  ];

  /**
   * Seed the application's database.
   */
  public function run(): void {
    User::firstOrCreate(
      ['name' => 'Test User', 'email' => 'test@example.com'],
      ['password' => 'asdfasdf']
    );

    foreach (self::CATEGORIES as $category) {
      Category::firstOrCreate(['name' => $category]);
    }
  }
}
