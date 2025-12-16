<?php

namespace Webkul\MultiTenancy\Http\Middleware;

use Closure;
use Webkul\MultiTenancy\Models\Tenant;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 1. Identify Host
        $host = $request->getHost();
        $landlordHost = parse_url(config('app.url'), PHP_URL_HOST);

        // If this is the landlord/central domain, do NOT switch database.
        // We let it use the default connection (which should be the Landlord DB)
        if ($host === $landlordHost) {
            return $next($request);
        }

        // 2. Find Tenant by Domain or Subdomain
        // Tries to find exact domain match OR subdomain match
        $subdomain = explode('.', $host)[0];

        $tenant = Tenant::where('domain', $host)
            ->orWhere('subdomain', $subdomain)
            ->first();

        // 3. Validation
        // For development loopback addresses (127.0.0.1 or localhost), we might want to bypass or have a default
        // But strictly for multi-tenancy, we fail if no tenant found.
        if (! $tenant || ! $tenant->is_active) {
            // Optional: You might want to redirect to a central landing page or show a 404
            abort(404, 'Tenant not found or inactive.');
        }

        // 4. Switch Database
        $tenant->configure();

        // 5. Bind tenant to the container for easy access elsewhere in the app
        app()->instance('CurrentTenant', $tenant);

        // Filesystem configuration (Optional: if tenants need isolated storage)
        Config::set('filesystems.disks.public.root', storage_path("app/public/tenants/{$tenant->id}"));
        Config::set('filesystems.disks.public.url', env('APP_URL')."/storage/tenants/{$tenant->id}");

        return $next($request);
    }
}
