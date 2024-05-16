<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{              
    public function run()
    {
        // Create a specific product with different category IDs
        $products = [
            [
                'product_name' => 'Shirt For Men',
                'description' => 'A black shirt for fashion',
                'price' => 9.99,
                'quantity' => 100,
                'imageUrl' => 'https://cms.brnstc.de/product_images/435x596_retina/cpro/media/images/product/23/9/100129755413001_1_1695802837471.jpg',
                'product_status' => 'available',
                'category_id' => 1, // Category ID for shirt
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men 1',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
            [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],
             [
                'product_name' => 'Shirt For Men',
                'description' => 'Stylish shirt for men',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://i.ebayimg.com/images/g/PdsAAOSwJ1xkrZAQ/s-l1600.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for pants
            ],

            // Add more products with different category IDs here
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}