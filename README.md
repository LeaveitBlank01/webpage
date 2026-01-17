# User Portal - PHP MySQL Authentication System

A simple and secure user authentication portal built with PHP and MySQL. This project provides user registration, login, and a protected dashboard with session management.

## Features

- User registration with email validation
- Secure login with password hashing
- Protected dashboard with session management
- User details display
- Responsive design with modern UI
- Toast notifications for user feedback
- Logout functionality with confirmation popup

## Prerequisites

Before setting up this project, ensure you have the following installed on your system:

- **XAMPP** (or any PHP/MySQL server stack)
  - PHP 7.4 or higher
  - MySQL 5.7 or higher
  - Apache Web Server
- A modern web browser (Chrome, Firefox, Edge, etc.)

## Installation Steps

### 1. Install XAMPP

1. Download XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Install XAMPP following the installation wizard
3. Make sure to install Apache and MySQL components

### 2. Clone or Download the Project

1. Download this project or clone it to your local machine
2. Copy the entire project folder to your XAMPP `htdocs` directory:
   - **Windows**: `C:\xampp\htdocs\`
   - **Linux/Mac**: `/opt/lampp/htdocs/` or `/Applications/XAMPP/htdocs/`

3. Rename the folder to your preferred name (e.g., `user-portal`)

### 3. Start XAMPP Services

1. Open the XAMPP Control Panel
2. Start **Apache** service
3. Start **MySQL** service
4. Ensure both services are running (green status)

### 4. Database Setup

#### Option A: Using phpMyAdmin (Recommended)

1. Open your web browser and navigate to: `http://localhost/phpmyadmin`
2. Click on the **SQL** tab
3. Copy and paste the contents of `database_setup.sql` into the SQL query box
4. Click **Go** to execute
5. Repeat the process with `create_user.sql` to create the database user

#### Option B: Using MySQL Command Line

1. Open Command Prompt (Windows) or Terminal (Linux/Mac)
2. Navigate to your project directory
3. Connect to MySQL:
   ```bash
   mysql -u root -p
   ```
4. Run the SQL files:
   ```sql
   source database_setup.sql;
   source create_user.sql;
   ```
   Or manually execute the SQL commands from both files

### 5. Configure Database Connection

1. Open `db.php` in a text editor
2. Update the database credentials if needed:
   ```php
   $servername = "localhost";
   $username = "mark";        // Change if you created a different user
   $password = "1234";        // Change to your MySQL user password
   $dbname = "user_portal";
   ```

**Important Security Note**: For production use, change the default username and password in both `create_user.sql` and `db.php` to secure credentials.

### 6. Access the Application

1. Open your web browser
2. Navigate to: `http://localhost/[your-folder-name]/login.php`
   - Example: `http://localhost/user-portal/login.php`
3. You should see the login page

## Project Structure

```
webpage/
├── dashboard.php          # Protected user dashboard
├── login.php              # User login page
├── signup.php             # User registration page
├── logout.php             # Logout handler
├── db.php                 # Database connection configuration
├── style.css              # Stylesheet for all pages
├── database_setup.sql     # Database and table creation script
├── create_user.sql        # MySQL user creation script
└── README.md              # This file
```

## Security Features

- Passwords are hashed using PHP's `password_hash()` function
- Password verification using `password_verify()`
- Session-based authentication
- SQL injection prevention using prepared statements
- XSS protection with `htmlspecialchars()`
- Protected routes (dashboard requires authentication)


## Development Notes

- This project uses PHP sessions for authentication
- All passwords are hashed using `PASSWORD_DEFAULT` algorithm
- The application uses prepared statements to prevent SQL injection
- Responsive design works on desktop and mobile devices


## License

This project is provided as-is for educational purposes.

---
