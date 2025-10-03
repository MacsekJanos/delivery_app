<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Vehicle\Models\Vehicle;
use Modules\Work\Enums\Status;
use Modules\Work\Models\Work;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        $admin_role = Role::create(['name' => 'admin']);
        $user->assignRole($admin_role);
        $carrier_role = Role::create(['name' => 'carrier']);
        User::factory()
            ->count(10)
            ->create()
            ->each(function (User $user) use ($carrier_role) {
                $user->assignRole($carrier_role);
                Vehicle::factory()->fakeState()->for($user)->create();
                $assignable = collect(Status::cases())
                    ->reject(fn (Status $status) => $status === Status::UnAssigned)
                    ->values();
                Work::factory()->count(rand(2,4))->fakeState()->state(fn () => ['status' => $assignable->random()])->for($user)->create();
            });
        Work::factory()->count(10)->fakeState()->create();
        foreach (config('default_permissions') as $role_name => $permissions)
        {
            collect($permissions)->each(fn(string $permission) => Permission::findOrCreate($permission));
            Role::findOrCreate($role_name)->syncPermissions($permissions);
        }
    }
}
