# ToDo List App

This ToDo List App is a web-based task management application developed using PHP, Laravel, MySQL, JavaScript, Vue.js, Inertia.js, and Tailwind CSS. It allows you to create tasks with titles and descriptions, helping you stay organized and manage your daily tasks efficiently.

## Features

- **Create Tasks**: Add new tasks to your to-do list with titles and descriptions.
- **Database Storage**: Tasks are stored in a MySQL database for data persistence.
- **User-Friendly Interface**: A clean and intuitive user interface built with Vue.js and Inertia.js.
- **Styling**: Stylish design and responsive layout using Tailwind CSS.

## Installation

```bash
# Clone the repository
git clone [repo-url]

# Navigate to the project directory
cd todo-list-app

# Install PHP dependencies
composer install

# Install JavaScript dependencies
npm install

# Configure environment variables
cp .env.example .env

# Set up your MySQL database and update the .env file with your database credentials
# (DB_CONNECTION, DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, DB_PASSWORD)

# Run database migrations
php artisan migrate

# Run database seeder (optional)
php artisan db:seed ToDoSeeder

# Start the development server
php artisan serve
