# 🩸 Blood Bank Management System

A modern, full-featured web application for managing blood banks, donors, patients, and blood deliveries. Built with Flask, MySQL, and modern UI frameworks.

![Blood Bank Management System](static/images/b1.png)

## 🌟 Features

### Core Functionality
- **👨‍⚕️ Doctor Management**: Add, update, delete, and view doctor records
- **❤️ Donor Management**: Track blood donors with detailed information (blood type, weight, BP, etc.)
- **🏥 Blood Bank Management**: Manage multiple blood bank locations
- **🩸 Blood Inventory**: Track blood units by type and donor
- **💉 Patient Management**: Maintain patient records and hospital information
- **🚚 Blood Delivery Tracking**: Monitor blood deliveries from banks to patients

### Advanced Features
- **📊 Interactive Dashboard**: Real-time statistics with Chart.js visualizations
  - Total counts for doctors, donors, blood banks, patients, and deliveries
  - Blood type distribution (pie chart)
  - Gender distribution (doughnut chart)
  - Top institutions (bar chart)
- **🔍 Advanced DataTables**: Sortable, searchable, and paginated tables
- **✨ Modern UI/UX**: 
  - Gradient backgrounds and smooth animations
  - Responsive design (mobile-friendly)
  - Hover effects and transitions
  - Custom styled tables with purple gradient headers
- **📹 Educational Content**: Embedded video about blood donation
- **🎨 Beautiful Landing Page**: Informative home page with blood donation facts

## 🛠️ Technology Stack

### Backend
- **Flask** - Python web framework
- **MySQL** - Database management
- **PyMySQL** - MySQL connector for Python

### Frontend
- **Tailwind CSS** - Utility-first CSS framework
- **Chart.js** - Interactive charts and graphs
- **DataTables** - Advanced table features
- **jQuery** - JavaScript library

## 📋 Prerequisites

- Python 3.7+
- MySQL Server 5.7+
- pip (Python package manager)

## 🚀 Installation

### 1. Clone the Repository
```bash
git clone <repository-url>
cd bloodb
```

### 2. Install Python Dependencies
```bash
pip install flask pymysql
```

### 3. Set Up MySQL Database

**Option A: Using MySQL Command Line**
```bash
mysql -u root -p < schema.sql
mysql -u root -p < sample_data.sql
```

**Option B: Using MySQL Workbench**
1. Open MySQL Workbench
2. Connect to your MySQL server
3. File → Run SQL Script → Select `schema.sql`
4. File → Run SQL Script → Select `sample_data.sql`


## ▶️ Running the Application

```bash
python app.py
```

The application will be available at: `http://localhost:5000`

## 📊 Database Schema

### Tables
1. **Doctor** - Medical professionals
2. **Donor** - Blood donors with health info
3. **Blood_bank** - Blood bank locations
4. **Blood** - Blood inventory records
5. **Patient** - Patient information
6. **Blood_delivery** - Delivery tracking

See `schema.sql` for complete structure.
