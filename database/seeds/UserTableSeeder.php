<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Seed data to user table

        
        $role_staff_user = Role::where('title', 'Staff user')->first();
        $role_programme_manager = Role::where('title', 'Programme manager')->first();
        $role_admin = Role::where('title', 'Admin user')->first();
        $role_super_admin = Role::where('title', 'Super admin')->first();

        //Create staff user
        $staff_user = new User();
        $staff_user->name = 'Staff name';
        $staff_user->email = 'staff@test.com';
        $staff_user->password = Hash::make('password');
        $staff_user->save();
        $staff_user->roles()->attach($role_staff_user);

        //Create programme manager
        $programme_manager = new User();
        $programme_manager->name = 'Manager name';
        $programme_manager->email = 'manager@test.com';
        $programme_manager->password = Hash::make('password');
        $programme_manager->save();
        $programme_manager->roles()->attach($role_programme_manager);

        //Create admin
        $admin = new User();
        $admin->name = 'Admin name';
        $admin->email = 'admin@test.com';
        $admin->password = Hash::make('password');
        $admin->save();
        $admin->roles()->attach($role_admin);

        //Create super admin
        $super_admin = new User();
        $super_admin->name = 'Super admin name';
        $super_admin->email = 'super_admin@test.com';
        $super_admin->password = Hash::make('password');
        $super_admin->save();
        $super_admin->roles()->attach($role_super_admin);

    }
}
