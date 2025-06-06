
## About Restaurant API (Backend)

The Restaurant API is a Laravel 12-based backend for the Restaurant Application, providing RESTful endpoints for managing restaurant data and user authentication. It aims to simplify development with an expressive syntax and powerful tools.

### Key Features
- Simple and fast routing for API endpoints.
- Eloquent ORM for database interactions.
- Built-in CORS support for frontend integration.
- User authentication with registration.

## Learning Laravel

Laravel has extensive [documentation](https://laravel.com/docs) and video tutorials. Check out the [Laravel Bootcamp](https://bootcamp.laravel.com) to build a Laravel app from scratch, or explore [Laracasts](https://laracasts.com) for video tutorials on Laravel and PHP.

## Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone <backend-repository-url>
   cd backend
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Configure Environment**:
   - Copy the `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update with your database credentials:
     ```
     DB_CONNECTION=sqlite
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=restaurant_app
     DB_USERNAME=root
     DB_PASSWORD=
     ```

4. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the Server**:
   ```bash
   php artisan serve
   ```
   Access the API at `http://127.0.0.1:8000`.

## API Endpoints

### User Registration
- **Endpoint**: `POST /api/register`
- **Description**: Registers a new user.


### Restaurant Filtering
- **Endpoint**: `GET /api/restaurants`
- **Description**: Retrieves and filters restaurants.
- **Query Parameters**:
  - `name` (optional): Filter by restaurant name.
  - `date` (optional): Filter by day (e.g., "Mon-Sun").
  - `hours` (optional): Filter by hours (e.g., "11 am - 10 pm").
- **Example Request**:
  ```
  GET /api/restaurants?date=Mon-Sun&hours=11 am - 10 pm
  ```

## CORS Configuration
The API allows requests from `http://localhost:3000`. See `config/cors.php` for details.

## Sponsors
Thank you to the Laravel community and sponsors. Consider supporting Laravel via the [Laravel Partners program](https://partners.laravel.com).

## Contributing
Thank you for considering contributing to the Restaurant API! See the [Laravel contribution guide](https://laravel.com/docs/contributions) for details.

## Code of Conduct
Please review and follow the [Laravel Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities
If you discover a security issue, email [taylor@laravel.com](mailto:taylor@laravel.com). All vulnerabilities will be addressed promptly.

## License
The Restaurant API is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).