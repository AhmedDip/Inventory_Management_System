# 📦 Inventory Management System

A Laravel-based web application designed to manage products, suppliers, purchases, and stock levels efficiently. This system helps businesses maintain optimal inventory levels, streamline purchasing, and make data-driven decisions.

---

## ✅ Key Highlights

- 📦 **Stock Monitoring:** Monitored stock levels to prevent shortages and overstocking, ensuring efficient inventory flow.  
- 🛒 **Streamlined Purchasing:** Optimized the purchase process with features to manage suppliers and purchase orders effectively.  
- 🔐 **Role-Based Access Control:** Implemented user roles and permissions to enhance data security and control access to sensitive modules.  
- 📊 **Reporting & Analytics:** Provided comprehensive reports to support informed decision-making and inventory planning.  

---

## 🛠️ Tech Stack

- **Framework:** Laravel (PHP)
- **Frontend:** Blade Templates, HTML, CSS
- **Database:** MySQL
- **Package Manager:** Composer
- **Server:** PHP Development Server

---

## 📂 Installation Guide

Follow these steps to set up the project on your local machine.

### ✅ Prerequisites

Make sure the following are installed:

- PHP >= 7.2
- [Composer](https://getcomposer.org/)
- MySQL or compatible database
- Laravel CLI

---

### 🚀 Setup Instructions

1. **Clone the Repository**

```bash
git clone https://github.com/AhmedDip/Inventory_Management_System.git
cd Inventory_Management_System
````

2. **Create Environment File**

```bash
cp .env.example .env
```

3. **Generate Application Key**

```bash
php artisan key:generate
```

4. **Install Dependencies**

```bash
composer update
```

5. **Set Up Database**

* Create a new MySQL database (e.g., `inventory_db`)
* Update your `.env` file with your DB credentials:

```env
DB_DATABASE=inventory_db
DB_USERNAME=your_db_username
DB_PASSWORD=your_db_password
```

6. **Run Migrations**

```bash
php artisan migrate
```

7. **Start the Development Server**

```bash
php artisan serve
```

8. **Access the Application**

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

---

## 📃 License

This project is open-source and available under the [MIT License](LICENSE).

---

## 📬 Contact

For support or suggestions, feel free to reach out:

* **GitHub:** [@AhmedDip](https://github.com/AhmedDip)
