# Laravel E-Commerce API

This project is a CRUD API for managing products in an E-Commerce application, built using Laravel. The API allows clients to create, read, update, and delete products, and includes features like data validation, error handling, and caching.

## Features

- **CRUD Operations**: Create, Read, Update, Delete products.
- **Validation**: Ensures data integrity with Laravel's validation rules.
- **Error Handling**: Returns appropriate HTTP status codes and error messages.
- **Caching**: Caches product data to improve performance.
- **API Documentation**: Uses OpenAPI (Swagger) for documenting API endpoints.
- **Docker Support**: Docker configuration for containerized deployment.
 

## Getting Started

### Prerequisites

- PHP 8.0 or higher
- Composer
- MySQL
- Git

### Installation

1. Clone the repository:
    ```bash
    git clone https://github.com/your-username/laravel-ecommerce-api.git
    cd laravel-ecommerce-api
    ```

2. Install dependencies:
    ```bash
    composer install
    ```

3. Set up the environment:
    - Copy the example environment file and configure the necessary settings:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your database credentials and other necessary configurations.

4. Generate an application key:
    ```bash
    php artisan key:generate
    ```

5. Run the migrations:
    ```bash
    php artisan migrate
    ```

6. Seed the database (optional):
    ```bash
    php artisan db:seed
    ```

### Running the Application

Start the Laravel development server:
```bash
php artisan serve
```

### API Endpoints

The API provides the following endpoints:

-GET /api/products: Retrieve a list of products.
-POST /api/products: Create a new product.
-GET /api/products/{id}: Retrieve a specific product by ID.
-PUT /api/products/{id}: Update a specific product by ID.
-DELETE /api/products/{id}: Delete a specific product by ID.

### API Documentation
-API documentation is available using Swagger at /api/documentation.

### Caching
-The API uses Laravel's caching to improve performance. The products list and individual product details are cached for one hour (3600 seconds). Cache is cleared automatically upon product creation, update, or deletion.

### Docker Support
To run the application in a Docker container:
-Ensure Docker is installed on your machine.
-Build and start the containers
```bash
docker-compose up --build
```

### Acknowledgements
-Laravel - The PHP framework for web artisans.
-Docker - Container platform for developers and sysadmins.
-Swagger - API documentation and design tools.





