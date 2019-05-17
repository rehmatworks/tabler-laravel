<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRole = Role::create(['name' => 'Standard User']);
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminPermissions = Permission::create(['name' => 'manage-users']);
        $adminRole->givePermissionTo($adminPermissions);
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($adminRole);
    }
}
