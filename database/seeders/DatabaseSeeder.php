<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{              
    public function run()
    {
        // Create a specific product with different category IDs
        $products = [
            [
                'product_name' => 'Tops and T-Shirt',
                'description' => 'A white shirt for men',
                'price' => 250.00,
                'quantity' => 10,
                'imageUrl' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/e08e8cb7-4009-48de-bff6-32742ff06ca7/sportswear-t-shirt-MV5kVX.png',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for shirt
            ],
            [
                'product_name' => 'Men T-shirt',
                'description' => 'Stylish Mountain Warehouse Shirt',
                'price' => 750.00,
                'quantity' => 20,
                'imageUrl' => 'https://ih1.redbubble.net/image.1926013279.6349/ssrco,active_tshirt,mens,172b47:4762f60800,front,square_product,600x600.u4.jpg',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for shirt
            ],
            [
                'product_name' => 'Neck T-Shirt',
                'description' => 'Basic Model Crew Neck T-Shirt',
                'price' => 250.00,
                'quantity' => 50,
                'imageUrl' => 'https://terranova.ph/cdn/shop/files/SAB0055555001S105_det_1_06280311.jpg?v=1697618395&width=1946',
                'product_status' => 'available',
                'category_id' => 2, // Category ID for shirt
            ],
            [
                'product_name' => 'Khaki Pants',
                'description' => 'Fashion Men Casual Work Cotton Pure',
                'price' => 850,
                'quantity' => 25,
                'imageUrl' => 'https://i5.walmartimages.com/seo/Homenesgenics-Sale-Clearance-Khaki-Pants-for-Men-Fashion-Men-Casual-Work-Cotton-Pure-Elastic-Waist-Long-Pants-Trousers_63e77ffa-309a-46d5-ad1c-476fbfbedecd_1.2221bce06ce4c8151afaf8365ebfaf19.jpeg',
                'product_status' => 'available',
                'category_id' => 1, // Category ID for pants
            ],
            [
                'product_name' => 'Maroon Pants',
                'description' => 'Stylish Maroon Pants for Men',
                'price' => 650,
                'quantity' => 15,
                'imageUrl' => 'https://i.pinimg.com/736x/4d/89/6f/4d896fe91b04ab5a369854322b47e5ec.jpg',
                'product_status' => 'available',
                'category_id' => 1, // Category ID for pants
            ],
            [
                'product_name' => 'Cargo & Chino Style Pants',
                'description' => 'SweatPants Cargo & Chino Styles',
                'price' => 1000.00,
                'quantity' => 40,
                'imageUrl' => 'https://lscoecomm.scene7.com/is/image/lscoecomm/XX%20CHINO?fmt=jpeg&qlt=70&resMode=bisharp&fit=crop,1&op_usm=0.6,0.6,8&wid=1200&hei=1500',
                'product_status' => 'available',
                'category_id' => 1, // Category ID for pants
            ],
            [
                'product_name' => 'Long Sleeve Shirt',
                'description' => 'Biege Sleeve Style for Men',
                'price' => 750.00,
                'quantity' => 10,
                'imageUrl' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/c1c6c30fb08047628a53afbe00333ddd_9366/1_Moment_Long_Sleeve_Shirt_Beige_IK8557_21_model.jpg',
                'product_status' => 'available',
                'category_id' => 3, // Category ID for pants
            ],
            [
                'product_name' => 'Run Long Sleeve Tee',
                'description' => 'Own the run White Sleeve Tee',
                'price' => 350,
                'quantity' => 25,
                'imageUrl' => 'https://assets.adidas.com/images/h_840,f_auto,q_auto,fl_lossy,c_fill,g_auto/7bbfb04fe3e043d189deecb3a3df48c6_9366/Own_The_Run_Long_Sleeve_Tee_White_IK7432_21_model.jpg',
                'product_status' => 'available',
                'category_id' => 3, // Category ID for pants
            ],
            [
                'product_name' => 'Reg Fit-Navy Shirt',
                'description' => 'Training LongSleeve For Women',
                'price' => 500.00,
                'quantity' => 5,
                'imageUrl' => 'https://i.pinimg.com/originals/a1/16/e7/a116e7c58eea396fd32c9e5ee9d723a8.jpg',
                'product_status' => 'available',
                'category_id' => 3, 
            ],
            [
                'product_name' => 'Cotton Fit Polo Shirt',
                'description' => 'Cotton Pique Polo Shirt For Men',
                'price' => 1200.00,
                'quantity' => 50,
                'imageUrl' => 'https://shop.mango.com/assets/rcs/pics/static/T6/fotos/S/67026318_30.jpg?imwidth=2048&imdensity=1&ts=1706029390393',
                'product_status' => 'available',
                'category_id' => 4, 
            ],
            [
                'product_name' => 'Black Polo Shirt',
                'description' => 'Stylish Men Polo Shirt Fit',
                'price' => 950.00,
                'quantity' => 10,
                'imageUrl' => 'https://www.kennethcole.com/cdn/shop/products/cdes8f120000_black_4_800x.jpg?v=1670444579',
                'product_status' => 'available',
                'category_id' => 4, // Category ID for pants
            ],
             [
                'product_name' => 'Royal Blue Polo Shirt',
                'description' => 'Short Sleeve Royal Blue for Men',
                'price' => 1500.00,
                'quantity' => 15,
                'imageUrl' => 'https://rukminim1.flixcart.com/image/850/1000/xif0q/t-shirt/b/a/i/m-pckb01179-p7-park-avenue-original-imagpfh3dgsnndyt.jpeg?q=90',
                'product_status' => 'available',
                'category_id' => 4, // Category ID for pants
            ],

            // Add more products with different category IDs here
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
    
}