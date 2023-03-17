<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];

        DB::beginTransaction();
        try {
            $admin = User::create(array_merge([
                'email' => 'admin@gmail.com',
                'name' => 'admin',
            ], $default_user_value));
    
            $kandidat = User::create(array_merge([
                'email' => 'kandidat@gmail.com',
                'name' => 'kandidat',
            ], $default_user_value));
            
            $responden = User::create(array_merge([
                'email' => 'responden@gmail.com',
                'name' => 'responden',
            ], $default_user_value));
    
            $role_admin = Role::create(['name' => 'admin']);
            $role_kandidat = Role::create(['name' => 'kandidat']);
            $role_responden = Role::create(['name' => 'responden']);
    
            $permission = Permission::create(['name' => 'reade role']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'update role']);
            $permission = Permission::create(['name' => 'delete role']);
    
            $admin->assignRole('admin');
            $kandidat->assignRole('kandidat');
            $responden->assignRole('responden');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }


    }
}
