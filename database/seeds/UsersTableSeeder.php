<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name'     => 'Nikola Nikolić',
        	'email'    => 'test@test.com',
        	'password' => bcrypt('password'),
            'admin'    => 1
        ]);

        App\Profile::create([
            'user_id'  => $user->id,
            'avatar'   => 'uploads/avatars/avatar.png',
            'about'    => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet neque mollitia doloribus odio at magnam, aspernatur corporis ducimus voluptates deleniti quam facilis ullam nisi voluptatem iure sequi perferendis, repudiandae adipisci!',
            'facebook' => 'facebook.com',
            'twitter'  =>'twitter.com'
        ]);
    }
}
