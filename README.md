# Todo App

## Overview

This Todo App is built using **Laravel** on the backend and **Vite** with modern JavaScript tooling on the frontend. The app includes complete user authentication, allowing each user to manage their own set of tasks (todos). Users can add, view, edit, and delete their own todos, with all tasks being private to the individual user.

## Features

- **User Authentication**: Users can register, log in, and manage their profile.
- **User-Specific Todos**: Each user has a private set of todos that only they can access. 
- **CRUD Operations**: Users can create, view, edit, and delete their own todos.
- **Responsive UI**: The app's interface is built with **Bootstrap 5**, ensuring responsiveness across different devices.

## Requirements

- **PHP**: ^8.2
- **Node.js**: ^16.x or ^18.x
- **Composer**: ^2.x
- **MySQL** or **SQLite**

## Getting Started

### Prerequisites

Make sure you have the following installed:

- PHP >= 8.2
- Composer
- Node.js & npm
- MySQL (or another supported database)

### Installation

1. **Clone the repository**:

   ```bash
   git clone <repository-url>
   cd todo-app
   ```

2. **Install PHP dependencies**:

   Using Composer, install all the backend dependencies:

   ```bash
   composer install
   ```

3. **Install Node.js dependencies**:

   Using npm or yarn, install all frontend dependencies:

   ```bash
   npm install
   ```

4. **Set up environment file**:

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

   Then, configure your `.env` file with your database credentials and other settings (e.g., `APP_URL`, `DB_CONNECTION`, `DB_DATABASE`, etc.).

5. **Generate the application key**:

   Run the following command to generate the application key:

   ```bash
   php artisan key:generate
   ```

6. **Run database migrations**:

   You need to migrate the database schema using Laravel migrations:

   ```bash
   php artisan migrate
   ```

   Optionally, you can create an SQLite database if you're not using MySQL:

   ```bash
   touch database/database.sqlite
   ```

   Don't forget to adjust your `.env` to match the SQLite database settings.

7. **Compile assets**:

   To compile frontend assets using Vite:

   ```bash
   npm run dev
   ```

### Running the App

To serve the Laravel application locally, run:

```bash
php artisan serve
```

Then, open [http://localhost:8000](http://localhost:8000) in your browser.

You can also use Vite’s live server for the frontend (in a separate terminal):

```bash
npm run dev
```

### Building for Production

To prepare the app for production, use the following commands to compile the assets and optimize the application:

```bash
npm run build
php artisan optimize
```

## Directory Structure

- `app/`: Contains the core of your Laravel application.
- `database/`: Contains migrations, factories, and seeders.
- `resources/`: Contains frontend views and assets.
- `public/`: Contains publicly accessible files, like compiled CSS and JavaScript.
- `routes/`: Defines the web and API routes.
- `tests/`: Contains application tests.

## Technology Stack

- **Backend**: Laravel 11.9 (PHP 8.2)
- **Frontend**: Vite, Bootstrap 5, Sass
- **Authentication**: Laravel’s built-in authentication system
- **Database**: MySQL or SQLite
- **Task Management**: Each user has a private list of todos

## Todo Management

Each user has the ability to:

- **Add a new todo**: Users can create new todos that will be added to their personal todo list.
- **View todos**: Users can view all their todos in a dashboard.
- **Edit todos**: Users can update existing todos, modifying task details like title, description, and due date.
- **Delete todos**: Users can delete a todo when it’s completed or no longer needed.

## API Endpoints

Here are the key routes for the application:

- **User Authentication**:
  - `/login`: User login
  - `/register`: User registration
  - `/logout`: User logout
  - `/profile`: View/update user profile

- **Todo Management**:
  - `/todos`: List of todos for the authenticated user
  - `/todos/create`: Create a new todo
  - `/todos/{id}/edit`: Edit an existing todo
  - `/todos/{id}/delete`: Delete a specific todo

## Development Dependencies

- **Vite**: Development server and build tool
- **Laravel Pint**: Code style fixer
- **PHPUnit**: Unit testing framework
- **Sass**: CSS preprocessor
- **Bootstrap 5**: Frontend framework for responsive UI

## Deployment

When deploying the app to a production server, make sure to:

1. **Install production dependencies**:

   ```bash
   composer install --optimize-autoloader --no-dev
   npm install --production
   ```

2. **Compile frontend assets**:

   ```bash
   npm run build
   ```

3. **Migrate the database**:

   ```bash
   php artisan migrate --force
   ```

4. **Set correct file permissions** (for your server):

   ```bash
   sudo chown -R www-data:www-data storage
   sudo chown -R www-data:www-data bootstrap/cache
   ```

5. **Run optimizations**:

   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```

## Contributing

Feel free to contribute to this project by opening issues or submitting pull requests. Make sure to follow the [Laravel coding standards](https://laravel.com/docs/contributions).

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).