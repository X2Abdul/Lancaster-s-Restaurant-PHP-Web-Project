# Lancaster's Restaurant Website - Setup Guide
I would recommend to open this README.md in a proper readme preview such as https://markdownlivepreview.com/ for better experience.

## About the Website
Lancaster's Restaurant website consists of two main parts:

* A company introduction website showcasing the restaurant's information for customers, press/media, and potential staff.

* A booking system that allows customers to make reservations and staff to manage bookings for breakfast, lunch, and dinner services.

The system features responsive design for both desktop and mobile viewing, with a focus on accessibility and user experience.

## Installation and Setup Instructions

### Step 1: Website Directory Setup

Place the 'website' folder inside the /var/www/html/ directory.

### Step 2: Open Project in VS Code

Open the website folder in VS Code.

### Step 3: Access Terminal

Open the terminal in VS Code via Terminal -> New Terminal.

### Step 4: Install Composer

Run the following commands:

#### Download Composer Installer
```bash
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
```

#### Install Composer
```bash
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
```

#### Clean up the installer
```bash
php -r "unlink('composer-setup.php');"
```

### Step 5: Install Dependencies

Run the following command:
```bash
composer install
```

This will install all the required dependencies for the project.

### Step 6: Private Directory Setup
For security:
* Move the 'private' folder to /var/www/
* Update includes/dbconnect.php - set `$config` variables to `securePath` ins both functions `db_connect()` and `db_connect_for_db_setup()`
* Update includes/sqldbscript.php - set `$sqlFilePath` variables to `secureFilePath`

Note: 
* For demo purposes, you can keep the private folder in its current location,  use `demoPath` for `$config` and use `secureFilePath` for `$sqlFilePath`.
* If you don't have permission to add file/folder to /var/www/, please move the private folder elsewhere and update the paths of `$config` and `$sqlFilePath` respectively.

### Step 7: Database Setup
Run the following command:
```bash
php includes/sqldbscript.php
```

### Step 8: Start the Server
Launch the PHP development server by running the following command:
```bash
php -S localhost:8000
```

### Step 9: Access the Website
Open your browser and navigate to localhost:8000

You can either use the below Demo accounts or register new accounts.

#### Demo Accounts

Staff Account:
* Email: alicebrown@example.com
* Password: Password@123

Customer Account:
* Email: johndoe@example.com
* Password: Password@123
