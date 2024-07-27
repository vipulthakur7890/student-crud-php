**Student CRUD PHP Project**
Introduction
This project is a Student CRUD (Create, Read, Update, Delete) application developed using core PHP for the backend and vanilla JavaScript with basic HTML and CSS for the frontend. It includes the following features:

Teacher login functionality
Teacher portal home
Student listing screen
New student entry feature
Requirements
PHP 7.4 or higher
MySQL
Installation
Step 1: Clone the Repository
bash
-------------------------------------------------------------------
git clone https://github.com/your-username/student-crud-php.git
cd student-crud-php
Step 2: Environment Configuration
Create a configuration file named config.php in the root directory of the project and add your database configuration.

php
-------------------------------------------------------------------
<?php
// config.php

define('DB_SERVER', '127.0.0.1');
define('DB_USERNAME', 'your_database_user');
define('DB_PASSWORD', 'your_database_password');
define('DB_DATABASE', 'school');
?>
Step 3: Import the Database
Download the SQL file named school.sql from the repository. Import this file into your MySQL database.

bash
-------------------------------------------------------------------
mysql -u your_database_user -p school < path/to/school.sql
Make sure the imported database is named school.

Step 4: Set Up Your Web Server
Ensure your web server (e.g., Apache, Nginx) is configured to serve the project files. Point the document root to the student-crud-php directory.

Step 5: Access the Application
Open your web browser and navigate to the location where your project is hosted, for example:

arduino
-------------------------------------------------------------------
http://localhost/student-crud-php
Usage
Login: Access the login page at http://localhost/student-crud-php/login.php.
Dashboard: After logging in, you'll be redirected to the teacher portal home, where you can see the student listing screen.
New Student Entry: Use the dashboard to add new students to the system.
License
This project is licensed under the MIT License. See the LICENSE file for details.

Time Logs
Please refer to the time_logs.md file for a detailed log of the time spent on this project.
