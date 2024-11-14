<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p> <p align="center"> <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a> <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a> </p>

About the Blog Platform API
This Blog Platform API is built with Laravel, designed to manage posts, comments, and user authentication with role-based permissions. It enables creating, updating, deleting, and viewing blog posts. It includes features like filtering, caching, pagination, and predefined categories, with specific access levels based on user roles (admin or author).

Core Features:
User Authentication: JWT-based, with admin and author roles.
Blog Post Management: CRUD operations, accessible based on user roles.
Comment System: Users can comment on posts.
Filtering & Caching: Efficient post filtering by category, author, and date range, with pagination and caching.
Predefined Categories: Posts are restricted to specific categories like Technology, Lifestyle, and Education.
Setup and Installation
Clone the Repository:

git clone https://github.com/ahmedfawzy167/Blog-Platform.git
cd Blog-Platform
Install Dependencies:

composer install
Configure Environment:

Copy .env.example to .env:
cp .env.example .env
Set up database credentials and other configurations in the .env file.

php artisan key:generate
Run Migrations and Seed Database:

php artisan migrate --seed

Install JWT: https://jwt-auth.readthedocs.io/en/develop/

Generate JWT secret:
Run the Application:

php artisan serve
Endpoints Overview
Method	Endpoint	Description
POST	/api/register	Register a new user
POST	/api/login	Login to obtain a JWT token
POST	/api/posts	Create a new post
GET	/api/posts	List and filter posts
GET	/api/posts/{id}	View a specific post
PUT	/api/posts/{id}	Update a specific post
DELETE	/api/posts/{id}	Delete a specific post
POST	/api/posts/{id}/comments	Comment on a post
GET	/api/posts/search	Search posts by title, author, or category
Detailed Features
User Registration & Login: JWT authentication and role management.
CRUD Operations for Posts: Admins and authors have different permissions.
Comments: Authenticated users can comment on posts.
Filtering and Caching: Cache pagination results for efficient responses.
Validation: Requests validated with Laravel’s FormRequest classes.
Caching and Performance
Caches posts based on filters and pagination. Cached entries last 60 minutes by default.
Contributing
Contributions are welcome! Please follow the contribution guide.

License
This Blog Platform API is open-sourced software licensed under the MIT license.

