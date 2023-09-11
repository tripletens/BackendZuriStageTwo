
# BackendZuriStageTwo
# Person Management API

This project is a simple API for managing persons. It allows you to create, read, update, and delete persons.

## Table of Contents

- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Usage](#usage)
- [Endpoints](#endpoints)
- [Testing](#testing)
- [Contributing](#contributing)
- [License](#license)

## Getting Started

Follow the steps below to get this API up and running on your local machine.

### Prerequisites

Make sure you have the following software/tools installed:

- PHP (>= 7.3)
- Composer
- Laravel (optional)
- MySQL (optional)

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/tripletens/BackendZuriStageTwo.git
   ```
2. Change to the project directory:
    ```cd BackendZuriStageTwo```
3. Install PHP dependencies:
    ``` composer install ```
4. Generate a unique application key using the following command:
    ```php artisan key:generate```

### Configure Database

1. Open the .env file and configure your database connection settings. Set the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD values according to your local database setup.

Save the changes to the .env file.
```cp .env.example .env```

### Migrate and Seed the Database

1. Run the following command to create the database tables:
```php artisan migrate```

2. If your application has seeders, you can run them to populate the database with initial data:
```php artisan db:seed```

### Serve the Application

1. To start a local development server, use the following command:
```php artisan serve```

This will start a development server at http://localhost:8000. You can access the Laravel application in your web browser at this address.

## Usage

You can use this API to perform CRUD operations on persons. The API provides the following endpoints:

### Endpoints
- Create a Person
    ```bash POST /api ```
    - Request Body:
        ```json 
        {
            "name": "John Doe"
        }
- Fetch All Persons
    ```bash GET /api```

- Fetch a Person by ID
    ```bash GET /api/{id} ```

- Update a Person by ID
    ```bash PUT /api/{id} ```

    - Request Body: 
    ```json 
        {
            "name": "Updated Name"
        }
- Delete a Person by ID
    ```bash DELETE /api/{id}```

## Testing
To run the tests for this API, you can use the following command:

```bash php artisan test```

## Contributing
If you'd like to contribute to this project, please follow these guidelines:

- Fork the repository.
- Create a new branch for your feature or bug fix.
- Make your changes and commit them.
- Push your changes to your fork.
- Create a pull request.

## Postman Documentation
https://documenter.getpostman.com/view/21370111/2s9YC2ytRh

## License
This project is open-source and available under the MIT License.

```bash 
This `README.md` provides detailed instructions on how to set up, use, and contribute to your Person Management API project. Please make sure to update the placeholders and add more information as needed.
```
