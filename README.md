# KPG-Laravel - Khalti Payment Gateway Integration

This branch focuses on integrating the Khalti Payment Gateway into a Laravel 12 application.

## Integrated Packages

### PHP Packages (via Composer)
- **[neputertech/khalti](https://github.com/neputertech/khalti)**: A Laravel wrapper for the Khalti Payment Gateway API.
- **laravel/framework**: Version ^12.0.
- **laravel/tinker**: For interactive shell access.

### Frontend & Build Tools (via NPM)
- **Tailwind CSS v4**: Utility-first CSS framework.
- **Vite v7**: Modern frontend build tool.
- **Axios**: Promise-based HTTP client for the browser.
- **Concurrently**: Run multiple commands concurrently.

## Commands & Setup

A custom setup command has been added to `composer.json` to streamline the project initialization.

### Project Setup
To set up the project from scratch, run:
```bash
composer setup
```
This command performs the following actions:
1. Installs composer dependencies.
2. Creates a `.env` file from `.env.example` (if it doesn't exist).
3. Generates the application key.
4. Runs database migrations.
5. Installs NPM dependencies.
6. Builds frontend assets.

### Development Server
To start the development environment (Laravel server, Vite, and Pail):
```bash
npm run dev
```
*(Note: The `dev` script in `composer.json` uses `concurrently` to manage these processes.)*

## Implementation Details

### Payment Flow
1. **Initiate Payment**: The user enters the cost in `welcome.blade.php` and submits the form to `/pay`.
2. **Khalti Redirect**: `PaymentController@pay` calls the Khalti API and redirects the user to the payment gateway.
3. **Verification**: After a successful payment, Khalti redirects the user back to `/pay/verify`.
4. **Lookup**: `PaymentController@verify` performs a lookup using the `pidx` to confirm the payment status.

### File Reference
- **Routes**: [routes/web.php](file:///home/aurora/Documents/Project/KPG-Larave/routes/web.php) - Defines `/pay` and `/pay/verify`.
- **Controller**: [app/Http/Controllers/PaymentController.php](file:///home/aurora/Documents/Project/KPG-Larave/app/Http/Controllers/PaymentController.php) - Handles the payment logic.
- **Form View**: [resources/views/welcome.blade.php](file:///home/aurora/Documents/Project/KPG-Larave/resources/views/welcome.blade.php) - Contains the payment initiation form.
- **Status View**: [resources/views/index.blade.php](file:///home/aurora/Documents/Project/KPG-Larave/resources/views/index.blade.php) - Displays the payment success message.

## Environment Variables
Ensure the following keys are configured in your `.env` file for Khalti to function:
```env
KHALTI_PUBLIC_KEY=your_public_key
KHALTI_SECRET_KEY=your_secret_key
KHALTI_BASE_URL=https://a.khalti.com/api/v2/ # or sandbox URL
```
