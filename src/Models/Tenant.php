<?php

namespace Webkul\MultiTenancy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->table = config('multi_tenancy.table_name', 'tenants');
    }
    protected $connection = 'landlord';

    protected $fillable = ['name', 'domain', 'subdomain', 'database_name', 'is_active'];

    /**
     * Configure the tenant's database connection.
     *
     * @return void
     */
    public function configure()
    {
        Config::set('database.connections.mysql.database', $this->database_name);

        // If you are using specific DB users per tenant, set them here:
        if (isset($this->database_username) && $this->database_username) {
            Config::set('database.connections.mysql.username', $this->database_username);
        }
        if (isset($this->database_password) && $this->database_password) {
            Config::set('database.connections.mysql.password', $this->database_password);
        }

        // Purge and reconnect to apply changes
        DB::purge('mysql');
        DB::reconnect('mysql');

        // Set as default connection
        DB::setDefaultConnection('mysql');
    }
}
