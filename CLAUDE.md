# AI-Agro Backend

## Architecture

Controller → Service → Repository (interface) → Repository (implementation)

All repositories are bound to their interfaces in `AppServiceProvider`. All API routes are protected by `auth:sanctum` middleware except `POST /login`.

## Business Rules

### Society

- A Society represents a company/organization profile. Each User has one Society.
- **GET /societies/{id}**: Returns a single Society by its primary key. Returns HTTP 404 with `{"message": "Society not found"}` if no record exists for the given ID. The authenticated user must be logged in (Sanctum token required).
- **GET /society/**: Returns the Society belonging to the authenticated user (looked up by `user_id`). Returns HTTP 404 if none exists.
- **POST /society/save**: Creates or updates the Society for the authenticated user (upsert by `user_id`). Required fields: `business_name`, `tax_id`. Optional: `country`, `logo`. Returns the saved Society as JSON.

### Farmer

- A Farmer represents a producer managed by a User. Each User can have multiple Farmers (upsert by `user_id`).
- **GET /farmers**: Returns all Farmers belonging to the authenticated user (filtered by `user_id`).
- **GET /farmer/{id}**: Returns a single Farmer by its primary key. Returns HTTP 404 with `{"message": "Farmer not found"}` if not found.
- **POST /farmer/saveOrUpdate**: Creates or updates a Farmer for the authenticated user. Required fields: `name`, `last_name`, `tax_id`. Optional: `id`, `external_code`, `notes`. Returns the saved Farmer as JSON. Returns HTTP 404 with `{"message": "Society not found"}` if the user has no Society.

### Establishment

- An Establishment represents a physical location (farm/field) belonging to a Farmer.
- **GET /establishments**: Returns all Establishments whose Farmer belongs to the authenticated user.
- **GET /establishment/{id}**: Returns a single Establishment by its primary key. Returns HTTP 404 with `{"message": "Establishment not found"}` if not found.
- **POST /establishment/saveOrUpdate**: Creates or updates an Establishment. Required fields: `farmer_id` (must exist), `name`, `latitude`, `longitude`. Optional: `id`, `external_code`, `locality`, `active`. Returns HTTP 404 with `{"message": "Establishment not found"}` if updating a non-existent ID.

### Plot

- A Plot represents a subdivision of an Establishment, associated with both a Farmer and an Establishment.
- **GET /plots**: Returns all Plots whose Farmer and Establishment both belong to the authenticated user.
- **GET /plot/{id}**: Returns a single Plot by its primary key. Returns HTTP 404 with `{"message": "Plot not found"}` if not found.
- **POST /plot/saveOrUpdate**: Creates or updates a Plot. Required fields: `farmer_id` (must exist), `establishment_id` (must exist), `name`, `area`, `latitude`, `longitude`. Optional: `id`, `active`, `external_code`, `polygon`. Returns HTTP 404 with `{"message": "Plot not found"}` if updating a non-existent ID.

### Crop Plan

- A Crop Plan defines a planting blueprint (crop type, season, density targets, etc.) that can be referenced by Campaigns.
- **GET /crop-plans**: Returns all Crop Plans.
- **GET /crop-plan/{id}**: Returns a single Crop Plan by its primary key. Returns HTTP 404 with `{"message": "Crop plan not found"}` if not found.
- **POST /crop-plan/saveOrUpdate**: Creates or updates a Crop Plan. Required fields: `crop`, `sowing_season`, `cycle`, `reference_name`. Optional: `id`, `variety_hybrid`, `sowing_distance_cm`, `target_density_seeds_ha`, `target_density_kg_ha`, `target_sowing_date`, `active`. Returns HTTP 404 with `{"message": "Crop plan not found"}` if updating a non-existent ID.

### Campaign

- A Campaign represents an active planting event linking a Farmer, Establishment, Plot, and Crop Plan.
- **GET /campaigns**: Returns all Campaigns, each including its related Farmer and Establishment.
