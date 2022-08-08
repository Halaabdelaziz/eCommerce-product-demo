<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Product::create([
            'name' => 'A New Jacket',
            'price' => '50',
            'image'=>'https://k.nooncdn.com/cms/pages/20201105/05fd2ea672f98c9860bd90736f6083fc/en_mb-cat-module-04.png',
        ]);

        Product::create([
            'name' => 'Baby suit',
            'price' => '10',
            'image'=>'https://ae01.alicdn.com/kf/HTB1IXcPpIuYBuNkSmRyq6AA3pXaK/Newborn-Baby-Products-Boy-Wedding-Dress-with-Hat-Boys-Plaid-Clothing-Set-Gentleman-Suits-Designs-for.jpg_Q90.jpg'
        ]);

        Product::create([
            'name' => 'Zara man suit',
            'price' => '62',
            'image'=>'https://beeketing.com/blog/wp-content/uploads/2018/03/look3-look3.st_.jpg'
        ]);
        Product::create([
            'name' => 'sweet shirts',
            'price' => '35',
            'image'=>'https://images.teemill.com/jdliu31rsxd74wj8ouya6jv27qf06v7uhtf7mhbmquio6vlg.jpeg.jpg?w=555&h=569&v=2'
        ]);
        Product::create([
            'name' => 'Boys clothes',
            'price' => '7',
            'image'=>'https://asset2.cxnmarksandspencer.com/is/image/mands/1157_20220407_KW_BoysView_All__PLP_SB-28799_400x301'
        ]);
        Product::create([
            'name' => 'White T-shirt',
            'price' => '19',
            'image'=>'https://matalan-content.imgix.net/uploads/asset_file/asset_file/370412/1638444969.434301-WK-42-43---SMART-CASUAL-DRESS-CODE-GUIDE_03.jpg?ixlib=rails-4.2.0&fm=pjpg&auto=format%2Ccompress&q=30&cs=tinysrgb&w=1400&ar=1400%3A459&s=a206ba2f7a9922b58161054a2889e783'
        ]);
        Product::create([
            'name' => 'Polo shirts',
            'price' => '29',
            'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSBJM-lgjmDI2Ipu5w67cKUi5_NbBB6I2QZ0Q&usqp=CAU'
        ]);
        Product::create([
            'name' => 'Casual dress',
            'price' => '45',
            'image'=>'https://m.media-amazon.com/images/I/61KNCfCQIDL._MCnd_AC_UL320_.jpg'
        ]);

    }
}
