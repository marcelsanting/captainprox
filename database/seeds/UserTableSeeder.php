<?php

use Illuminate\Database\Seeder;
Use App\User;
Use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admnistrator')->first();
        $role_manager  = Role::where('name', 'Manager')->first();
        $role_developer  = Role::where('name', 'Manager')->first();

        $administrator = new User();
        $administrator->name = 'Administrator';
        $administrator->email =  'administrator@example.com';
        $administrator->password = 'password';
        $administrator->save();
        $administrator->roles()->attach($role_admin);

        $manager = new User();
        $manager->name = 'Manager';
        $manager->email = 'manager@example.com';
        $manager->password = 'secret';
        $manager->save();
        $manager->roles()->attach($role_manager);

        $developer = new User();
        $developer->name = 'Developer';
        $developer->email = 'developer@example.com';
        $developer->password = 'secret';
        $developer->save();
        $developer->roles()->attach($role_developer);
    }
}
