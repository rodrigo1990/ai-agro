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
- **GET /farmers**: Returns all Farmers. The authenticated user must be logged in (Sanctum token required).
- **POST /farmer/save**: Creates or updates a Farmer for the authenticated user (upsert by `user_id`). Required fields: `name`, `last_name`, `tax_id`. Optional: `external_code`, `notes`. Returns the saved Farmer as JSON. Returns HTTP 404 with `{"message": "Society not found"}` if the user has no Society.
