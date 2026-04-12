# Anonymous Survey System

## Project Description

This project is an Anonymous Survey System developed using the CodeIgniter 4 framework.
It allows administrators to upload survey questions through a CSV file and automatically generate a web-based questionnaire.

Each survey has a unique URL that can be shared with users. Users can access the survey, submit their responses, and no login is required, ensuring full anonymity.

## Features

### Admin Features

* Secure login system
* Upload CSV file to create surveys
* Automatic question generation from CSV
* Unique survey URL generation
* Enable/Disable survey access
* View and download survey results in CSV format

###  User Features

* Access survey via URL
* No login required
* Submit responses anonymously

## 📂 CSV Format

Each row in the CSV file must follow this format:

```text
Question, CorrectAnswer, WrongOption1, WrongOption2, ...
```

## Technologies Used

* PHP (CodeIgniter 4 Framework)
* MySQL 
* HTML, CSS
* JavaScript
* XAMPP (Local Server)

---

## Installation Guide

### 1. Clone the repository

```bash
git clone https://github.com/vidhi-16/survey-system.git
```

---

### 2. Move to project folder

```bash
cd survey-system
```

---

### 3. Install dependencies

```bash
composer install
```

---

### 4. Configure Environment File

Copy `.env.example` to `.env` and update database settings:

```env
database.default.hostname = localhost
database.default.database = survey_db
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
```

### 5. Create Database

Create a database in MySQL:

```sql
CREATE DATABASE survey_db;
```

Import required tables (or run your SQL scripts).

---

### 6. Run the Project

```bash
php spark serve
```

---

### 7. Open in Browser

```text
http://localhost:8080
```

##  Admin Access

Login page:

```text
http://localhost:8080/login
```

## 🔗 Survey Access

Example:

```text
http://localhost:8080/survey/1
```


## Export Results

Admins can download survey responses in CSV format directly from the dashboard.


## Key Concepts Used

* MVC Architecture
* File Handling (CSV Processing)
* Database Integration
* Dynamic Web Page Generation
* Authentication System
* CRUD Operations


##  Conclusion

This project demonstrates how to build a dynamic, database-driven survey system with anonymous user participation using CodeIgniter 4.


## 👩‍💻 Author

Vidhi Patel
