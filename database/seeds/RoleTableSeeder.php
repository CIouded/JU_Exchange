<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seeds data to role table in db
        $role_staff_user = new Role();
        $role_staff_user->title = 'Staff_user';
        $role_staff_user->description = 'A staff user';
        $role_staff_user->save();

        $role_programme_manager = new Role();
        $role_programme_manager->title = 'Programme_manager';
        $role_programme_manager->description = 'A programme manager';
        $role_programme_manager->save();

        $role_admin = new Role();
        $role_admin->title = 'Admin_user';
        $role_admin->description = 'A system administrator';
        $role_admin->save();

        $role_super_admin = new Role();
        $role_super_admin->title = 'Super_admin';
        $role_super_admin->description = 'A super admin';
        $role_super_admin->save();
    }
}
