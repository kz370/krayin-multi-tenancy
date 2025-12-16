<?php

namespace Webkul\MultiTenancy\Console\Commands;

use Illuminate\Console\Command;
use Webkul\MultiTenancy\Models\Tenant;

class TenantsMigrate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenants:migrate {tenant_id?} {--fresh} {--seed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Migrate tenant databases';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $query = Tenant::query();

        if ($id = $this->argument('tenant_id')) {
            $query->where('id', $id);
        }

        $tenants = $query->get();

        if ($tenants->isEmpty()) {
            $this->info("No tenants found.");
            return;
        }

        foreach ($tenants as $tenant) {
            $this->info("Migrating tenant: {$tenant->name} (DB: {$tenant->database_name})");

            try {
                // Switch connection to this tenant
                $tenant->configure();

                // Prepare migration options
                $options = [
                    '--force' => true,
                    '--database' => 'mysql',
                ];

                if ($this->option('seed')) {
                    $options['--seed'] = true;
                }

                $command = $this->option('fresh') ? 'migrate:fresh' : 'migrate';

                // Execute the standard Laravel migrate command
                $this->call($command, $options);

                $this->info("Migration completed for {$tenant->name}");

            } catch (\Exception $e) {
                $this->error("Failed to migrate tenant {$tenant->name}: " . $e->getMessage());
            }
        }
    }
}
