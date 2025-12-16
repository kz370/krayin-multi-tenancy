<?php

namespace Webkul\MultiTenancy\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Webkul\MultiTenancy\Models\Tenant;
use Webkul\MultiTenancy\Services\TenantService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

class MultiTenantController extends Controller
{
    protected $tenantService;

    public function __construct(TenantService $tenantService)
    {
        $this->tenantService = $tenantService;
    }

    public function index()
    {
        // Only allow on Main Domain
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $tenants = \Webkul\MultiTenancy\Models\Tenant::all();

        return view('multi_tenancy::admin.tenants.index', compact('tenants'));
    }

    public function create()
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        return view('multi_tenancy::admin.tenants.create');
    }

    public function store(Request $request)
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:50|unique:landlord.tenants,subdomain',
            'admin_name' => 'required|string',
            'admin_email' => 'required|email',
            'admin_password' => 'required|min:6',
        ]);

        try {
            $this->tenantService->createTenant(
                $request->name,
                $request->subdomain,
                $request->admin_name,
                $request->admin_email,
                $request->admin_password
            );

            session()->flash('success', 'Tenant created successfully.');

            return redirect()->route('admin.tenants.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating tenant: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    public function edit($id)
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $tenant = \Webkul\MultiTenancy\Models\Tenant::findOrFail($id);

        return view('multi_tenancy::admin.tenants.edit', compact('tenant'));
    }

    public function update(Request $request, $id)
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $tenant = \Webkul\MultiTenancy\Models\Tenant::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'subdomain' => 'required|string|max:50|unique:landlord.tenants,subdomain,' . $id,
            'database_name' => 'required|string|max:64|unique:landlord.tenants,database_name,' . $id,
            'is_active' => 'boolean',
            'admin_email' => 'nullable|email',
            'admin_password' => 'nullable|min:6',
        ]);

        // Note: Changing database_name here only changes the reference, it does not rename the actual database.
        $tenant->update([
            'name' => $request->name,
            'subdomain' => $request->subdomain,
            'database_name' => $request->database_name,
            'is_active' => $request->boolean('is_active'),
        ]);

        if ($request->filled('admin_email') || $request->filled('admin_password')) {
            try {
                $this->tenantService->updateTenantAdmin(
                    $tenant,
                    $request->admin_email,
                    $request->admin_password
                );
            } catch (\Exception $e) {
                session()->flash('warning', 'Tenant updated, but admin user update failed: ' . $e->getMessage());
                return redirect()->route('admin.tenants.index');
            }
        }

        session()->flash('success', 'Tenant updated successfully.');

        return redirect()->route('admin.tenants.index');
    }

    public function destroy($id)
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $tenant = \Webkul\MultiTenancy\Models\Tenant::findOrFail($id);

        try {
            $tenant->delete(); // Soft delete
            session()->flash('success', 'Tenant deactivated (soft deleted).');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting tenant: ' . $e->getMessage());
        }

        return redirect()->route('admin.tenants.index');
    }

    public function forceDestroy(Request $request, $id)
    {
        if (request()->getHost() !== parse_url(config('app.url'), PHP_URL_HOST)) {
            abort(404);
        }

        $request->validate([
            'password' => 'required',
        ]);

        $admin = auth()->guard('user')->user();
        if (! $admin || ! Hash::check($request->password, $admin->password)) {
             session()->flash('error', 'Incorrect password. Deletion cancelled.');
             return redirect()->back();
        }

        $tenant = \Webkul\MultiTenancy\Models\Tenant::withTrashed()->findOrFail($id);

        try {
            $this->tenantService->forceDeleteTenant($tenant);
            session()->flash('success', 'Tenant permanently deleted.');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting tenant: ' . $e->getMessage());
        }

        return redirect()->route('admin.tenants.index');
    }
}
