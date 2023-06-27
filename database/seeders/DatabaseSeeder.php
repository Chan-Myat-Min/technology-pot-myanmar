<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Blog::truncate();
        Category::truncate();

        $frontend = Category::factory()->create(['name' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend']);


        Blog::factory(2)->create(['category_id' => $frontend->id]);
        Blog::factory(2)->create(['category_id' => $backend->id]);

        // $frontend = Category::create([
        //     'name' => 'frontend',
        //     'slug' => 'frontend'
        // ]);
        // $backend = Category::create([
        //     'name' => 'backend',
        //     'slug' => 'backend'
        // ]);

        // Blog::create([
        //     'title' => 'frontend post',
        //     'slug' => 'frontend-post',
        //     'intro' => 'this is intro',
        //     'body' => 'HyperText Markup Language (HTML) is the backbone of any website development process, without which a web page does not exist. Hypertext means that text has links, termed hyperlinks, embedded in it. When a user clicks on a word or a phrase that has a hyperlink, it will bring another web-page. A markup language indicates text can be turned into images, tables, links, and other representations.', 'category_id' => $frontend->id
        // ]);
        // Blog::create([
        //     'title' => 'backend post',
        //     'slug' => 'backend-post',
        //     'intro' => 'this is intro',
        //     'body' => 'HyperText Markup Language (HTML) is the backbone of any website development process, without which a web page does not exist. Hypertext means that text has links, termed hyperlinks, embedded in it. When a user clicks on a word or a phrase that has a hyperlink, it will bring another web-page. A markup language indicates text can be turned into images, tables, links, and other representations.', 'category_id' => $backend->id
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
