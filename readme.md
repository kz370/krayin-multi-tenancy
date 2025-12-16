# Krayin CRM Multi-Tenancy

A multi-tenancy extension for Krayin CRM. This package enables **Database-per-Tenant** architecture, allowing you to host multiple isolated organizations on a single Krayin installation.

## Installation

1.  **Install via Composer:**
    ```bash
    composer require kz370/krayin-multi-tenancy
    ```

2.  **Publish Config & Migrations:**
    ```bash
    php artisan vendor:publish --tag=krayin-multi-tenancy-config
    php artisan vendor:publish --tag=krayin-multi-tenancy-migrations
    ```

3.  **Environment Setup:**
    The package automatically uses your primary database connection (`DB_DATABASE`) as the "Landlord" (Central) database.

    Ensure your database user (in `.env`) has **CREATE DATABASE** permissions, as the package automatically creates new databases for each tenant.

    | Variable | Default | Description |
    | :--- | :--- | :--- |
    | `DB_CONNECTION` | `mysql` | The default connection. |
    | `DB_LANDLORD_DATABASE` | `NULL` | Optional. Defaults to your main `DB_DATABASE`. |

4.  **Setup Landlord Database:**
    Run the migrations and the Krayin installer to set up the main system tables (including the `tenants` table).
    ```bash
    php artisan migrate
    php artisan krayin-crm:install
    ```

## Configuration

You can customize behavior in `config/multi_tenancy.php`.

| Option | Key | Default | Description |
| :--- | :--- | :--- | :--- |
| **Menu Visibility** | `show_menu` | `true` | Show/Hide "Tenants" in the admin sidebar. |
| **Database Prefix** | `database_prefix` | `'krayin_'` | Prefix for generated tenant DBs (e.g., `krayin_client1`). |
| **Landlord Connection** | `landlord_connection_name`| `'landlord'` | Internal connection name for the central DB. |

## Usage

### 1. Create a Tenant
1.  Log in to the **Landlord Admin Panel** (your main domain, e.g., `app.com`).
2.  Navigate to **Tenants** in the sidebar.
3.  Click **Add Tenant** and enter:
    *   **Name**: The internal name for the tenant (e.g., "Acme Corp").
    *   **Subdomain**: The prefix for their URL (e.g., `acme` -> `acme.app.com`).
    *   **Admin Details**: The initial login credentials for the tenant's administrator.
4.  **Hit Save.**
    *   *System Action:* The package creates a new database `krayin_acme`, runs all migrations, and seeds the admin user.

### 2. Access a Tenant
1.  Navigate to the tenant's subdomain (e.g., `http://acme.localhost` or `http://acme.app.com`).
2.  Log in with the **Admin Email** and **Password** defined during creation.
3.  All data created here (Leads, Persons, Settings) is essentially invisible to other tenants.

## Important Notes

*   **Wildcard Subdomains:** For production, ensure your DNS is configured to handle wildcard subdomains (`*.yourdomain.com`) pointing to your server.
*   **Local Development:** If testing locally, you must add subdomains to your `/etc/hosts` file (e.g., `127.0.0.1 client1.localhost`) or use a tool like Laravel Valet or Laragon that handles this automatically.
*   **Database User:** The MySQL user configured in your `.env` must have privileges to create and drop databases.

## Artisan Commands

Use these commands to keep tenant databases up to date with your code.

| Command | Description |
| :--- | :--- |
| `php artisan tenants:migrate` | Run `migrate` on **all** active tenant databases. |
| `php artisan tenants:migrate 5` | Run `migrate` on a specific tenant (ID: 5). |
| `php artisan tenants:migrate --fresh --seed` | **Destructive**: Wipe and re-seed all tenant databases. |

## Troubleshooting

### 1. 404 Not Found on Tenant Subdomain
*   **Localhost:** Ensure you have added the subdomain to your hosts file.
    *   Windows: `C:\Windows\System32\drivers\etc\hosts`
    *   Mac/Linux: `/etc/hosts`
    *   Entry: `127.0.0.1  client1.localhost`
*   **Production:** Ensure you have a **Wildcard DNS** A-Record (`*.yourdomain.com`) in your domain registrar pointing to your server's IP address.

### 2. "Access Denied" during Tenant Creation
*   The package tries to create a **new SQL database** automatically.
*   Ensure the `DB_USERNAME` in your `.env` file has the `CREATE DATABASE` permission.
*   *Fix:* Grant full privileges to your database user or ensure they can create new databases.

### 3. Migrations applied to Landlord but not Tenant
*   Running `php artisan migrate` **ONLY** updates the Landlord (Central) database.
*   To update tenant databases (e.g., if you added a new column to `leads`), you must run:
    ```bash
    php artisan tenants:migrate
    ```

### 4. Admin Login Failed on Tenant
*   Users are isolated. An admin account created on the Landlord (Main Domain) **does not exist** on the Tenant database.
*   Use the specific credentials you defined in the "Admin Details" section when you created the Tenant.
