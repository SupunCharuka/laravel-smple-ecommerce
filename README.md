# Laravel Simple E-Commerce

## Overview

This is a Laravel-based e-commerce application that allows users to register, log in, view products, add items to their cart, and place orders. It includes CRUD functionalities for products and orders, user authentication, and an API for integration.

## Features

-   User registration and authentication
-   CRUD operations for products
-   View and manage orders
-   Shopping cart functionality
-   RESTful API for products and orders
-   Advanced MySQL queries

## Requirements

-   PHP 8.1 or higher
-   Composer
-   MySQL
-   Laravel 11

## Installation

### 1. Clone the Repository

git clone https://github.com/SupunSynotec/laravel-developer-assignment.git

### 2. Install Dependencies

composer install

### 3. Set Up Environment File

cp .env.example .env or copy .env.example .env

### 4. Generate Application Key

php artisan key:generate

### 5. Migrate the Database

php artisan migrate

### 6. Seed the Database

php artisan db:seed

### 7. Serve the Application

php artisan serve

## Default User Credentials

### Admin

#### Email: admin@gmail.com
#### Password: password

### User

#### Email: user@gmail.com
#### Password: password

[Admin Template](https://adminlte.io/)
