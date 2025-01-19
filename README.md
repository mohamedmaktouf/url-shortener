# URL Shortener Laravel App


## Features

- **User Authentication**: Users can register, log in, and access their dashboard.
- **URL Shortening**: Users can shorten long URLs and generate a custom short URL.
- **URL Click Tracking**: The number of clicks on each shortened URL is tracked and displayed.
- **Edit and Delete Links**: Users can update or delete their shortened links.
- **Paginated URL List**: Users can view their shortened URLs in a paginated table.
- **Redirect Functionality**

## Requirements

- PHP 8.1 or higher
- Laravel 11.x
- Composer
- Npm
- SQLite

## Installation

### Step 1: Clone the Repository

Clone this repository to your local machine using the following command:

```bash
git clone https://github.com/mohamedmaktouf/url-shortener.git

cd url-shortener

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan serve 

pour ce connecter : 
user@user.com 
passowrd
