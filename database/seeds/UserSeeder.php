<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Ernesto',
            'lastname' => 'Mejia',
            'email' => 'ernesto@devs.com',
            'password' => bcrypt('12345678'),
            'status' => '1',
            'role' => '1',
            'permissions' => '{"dashboard":"true","dashboard_small_stats":"true","users_list":"true","user_edit":"true","user_banned":"true","user_permissions":"true","user_show":"true","carousels":"true","carousel_edit":"true","carousel_add":"true","carousel_delete":"true","posts":"true","post_edit":"true","post_add":"true","post_delete":"true","company":"true","company_edit":"true","company_add":"true","company_delete":"true"}',

        ]);
        User::create([
            'name' => 'Jared',
            'lastname' => 'Jimenez',
            'email' => 'jared@devs.com',
            'password' => bcrypt('12345678'),
            'status' => '1',
            'role' => '1',
            'permissions' => '{"dashboard":"true","dashboard_small_stats":"true","users_list":"true","user_edit":"true","user_banned":"true","user_permissions":"true","user_show":"true","carousels":"true","carousel_edit":"true","carousel_add":"true","carousel_delete":"true","posts":"true","post_edit":"true","post_add":"true","post_delete":"true","company":"true","company_edit":"true","company_add":"true","company_delete":"true"}',

        ]);
    }
}
