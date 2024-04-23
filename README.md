# User CRUD Test

This project utilizes Jetstream/Inertia scaffolding for user management. Once logged in, users are presented with a link for Products, leading to a table dashboard for medicines with relevant data. Admin users can create, update, and delete products, while regular users have read-only access.

Roles have been added so you can test the following scenarios:

- Admin login: Use email `admin@app.com` and password `password` to log in as an admin. Admins can create, update, and delete products.
- User registration: Register as a new user. Regular users have read-only permissions for the products.

### Features and Technologies

The project showcases several features and technologies:

- **Jetstream Inertia**: Used for user management and to build a seamless, dynamic user interface.
- **Laravel and Vue.js**: Leveraged for the backend and frontend, respectively, for a robust and interactive user experience.
- **CRUD Operations**: Implemented for products, allowing admins to manage product data efficiently.
- **RESTful APIs**: Used to communicate between the frontend and backend, ensuring smooth data flow.
- **Pagination**: Implemented for better organization and navigation of product data.
- **Search Functionality**: Implemented for products, enabling users to find specific items easily.
- **Authentication and Authorization**: Utilized to control user access and permissions.
- **Database Management**: Handled through MySQL, ensuring efficient data storage and retrieval.

Together, these technologies and methods create a powerful and user-friendly application for managing medicine products.
### Setup Instructions

1. Clone the repository.
2. Run `npm install` to install frontend dependencies.
3. Run `composer install` to install backend dependencies.
4. Set up your environment variables in the `.env` file, including your database configuration.
5. Run `php artisan migrate` to migrate the database schema.
6. Seed roles and permissions for admin and user roles.
7. Start the development server with `php artisan serve`.
8. Build the frontend assets with `npm run dev`.
9. Access the application and test the user CRUD functionality.

## About Laravel

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
