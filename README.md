# 🍕 PHP Online Pizza Delivery System

A full-stack web application that allows customers to browse pizzas, place orders, manage their profiles, and track orders through an intuitive interface. The system also provides an admin panel for managing menu items, customers, and orders.

---

## 📌 Project Overview

The PHP Online Pizza Delivery System is a web-based application developed using PHP and MySQL. It simplifies the online food ordering process by providing customers with a user-friendly platform to order pizzas while allowing administrators to efficiently manage products and customer orders.

This project was developed as an academic project to gain practical experience in web development, database management, and full-stack application development.

---

## ✨ Features

### Customer Features

* User Registration and Login
* Browse Pizza Menu
* View Pizza Details
* Add Items to Cart
* Update Cart Quantity
* Place Orders
* View Order History
* Manage Profile Information
* Contact Us Page

### Admin Features

* Admin Authentication
* Manage Pizza Categories
* Add, Update, and Delete Menu Items
* Manage Customer Information
* View Customer Orders
* Order Status Management
* Dashboard Overview

### UI Features

* Responsive Design using Bootstrap
* User-Friendly Navigation
* Interactive Forms
* Clean and Modern Interface

---

## 🛠️ Technologies Used

### Frontend

* HTML
* CSS
* JavaScript
* Bootstrap

### Backend

* PHP

### Database

* MySQL

### Development Environment

* XAMPP

---

## 📂 Project Structure

```text
php-online-pizza-delivery/
│
├── admin/
├── css/
├── js/
├── database/
├── pizzahouse.sql
├── index.php
├── login.php
├── register.php
├── contact_us.php
└── README.md
```

---

## 🚀 Installation and Setup

### Prerequisites

Before running the project, install:

* XAMPP
* Web Browser (Chrome, Edge, Firefox)

---

### Step 1: Clone or Download the Project

Download the ZIP file or clone the repository:

```bash
git clone https://github.com/FauziyaPirji/php-online-pizza-delivery.git
```

---

### Step 2: Move Project to XAMPP

Copy the project folder into:

```text
C:\xampp\htdocs\
```

Example:

```text
C:\xampp\htdocs\php-online-pizza-delivery
```

---

### Step 3: Start Apache and MySQL

1. Open XAMPP Control Panel
2. Start:

   * Apache
   * MySQL

---

### Step 4: Import Database

1. Open phpMyAdmin

```text
http://localhost/phpmyadmin
```

2. Create a new database:

```text
pizzahouse
```

3. Click Import

4. Select:

```text
pizzahouse.sql
```

5. Click Go

---

### Step 5: Run the Application

Open your browser and visit:

```text
http://localhost/php-online-pizza-delivery
```

The application should now be running successfully.

---

## 🔒 Security Note

This project was developed for educational purposes.

Possible future improvements:

* Password Hashing using `password_hash()`
* SQL Injection Prevention using Prepared Statements
* Input Validation and Sanitization
* Role-Based Access Control
* Email Verification

---

## 🎯 Learning Outcomes

Through this project, I gained experience in:

* PHP Development
* MySQL Database Design
* CRUD Operations
* Authentication Systems
* Session Management
* Bootstrap Framework
* Responsive Web Design
* Full-Stack Web Development

---

## 📈 Future Enhancements

* Online Payment Gateway Integration
* Order Tracking System
* Email Notifications
* Product Search and Filtering
* Customer Reviews and Ratings
* REST API Integration
