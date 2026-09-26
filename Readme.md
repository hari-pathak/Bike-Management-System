# Bike Management System

A web-based **Bike Management System** developed using **PHP, MySQL, HTML, Tailwind CSS, and JavaScript**..........

The system provides an admin panel for managing bikes and customer enquiries, along with a public-facing website where customers can browse available bikes, view bike details, and submit enquiries.

---

## 📌 Project Overview

The Bike Management System is designed to make bike management and customer interaction simple and organized.

The system has two main parts:

### 1. Public / Client Side

Customers can:

* View the homepage
* Browse available bikes
* View detailed information about a bike
* View bike images
* Check bike price, model, year, color, and registration number
* Submit an enquiry about a particular bike
* View the enquiry submission confirmation
* Read information about the business
* View contact information

### 2. Admin Side

Administrators can:

* Register an admin account
* Login securely
* Logout
* View dashboard statistics
* Add new bikes
* Upload bike images
* View all bikes
* Edit bike information
* Change bike images
* Delete bikes
* Change bike status between Available and Sold
* View customer enquiries
* View customer information
* Update enquiry status
* Track New, Contacted, and Closed enquiries

---

# ✨ Features

## Admin Features

### Authentication

* Admin registration
* Admin login
* Password hashing using PHP `password_hash()`
* Password verification using `password_verify()`
* Session-based authentication
* Protected admin pages
* Admin logout

### Dashboard

The dashboard displays:

* Total Bikes
* Available Bikes
* Sold Bikes
* Total Enquiries
* New Enquiries
* Contacted Enquiries
* Closed Enquiries

### Bike Management

Administrators can:

* Add bikes
* Edit bikes
* Delete bikes
* View bike information
* Upload bike images
* Replace existing bike images
* Set bike status as Available or Sold
* Prevent duplicate registration numbers

### Customer Enquiry Management

Administrators can:

* View all customer enquiries
* See customer name
* See phone number
* See email address
* See the bike related to the enquiry
* Read customer messages
* View enquiry date and time
* Change enquiry status

Available enquiry statuses:

* New
* Contacted
* Closed

---

# 👤 Client Features

Customers can:

* Browse available bikes without logging in
* View bike images
* View detailed bike information
* Send an enquiry about a specific bike
* Receive an enquiry submission confirmation
* Access About Us page
* Access Contact Us page

---

# 🛠️ Technologies Used

| Technology   | Purpose                       |
| ------------ | ----------------------------- |
| PHP          | Backend and server-side logic |
| MySQL        | Database                      |
| HTML5        | Page structure                |
| Tailwind CSS | Styling and responsive design |
| JavaScript   | Client-side interactions      |
| XAMPP        | Local development environment |
| Apache       | Local web server              |
| phpMyAdmin   | Database management           |

---

# 📁 Project Structure

```text
Bike Management System/
│
├── index.php
├── register.php
├── admin_register.php
├── login.php
├── login_process.php
├── logout.php
├── dashboard.php
├── db.php
│
├── bikes/
│   ├── add.php
│   ├── add_process.php
│   ├── index.php
│   ├── edit.php
│   ├── edit_process.php
│   └── delete.php
│
├── enquiries/
│   ├── index.php
│   └── update_status.php
│
├── enquiry.php
├── enquiry_process.php
├── enquiry_success.php
├── client_bikes.php
├── bike_details.php
├── about.php
├── contact.php
│
├── uploads/
│   └── bike images
│
├── images/
│   ├── hero-bike-1.jpg
│   ├── hero-bike-2.jpg
│   └── hero-bike-3.jpg
│
└── js/
    └── script.js
```

---

# 🗄️ Database

The project uses a MySQL database named:

```text
bike_management
```

The main tables are:

```text
users
bikes
enquiries
```

## Users Table

Stores administrator account information.

Main fields:

```text
id
name
email
address
phone
password
created_at
```

Passwords are stored using PHP password hashing.

---

## Bikes Table

Stores bike information.

Main fields:

```text
id
bike_name
brand
model
registration_number
price
year
color
image
status
created_at
```

The bike status can be:

```text
Available
Sold
```

---

## Enquiries Table

Stores customer enquiries.

Main fields:

```text
id
bike_id
name
phone
email
message
status
created_at
```

The enquiry status can be:

```text
New
Contacted
Closed
```

The `bike_id` connects each enquiry to the bike the customer is interested in.

---

# 🚀 How to Run the Project

Follow these steps to run the project on a Windows computer.

## Step 1: Install XAMPP

Download and install XAMPP.

XAMPP provides:

* Apache
* MySQL
* phpMyAdmin
* PHP

After installing XAMPP, open the **XAMPP Control Panel**.

Start:

```text
Apache
MySQL
```

Both services should show as running.

---

# Step 2: Locate the XAMPP `htdocs` Folder

The project must be placed inside the XAMPP `htdocs` folder.

For example:

```text
E:\xampp\htdocs\
```

Place the complete project folder there:

```text
E:\xampp\htdocs\Bike Management System
```

The final structure should start like:

```text
E:\xampp\htdocs\Bike Management System\
```

---

# Step 3: Create the Database

Open your browser and go to:

```text
http://localhost/phpmyadmin
```

Click:

```text
New
```

Create a database named:

```text
bike_management
```

---

# Step 4: Create the Users Table

Select the `bike_management` database.

Open the **SQL** tab and run:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    address VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

---

# Step 5: Create the Bikes Table

Run:

```sql
CREATE TABLE bikes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bike_name VARCHAR(100) NOT NULL,
    brand VARCHAR(100) NOT NULL,
    model VARCHAR(100) NOT NULL,
    registration_number VARCHAR(50) NOT NULL UNIQUE,
    price DECIMAL(10,2) NOT NULL,
    year INT NOT NULL,
    color VARCHAR(50) NOT NULL,
    status VARCHAR(20) NOT NULL DEFAULT 'Available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

Then add the image column:

```sql
ALTER TABLE bikes
ADD COLUMN image VARCHAR(255) DEFAULT NULL
AFTER color;
```

---

# Step 6: Create the Enquiries Table

Run:

```sql
CREATE TABLE enquiries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    bike_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (bike_id)
    REFERENCES bikes(id)
    ON DELETE CASCADE
);
```

Then add the enquiry status:

```sql
ALTER TABLE enquiries
ADD COLUMN status VARCHAR(20) NOT NULL DEFAULT 'New'
AFTER message;
```

---

# Step 7: Check the Database Connection

Open:

```text
db.php
```

The database connection should be:

```php
<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "bike_management";

$conn = new mysqli(
    $host,
    $username,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

?>
```

If your MySQL username, password, or database name is different, update these values.

---

# Step 8: Check the Uploads Folder

Make sure this folder exists:

```text
E:\xampp\htdocs\Bike Management System\uploads
```

This folder is used to store uploaded bike images.

The project supports:

```text
JPG
JPEG
PNG
WEBP
```

Maximum image size:

```text
5 MB
```

---

# Step 9: Check the Hero Images

Make sure the following images exist:

```text
images/
├── hero-bike-1.jpg
├── hero-bike-2.jpg
└── hero-bike-3.jpg
```

These images are used by the homepage hero carousel.

---

# Step 10: Open the Project

Open your browser and visit:

```text
http://localhost/Bike%20Management%20System/
```

The public homepage should appear.

---

# Step 11: Create an Admin Account

Open the admin registration page.

Depending on the project setup, use:

```text
http://localhost/Bike%20Management%20System/admin_register.php
```

Register an administrator account.

Provide:

* Name
* Email
* Address
* Phone
* Password

---

# Step 12: Login to the Admin Panel

Open:

```text
http://localhost/Bike%20Management%20System/login.php
```

Enter the admin email and password you created.

After successful login, you will be redirected to:

```text
dashboard.php
```

---

# Step 13: Add a Bike

From the admin dashboard:

```text
Dashboard
    ↓
Add New Bike
```

Enter:

* Bike Name
* Brand
* Model
* Registration Number
* Price
* Year
* Color
* Bike Image
* Status

Click:

```text
Add Bike
```

The bike will then appear in the bike management section.

---

# Step 14: Check the Public Bike Listing

Go to:

```text
http://localhost/Bike%20Management%20System/client_bikes.php
```

The bike marked as:

```text
Available
```

will appear on the public website.

Bikes marked:

```text
Sold
```

will not appear in the public available-bike listing.

---

# Step 15: Test the Customer Enquiry

From the public website:

```text
Available Bikes
       ↓
View Details
       ↓
Send Enquiry
```

Fill in:

* Name
* Phone
* Email
* Message

Submit the enquiry.

The customer will be redirected to the enquiry success page.

---

# Step 16: Check the Enquiry in Admin Panel

Login to the admin panel and open:

```text
Customer Enquiries
```

The submitted enquiry will appear there.

The administrator can change its status:

```text
New
Contacted
Closed
```

The dashboard statistics will automatically reflect the current enquiry counts.

---

# 🔐 Admin URLs

Main admin pages include:

```text
Login:
http://localhost/Bike%20Management%20System/login.php

Dashboard:
http://localhost/Bike%20Management%20System/dashboard.php

Bike Management:
http://localhost/Bike%20Management%20System/bikes/

Customer Enquiries:
http://localhost/Bike%20Management%20System/enquiries/
```

---

# 🌐 Public URLs

Homepage:

```text
http://localhost/Bike%20Management%20System/
```

Available Bikes:

```text
http://localhost/Bike%20Management%20System/client_bikes.php
```

About Us:

```text
http://localhost/Bike%20Management%20System/about.php
```

Contact Us:

```text
http://localhost/Bike%20Management%20System/contact.php
```

---

# 📊 System Flow

```text
                    BIKE MANAGEMENT SYSTEM
                             │
             ┌───────────────┴───────────────┐
             │                               │
        CLIENT SIDE                     ADMIN SIDE
             │                               │
             │                               │
        Homepage                         Login
             │                               │
     Available Bikes                    Dashboard
             │                               │
      Bike Details                  ┌────────┴────────┐
             │                      │                 │
      Send Enquiry             Bike Management   Enquiries
             │                      │                 │
      Success Page             Add/Edit/Delete    View/Update
             │                      │                 │
             └──────────────┬───────┴─────────────────┘
                            │
                         MySQL
                       Database
```

---

# 🔄 Customer Enquiry Flow

```text
Customer
   ↓
Available Bikes
   ↓
Select Bike
   ↓
View Bike Details
   ↓
Send Enquiry
   ↓
Enquiry Saved
   ↓
Success Page
   ↓
Admin Views Enquiry
   ↓
New
   ↓
Contacted
   ↓
Closed
```

---

# 🔄 Bike Management Flow

```text
Admin Login
     ↓
Dashboard
     ↓
Manage Bikes
     ↓
Add / Edit / Delete
     ↓
Bike Database
     ↓
Available Bikes
     ↓
Public Website
```

---

# 📱 Responsive Design

The public website and admin pages are designed to work on:

* Desktop
* Laptop
* Tablet
* Mobile devices

The public navigation includes a responsive mobile menu.

---

# 🖼️ Image Management

Bike images are uploaded through the admin panel.

Images are stored inside:

```text
uploads/
```

When a bike image is replaced, the previous image is removed from the upload directory after the database update succeeds.

When a bike is deleted, its associated image is also removed.

---

# 🔒 Basic Security Features

The project includes several basic security practices:

* Password hashing
* Password verification
* Session-based admin authentication
* Protected admin pages
* Prepared SQL statements
* Input validation
* Email validation
* Duplicate registration-number checking
* File extension validation
* Image validation
* Maximum image upload size
* Allowed enquiry status validation

---

# ⚠️ Important Notes

This project is intended for **local development and academic/project purposes**.

Before deploying it to a live production server, additional security and production configuration should be considered, including:

* HTTPS
* CSRF protection
* More detailed input sanitization
* Production database credentials
* Secure session configuration
* More robust error handling
* Server-side file upload hardening
* Environment-based configuration

---

# 👨‍💻 Author

**Bike Management System**

Developed as a PHP and MySQL based web application for managing bikes and customer enquiries.

---

# 📄 License

This project is intended for educational and project purposes.

