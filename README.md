# 🤖 Question-Paper-Generator-System - Your Automated Paper Creator

**Question-Paper-Generator-System** is a PHP-based web application built with XAMPP that allows users to create, manage, and generate question papers efficiently. It includes an admin panel for question handling and PDF generation capabilities.

---

## 🚀 Features

- 🔐 Admin authentication with login system
- ➕ Add, delete, and update questions
- 📄 Generate question papers in PDF format
- 📋 View and manage question history
- 🖥️ Web-based interface for ease of use

---

## 🛠️ Tech Stack

- **Language:** PHP
- **Database:** MySQL
- **Libraries/Frameworks:**
  - TCPDF (for PDF generation)
  - Bootstrap (for styling)
- **Server:** Apache (via XAMPP)

---

## 🔐 Database Integration

This project uses a MySQL database managed through XAMPP. Ensure:

1. Start MySQL in XAMPP Control Panel.
2. Access phpMyAdmin at `http://localhost/phpmyadmin`.
3. Import the provided `.sql` file (if available) or create a database named `ques2`.

Example connection in PHP:
```php
$conn = new mysqli("localhost", "root", "", "ques2");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
```

---

## 🧪 How to Run

1. Install XAMPP.
2. Place the project folder in `C:\xampp\htdocs\ques2`.
3. Start Apache and MySQL in XAMPP.
4. Access via `http://localhost/ques2` in your browser.

---

## 📂 Folder Structure

```
ques2/
├── Admin/
│   ├── add_question_form.php
│   ├── auth_check.php
│   └── ...
├── css/
│   ├── css1.css
├── delete_question_form.php
├── generate_paper_form.php
├── image2.png
├── questions.php
├── README.md
└── ques2 (1).sql
```

---

## 🌱 Future Enhancements

- 📊 Add analytics for question usage
- 🌐 Multilingual support
- 🔒 Enhanced security features
- 📧 Email notification system

---

## 🤝 Contributing

Feel free to fork the repository at [https://github.com/Achala-Patil/Question-Paper-Generator-System](https://github.com/Achala-Patil/Question-Paper-Generator-System), create a feature branch, and submit a pull request.

---
