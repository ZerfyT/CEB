# **Laravel Electricity Board System**

This is a Laravel web application developed for managing electricity board operations in a general setting. It provides various features for managing billing, payments, meter readings, and user roles. The system supports multiple user roles, including admin, cashier, meter reader, and customer, each with specific permissions and functionalities. With this application, electricity board companies can efficiently handle billing, payment tracking, meter readings, and user management, enhancing their overall operational efficiency.

## **Features**

- **Customer**
  - View all previous bills and payments
  - Download bills and payments as PDF
- **Meter Reader**
  - Add meter readings in real-time
  - View all registered customers
  - View previous meter readings
  - Automatically send bills via email
- **Cashier**
  - View all registered customers
  - View customer bills
  - Pay customer bills
  - Automatically send bill payment receipts via email
- **Admin**
  - Monitor all activities
  - Manage users and their roles

## **Prerequisites**

- [PHP](https://www.php.net/) >= 8.0
- [Composer](https://getcomposer.org/) - Dependency Manager for PHP
- [Node.js](https://nodejs.org/en) - JavaScript runtime environment
- [MySQL](https://www.mysql.com/) or any other compatible database system

## **Installation**

1. Clone the repository:

```sh
git clone https://github.com/ZerfyT/CEB.git
```

2. Install the dependencies:

```sh
cd CEB
composer install
npm install
```

3. Create a copy of the .env.example file and rename it to .env. Update the necessary configuration values such as database connection details and email settings:

```bash
cp .env.example .env
```

4. Generate a new application key:

```bash
php artisan key:generate
```

5. Run the database migrations and seed the initial data:

```bash
php artisan migrate --seed
```

6. Compile the assets (CSS and JS files):

```bash
npm run dev
```

7. Start the queue worker to process background jobs:

```bash
php artisan queue:work
```

8. Start the development server:

```bash
php artisan serve
```

9. Open your web browser and visit <http://localhost:8000> to access the application.

## **Usage**

- Register a new user account to access the respective functionalities.
- Log in to the system using your credentials.
- Contact the admin to change your role to the desired one (cashier, meter reader, or admin).
- Once the admin updates your role, you will gain access to the corresponding features and permissions associated with your new role.
- Explore the application and perform various actions based on your assigned role.

- The system comes with pre-seeded sample user accounts for testing purposes:
  - Cashier
    - Email: <cashier@gmail.com>
    - Password: password
  - Meter Reader
    - Email: <mreader@gmail.com>
    - Password: password
  - Customer
    - Email: <user@gmail.com>
    - Password: password

## **Roadmap**

The development roadmap for this project includes the following:

- Implementing the admin panel for monitoring activities and managing users.
- Enhancing the user interface and user experience.
Adding additional features based on user feedback and requirements.

## **License**

This project is licensed under the [MIT License](https://opensource.org/licenses/MIT).

## **Acknowledgments**

- [Laravel](https://laravel.com/) - The PHP Framework for Web Artisans
- [Bootstrap](https://getbootstrap.com/) - Front-end Framework
- [Bootstrap Icons](https://icons.getbootstrap.com/) - Icon Set
- [DomPdf](https://github.com/barryvdh/laravel-dompdf) - PDF Processing Library
- [Mailtrap](https://mailtrap.io/) - Email Testing
- [Spatie Permission](https://spatie.be/docs/laravel-permission/v5/introduction) User Roles and Permission Management
