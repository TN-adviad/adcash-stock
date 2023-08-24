# Virtual Investment Portfolio Management App

This project is a simple web-based investment app for managing virtual investment portfolios. It allows clients to purchase stocks and view their financial information.

## Features

- Purchase stocks for clients
- View client transaction history
- List most profitable clients
- Display recent stocks

## Technologies Used

- Laravel: A PHP web framework used for backend development.
- Vue.js: A progressive JavaScript framework for frontend development.
- Laravel Sail: A lightweight Docker environment for Laravel applications.
- MySQL: The database management system used for storing data.
- PHPUnit: Used for writing and running tests.

## Setup

Clone the repository:

   ```bash
   git clone https://github.com/TN-adviad/adcash-stock.git
   cd adcash-stock
   ```

Install dependencies:
```
composer install
npm install
```
Copy the `.env.example` file to `.env` and update the database and other necessary configurations.

Start the development server:
```bash
./vendor/bin/sail up
npm run dev
```

Access the app at `http://localhost`.

dont forget to run migrations and seeds
```bash
./vendor/bin/sail artisan migrate --seed
```


[Diagram](https://github.com/TN-adviad/adcash-stock/tree/master/public/e-r_diagram.png)
