SQLedP
## Overview  
 
Welcome to Project Name! This web application utilizes HTML forms to interact with a backend powered by PHP scripts. 
Each HTML form corresponds to a specific functionality, and the form submissions trigger corresponding PHP files, which execute SQL commands on a database.

## Project Structure   
/ProjectRoot
│  

├── form.html 
 
├── php 
 
│ ├── alter.php

│ ├── order_by.php
 
│ ├── process_insert.php

│ └── ...

│

└── sql

├── supermarket_management.sql

└── ...



- **index.html:** The main HTML file containing multiple forms.
- **php/:** Directory containing PHP scripts for handling form submissions.
- **sql/:** Directory containing SQL scripts for database setup and other operations.

## Setup

1. **Database Setup:**
   - Execute the SQL scripts  set up the necessary database tables and configurations.

2. **Configure Database Connection:**
   - Open each PHP file and update the database connection details (e.g., hostname, username, password) as needed.

3. **Web Server Configuration:**
   - Deploy the project on a web server. Ensure that the web server is configured to execute PHP files eg, localhost server(Apache).

4. **Access the Application:**
   - Open the `form.html` file in a web browser to access the application.

## Usage

- Each form in the HTML file corresponds to a specific functionality.
- Upon form submission, the associated PHP script in the `php/` directory is triggered.
- PHP scripts execute SQL commands on the configured database.

## Additional Notes

- This is a basic example and may require additional customization based on specific project requirements.


