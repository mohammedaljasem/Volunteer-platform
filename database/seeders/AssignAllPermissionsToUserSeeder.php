<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class AssignAllPermissionsToUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::where('email', 'mohammedaljasem559@gmail.com')->first();

        if (!$user) {
            $this->command->error('❌ لم يتم العثور على المستخدم.');
            return;
        }

        $permissions = Permission::all();

        $user->syncPermissions($permissions);

        $this->command->info('✅ تم إعطاء جميع الصلاحيات للمستخدم: ' . $user->email);
    }
}
