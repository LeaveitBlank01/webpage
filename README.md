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

## Usage

### Creating a New Account

1. Click on **"Sign Up"** link on the login page
2. Fill in the registration form:
   - Full Name
   - Email (must be unique)
   - Password
3. Click **"Sign Up"** button
4. You'll be redirected to the login page with a success message

### Logging In

1. Enter your registered email and password
2. Click **"Login"** button
3. You'll be redirected to the dashboard

### Dashboard Features

- View welcome message with your name
- Access user details from the sidebar menu
- Logout with confirmation popup

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

## Database Schema

The `users` table has the following structure:

- `id` - Primary key (auto-increment)
- `fullname` - User's full name (VARCHAR 100)
- `email` - User's email address (VARCHAR 100, unique)
- `password` - Hashed password (VARCHAR 255)
- `created_at` - Account creation timestamp

## Security Features

- Passwords are hashed using PHP's `password_hash()` function
- Password verification using `password_verify()`
- Session-based authentication
- SQL injection prevention using prepared statements
- XSS protection with `htmlspecialchars()`
- Protected routes (dashboard requires authentication)

## Troubleshooting

### Issue: "Connection failed" error

**Solution:**
- Verify MySQL service is running in XAMPP Control Panel
- Check database credentials in `db.php`
- Ensure the database user exists and has proper privileges
- Verify database name is correct

### Issue: Page not loading / 404 error

**Solution:**
- Check that Apache service is running
- Verify the project folder is in the correct `htdocs` directory
- Check the URL path matches your folder name
- Clear browser cache

### Issue: Database errors

**Solution:**
- Ensure you've run both SQL setup files (`database_setup.sql` and `create_user.sql`)
- Verify the database `user_portal` exists
- Check that the MySQL user has proper permissions
- Try recreating the database and user

### Issue: Session not working

**Solution:**
- Check PHP session configuration in `php.ini`
- Ensure cookies are enabled in your browser
- Verify file permissions on the project directory

### Issue: Styling not loading

**Solution:**
- Check that `style.css` is in the same directory as PHP files
- Verify the CSS file path in HTML `<link>` tags
- Clear browser cache

## Default Credentials

**Database User:**
- Username: `mark`
- Password: `1234`

**⚠️ Important**: Change these default credentials before deploying to production!

## Development Notes

- This project uses PHP sessions for authentication
- All passwords are hashed using `PASSWORD_DEFAULT` algorithm
- The application uses prepared statements to prevent SQL injection
- Responsive design works on desktop and mobile devices

## Future Enhancements

Potential improvements you could add:
- Password reset functionality
- Email verification
- User profile editing
- Remember me feature
- Two-factor authentication
- Admin panel

## Support

If you encounter any issues during setup:
1. Check the troubleshooting section above
2. Verify all prerequisites are installed correctly
3. Ensure XAMPP services are running
4. Check PHP error logs in XAMPP control panel

## License

This project is provided as-is for educational purposes.

---

**Happy Coding! 🚀**
