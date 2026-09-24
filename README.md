Textile Production Management

A Laravel-based textile production management module for managing fabric master data, fabric groups and lay models.

The application brings these production master data activities into one simple workflow with authentication, validation and database relationships.

Features

Authentication

- Email and password based login
- Session based authentication
- Logout functionality
- Protected application pages

Dashboard

- Fabric count
- Fabric Group count
- Lay Model count
- Production workflow overview

Fabric Management

- Create, edit, view and delete fabrics
- Unique fabric code
- Fabric type and composition
- Colour, GSM and width
- Unit and description
- Active / Inactive status
- Search and pagination
- Soft delete support

Fabric Groups

- Create and manage fabric groups
- Assign multiple fabrics to a group
- Remove fabrics from a group
- Search and pagination
- Active / Inactive status

Lay Models

- Create and manage lay models
- Select Fabric Group
- Select Fabric
- Lay length
- Plies
- Status
- Production related details

The Fabric list is filtered based on the selected Fabric Group.

The application also checks the selected Fabric and Fabric Group relationship on the backend before saving a Lay Model.

Data Relationship

Fabric Group
    |
    ├── Fabric
    ├── Fabric
    └── Fabric
          |
          ↓
       Lay Model

A fabric can belong to multiple fabric groups through the fabric_group_fabric pivot table.

Technology Used

- PHP 8.2
- Laravel 12
- SQLite
- Blade
- HTML
- CSS
- JavaScript
- Eloquent ORM

Project Structure

app/
    Http/
        Controllers/
    Models/

database/
    migrations/
    seeders/

resources/
    views/

public/
    css/
    js/

Setup

Install the project dependencies:

composer install

Create the environment file:

copy .env.example .env

Generate the application key:

php artisan key:generate

For SQLite, create the database file when required:

New-Item database/database.sqlite -ItemType File -Force

Run the migrations and seed the database:

php artisan migrate:fresh --seed

Start the development server:

php artisan serve

Open the application at:

http://127.0.0.1:8000

Main Pages

/login
/dashboard
/fabrics
/fabric-groups
/lay-models

Validation and Data Integrity

The Fabric selection in the Lay Model form depends on the selected Fabric Group.
The selected Fabric is also checked on the server side before creating or updating a Lay Model.
Fabric deletion is restricted when the Fabric is already being used by a Lay Model.

Testing

Run the test suite using:

php artisan test

