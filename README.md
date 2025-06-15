# ETERNA – Watch E-Commerce Website ⌚

This is a full-featured e-commerce website project built as a college project using `PHP`, `MySQL`, `HTML`, `CSS`, `JavaScript`, and `Bootstrap`. The platform simulates a professional watch shopping experience with secure authentication, dynamic product browsing, admin management, and Razorpay integration.

---

## 🔧 Tech Stack

- **Frontend:** HTML, CSS, JavaScript, Bootstrap
- **Backend:** PHP
- **Database:** MySQL (via phpMyAdmin)
- **Payment Gateway:** Razorpay API
- **Email Service:** SendGrid API

---

## 📂 Project Structure

```
ETERNA/
├── admin/
│   └── inc/
│       └── config.example.php      # Sample admin config (e.g. DB or SendGrid)
├── razorpay/
│   └── config.example.php          # Razorpay API key sample config
└── user/
    └── ...                         # User-facing functionality (login, browse, cart)
```

---

## 🚀 Features

### USER SIDE

- Registration, login, password reset, email verification
- Product browsing by category (Men, Women, Kids, Couple)
- Product details page with multiple images and description
- Razorpay payment integration with downloadable invoice
- Contact form and user queries
- Order history, cancel order, browser history, and user profile management

### ADMIN SIDE

- Admin login and secure dashboard
- Analytics: Orders, users, revenue, cancellations, refunds
- Product management with dynamic thumbnails and editing
- User management: active, inactive, unverified
- Manual query response system
- Website shutdown (disable buy buttons temporarily)
- Carousel & contact details editor

---

## 🛠 Setup Instructions

### 1. Clone the Repository

```bash
git clone https://github.com/yourusername/ETERNA.git
cd ETERNA
```

### 2. Create Database

- Use `phpMyAdmin` to import the database from the provided `.sql` file (if included).

### 3. Configure Keys

You need to copy the example config files and add your own keys:

```bash
# For Admin/Email
cp admin/inc/config.example.php admin/inc/config.php

# For Razorpay
cp razorpay/config.example.php razorpay/config.php
```

Then add your **SendGrid API key** and **Razorpay API key** in the respective config files.

> ⚠️ **DO NOT COMMIT** real API keys to GitHub. Use `.gitignore` to protect your `config.php` files.

---

## 📄 License

This project was developed as part of a college assignment. You’re free to explore, modify, and learn from it.

---

## 🙋‍♂️ Author

Made By Dhruvin Oza  
[LinkedIn](https://www.linkedin.com/in/dhruvin-oza-617047282/)
[Github](https://github.com/Dhruvinoza17)
