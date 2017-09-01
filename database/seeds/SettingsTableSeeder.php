<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
        	'site_name'     => "Laravel's Blog",
        	'address'    => 'Serbia, Neka Ulica 123, 21000 Novi Sad',
        	'contact_number'    => '381 21 123456789',
        	'contact_email'    => 'info@laravel_blog.com'
        ]);
    }
}
