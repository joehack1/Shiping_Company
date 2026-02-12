# Anzunzu Shipping

Anzunzu Shipping is a Kenya-based overseas logistics site focused on international shipping, import management, and warehousing/storage services. The site presents a serious, blue-and-white visual identity with a sliding hero banner and dedicated service pages.

## Services Covered
- Overseas shipping (ocean and air freight)
- Import management and customs coordination
- Warehousing and storage (bonded and non-bonded)
- Shipment tracking (UI)
- Quote requests (UI)
- Contact inquiries (UI)

## Pages & Routes
- `/` Home (hero slider + overview)
- `/about` Company overview
- `/services` Service catalog
- `/shipping` Overseas shipping details
- `/importing` Import management details
- `/warehousing` Warehousing and storage
- `/tracking` Shipment tracking form (static UI)
- `/quote` Quote request form (static UI)
- `/contact` Contact form (static UI)

## Backoffice (Admin)
Backoffice is powered by Backpack for Laravel and available at `/admin`.

### Admin Features
- Manage services (CRUD)
- Create and manage quotations
- View activity logs (content changes)
- View system logs (latest Laravel logs)

### Admin Login
Admin user is created by seeding. Set credentials in `.env`:

```
ADMIN_NAME="BlueWave Admin"
ADMIN_EMAIL=admin@bluewaveshipping.co.ke
ADMIN_PASSWORD=ChangeMe123!
```

Run the seeder after migrations:

```bash
php artisan db:seed
```

## Data Model (Migrations)
- `shipments` store shipment details and milestones
- `quotes` store quote requests
- `services` store managed service entries
- `warehouses` store warehouse locations and capacities
- `storage_contracts` store client storage agreements
- `contact_messages` store inbound contact messages
- `activity_log` store content change history

Migration files are in `database/migrations`.

## Frontend Assets
Hero slider images live in `public/assets`. Styling is defined in `public/css/site.css`.

## Getting Started
1. Configure your environment in `.env`.
2. Run migrations:

```bash
php artisan migrate
```

3. Seed the admin user:

```bash
php artisan db:seed
```

4. Start the app:

```bash
php artisan serve
```

## Notes
- The public forms are currently UI-only. Wire them to controllers and models if you need persistence.
- Adjust hero slider timing or text in `resources/views/pages/home.blade.php`.
