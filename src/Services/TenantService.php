<?php

namespace Webkul\MultiTenancy\Services;

use Webkul\MultiTenancy\Models\Tenant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use Webkul\User\Models\User;

class TenantService
{
    /**
     * Create a new tenant and initialize their database.
     *
     * @param string $name
     * @param string $subdomain
     * @param string $adminName
     * @param string $adminEmail
     * @param string $adminPassword
     * @return Tenant
     */
    public function createTenant($name, $subdomain, $adminName, $adminEmail, $adminPassword)
    {
        // 1. Create Tenant Record in Landlord DB
        // Format database name safe for SQL.
        // Note: Ensure this validation rules out dashes if your DB doesn't support them well or santize it.
        $dbName = config('multi_tenancy.database_prefix', 'krayin_') . preg_replace('/[^a-zA-Z0-9_]/', '', $subdomain);

        $tenant = Tenant::create([
            'name' => $name,
            'subdomain' => $subdomain,
            'database_name' => $dbName
        ]);

        // 2. Create Database
        // This requires the DB user configured in 'landlord' connection to have CREATE DATABASE permission.
        DB::connection('landlord')->statement("CREATE DATABASE IF NOT EXISTS `{$dbName}` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

        // 3. Run Migrations & Seeders
        // Switch to this new tenant to run initial migrations
        $tenant->configure();

        // Run migrations
        Artisan::call('migrate', [
            '--database' => 'mysql', // Ensure we use the 'mysql' connection which is now pointing to tenant DB
            '--force' => true,
        ]);

        // Seed core data (roles, permissions, etc)
        // Adjust the seeder class if Krayin has a specific installer seeder
        Artisan::call('db:seed', [
            '--database' => 'mysql',
            '--class' => 'DatabaseSeeder',
            '--force' => true
        ]);

        // 4. Create Admin User
        // We are strictly in the tenant context now

        // Ensure Role Exists (ID 1 is standard, but let's be safe)
        $roleId = 1;
        $adminRole = DB::connection('mysql')->table('roles')->where('name', 'Administrator')->first();
        if ($adminRole) {
            $roleId = $adminRole->id;
        } else {
             // Create Administrator Role if missing (Fallback)
             $roleId = DB::connection('mysql')->table('roles')->insertGetId([
                 'name' => 'Administrator',
                 'permission_type' => 'all',
                 'permissions' => json_encode(['all']), // adjustments might be needed based on Krayin structure
                 'created_at' => now(),
                 'updated_at' => now(),
             ]);
        }

        // Create Admin User
        // We overwrite the first user (ID 1) created by the seeders to avoid having a "default" admin left over.
        $firstUser = DB::connection('mysql')->table('users')->orderBy('id')->first();

        if ($firstUser) {
            DB::connection('mysql')->table('users')->where('id', $firstUser->id)->update([
                'name' => $adminName,
                'email' => $adminEmail, // Ensure email is upgraded to the requested one
                'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
                'role_id' => $roleId,
                'status' => 1,
                'updated_at' => now(),
            ]);
        } else {
             DB::connection('mysql')->table('users')->insert([
                'name' => $adminName,
                'email' => $adminEmail,
                'password' => \Illuminate\Support\Facades\Hash::make($adminPassword),
                'role_id' => $roleId,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
             ]);
        }

        return $tenant;
    }

    /**
     * Update the admin user credentials for a tenant.
     *
     * @param Tenant $tenant
     * @param string|null $email
     * @param string|null $password
     * @return void
     */
    public function updateTenantAdmin(Tenant $tenant, $email = null, $password = null)
    {
        // Switch to tenant DB
        $tenant->configure();

        // 1. Find Admin User (Try ID 1 first)
        $user = User::on('mysql')->find(1);

        if (! $user) {
            // Fallback: find first user with Administrator role
            $adminRole = \Webkul\User\Models\Role::on('mysql')->where('name', 'Administrator')->first();
            if ($adminRole) {
                $user = User::on('mysql')->where('role_id', $adminRole->id)->first();
            }
        }

        // 2. Update Credentials
        if ($user) {
            if (! empty($email)) {
                $user->email = $email;
            }

            if (! empty($password)) {
                $user->password = bcrypt($password);
            }

            $user->save();
        }
    }

    /**
     * Delete a tenant and drop their database PERMANENTLY.
     *
     * @param Tenant $tenant
     * @return void
     */
    public function forceDeleteTenant(Tenant $tenant)
    {
        // Drop Database
        DB::connection('landlord')->statement("DROP DATABASE IF EXISTS `{$tenant->database_name}`");

        // Delete Record
        $tenant->forceDelete();
    }
}
