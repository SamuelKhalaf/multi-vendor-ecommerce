# Laravel E-Commerce Application

A fully-featured e-commerce platform built with Laravel, providing a seamless shopping experience for users and robust management tools for administrators.

## Features

### User Features
- **User Authentication** – Secure registration, login, and account management.
- **Product Browsing & Search** – Users can explore products by category, brand, and tags, or search using keywords.
- **Shopping Cart & Checkout** – Add products to the cart, review orders, and proceed to checkout.
- **Order Management** – Users can view order history and track order status.
- **Product Reviews & Ratings** – Customers can leave feedback and rate products.

### Product & Inventory Management
- **Product Management** – Admins can create, update, and remove products.
- **Category Management** – Organize products into categories for better navigation.
- **Brand Management** – Assign brands to products for better filtering.
- **Tag Management** – Utilize tags for flexible product organization.

### Administrative Features
- **Multi-Role Admin System** – Different admin types with role-based permissions:
    - **Super Admin** – Full control over the system, including user and admin management.
    - **Product Manager** – Manages products, categories, brands, and tags.
    - **Order Manager** – Handles order processing and status updates.
- **Order Management** – View, update, and manage customer orders.
- **User Management** – Manage customer accounts and administrative roles.

### Additional Technologies & Packages
- **Laravel Framework 10+** – Core framework for the application.
- **Laravel Sanctum** – Authentication for API security.
- **Laravel UI** – Frontend scaffolding for authentication and layouts.
- **Astrotomic Laravel Translatable** – Multi-language support for translatable models.
- **Mcamara Laravel Localization** – Localization management for multilingual content.
- **Spatie Laravel Multitenancy** – Multi-tenancy support for handling multiple stores.
- **Yajra Laravel Datatables** – Advanced data handling and filtering in tables.
- **Guzzle HTTP Client** – API integration for external requests.

## Installation

### Prerequisites
Ensure you have the following installed:
- PHP 8.1+
- Composer
- js & npm
- MySQL or any supported database

### Setup Instructions

1. **Clone the Repository**
   ```bash  
   git clone https://github.com/SamuelKhalaf/laravel_ecommerce.git  
   cd laravel_ecommerce  
   ```  

2. **Install Dependencies**
   ```bash  
   composer install  
   npm install  
   ```  

3. **Configure Environment Variables**
   ```bash  
   cp .env.example .env  
   php artisan key:generate  
   ```  
   Update the `.env` file with your database and application settings.

4. **Run Database Migrations & Seeding**
   ```bash  
   php artisan migrate --seed  
   ```  

5. **Create Storage Symlink**
   ```bash  
   php artisan storage:link  
   ```  

6. **Start the Development Server**
   ```bash  
   php artisan serve  
   ```  

## Contributing

We welcome contributions! Fork the repository, create a feature branch, and submit a pull request.

## License

This project is licensed under the [MIT License](LICENSE).  

