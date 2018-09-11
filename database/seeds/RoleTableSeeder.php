<?php

use Illuminate\Database\Seeder;
Use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Administrator';
        $role_admin->description = 'A website administrator';
        $role_admin->save();
        $role_manager = new Role();
        $role_manager->name = 'Manager';
        $role_manager->description = 'Project Manager';
        $role_manager->save();
        $role_developer = new Role();
        $role_developer->name = 'Developer';
        $role_developer->description = 'A Developer';
        $role_developer->save();
    }
}
