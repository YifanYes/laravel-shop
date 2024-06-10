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
      'price' => 999,
      'currency' => Currency::EUR,
      'image_url' => 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcT0yrU0WPvmrcrStvOSpwS11wLSaQy3qmLgX7Dtiw8rRrZQgfN8Cdb7CSuEE7hWnnmKDEKA0nsFkLLNyp05qppnho-ZOJ_4obnWC5-3npw-o8Fu70AufWUuzXaLxHCKE-zNIXOZxlTjMCY&usqp=CAc',
      'cta_url' => 'https://www.apple.com/es/iphone/'
    ],
    [
      'name' => 'Macbook Pro M3',
      'description' => 'Apple 2023 MacBook Pro Portátil con Chip M3 Pro: CPU de 11 núcleos, GPU de 14 núcleos, Pantalla Liquid Retina XDR de 14,2 Pulgadas, 18 GB de Memoria unificada, 512 GB de SSD, Plata',
      'price' => 2300,
      'currency' => Currency::EUR,
      'image_url' => 'https://store.storeimages.cdn-apple.com/4668/as-images.apple.com/is/mbp14-m3-max-pro-spaceblack-select-202310?wid=904&hei=840&fmt=jpeg&qlt=90&.v=1697230830118',
      'cta_url' => 'https://www.apple.com/es/shop/buy-mac/macbook-pro/14-pulgadas-m3'
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
