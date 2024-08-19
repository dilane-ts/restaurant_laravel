<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Dilane',
            'email' => 'dilane@example.com',
        ])->first();

        $tags = collect(['fast food', 'grill', 'trend', 'hot', 'italian'])->map(function ($name) {
            return Tag::create(['name' => $name]);
        });

        collect(['Burger', 'pizza', 'pasta', 'cold drink', 'dessert'])->each(function (string $name) use ($tags) {

            $category = Category::create([
                'name' => $name
            ]);
            $max = rand(1, 3);
            for($i = 0; $i < $max; $i++) {
                $name = fake()->words(2, true);
                Product::factory()->create([
                    'name' => $name,
                    'category_id' => $category->id,
                    'slug' => Str::slug($name). '-' .uniqid()
                ]);

            }

        });
    }
}
