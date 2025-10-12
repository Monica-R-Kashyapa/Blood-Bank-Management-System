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

### 4. Configure Database Connection

Edit `app.py` and update the database credentials:
```python
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': 'your_password',  # Change this
    'database': 'blood_bank',
    'cursorclass': pymysql.cursors.DictCursor
}
```

### 5. Add Video (Optional)

Place your blood donation video in:
```
static/videos/blood_donation.mp4
```

## ▶️ Running the Application

```bash
python app.py
```

The application will be available at: `http://localhost:5000`

## 📁 Project Structure

```
bloodb/
├── app.py                      # Main Flask application
├── schema.sql                  # Database schema
├── sample_data.sql            # Sample data for testing
├── static/
│   ├── style.css              # Custom CSS styles
│   ├── images/                # Image assets
│   │   ├── b1.png
│   │   ├── b2.png
│   │   ├── background.png
│   │   ├── blood_cells.jpg
│   │   └── blood_types.jpg
│   ├── videos/                # Video files
│   │   └── blood_donation.mp4
│   └── js/
│       └── main.js            # Custom JavaScript
├── templates/
│   ├── base.html              # Base template with navbar
│   ├── index.html             # Landing page
│   ├── dashboard.html         # Statistics dashboard
│   ├── doctors.html           # Doctor management
│   ├── donors.html            # Donor management
│   ├── blood_banks.html       # Blood bank management
│   ├── blood.html             # Blood inventory
│   ├── patients.html          # Patient management
│   └── blood_deliveries.html # Delivery tracking
├── README.md                  # This file
├── FEATURES.md               # Detailed features guide
└── USER_GUIDE.md             # User manual

```

## 🎨 UI Highlights

### Navigation Bar
- Modern white design with blood drop logo (🩸)
- Color-coded hover effects for each section
- Smooth animations and transitions
- Fully responsive

### Tables
- Purple gradient headers
- Card-style rows with shadows
- Hover effects (rows lift on hover)
- Single sorting arrow indicators
- Advanced search and pagination

### Dashboard
- Real-time statistics cards
- Interactive charts (pie, doughnut, bar)
- Color-coded sections
- Responsive grid layout

## 📊 Database Schema

### Tables
1. **Doctor** - Medical professionals
2. **Donor** - Blood donors with health info
3. **Blood_bank** - Blood bank locations
4. **Blood** - Blood inventory records
5. **Patient** - Patient information
6. **Blood_delivery** - Delivery tracking

See `schema.sql` for complete structure.

## 🔐 Security Notes

- Change default database password before deployment
- Use environment variables for sensitive data in production
- Implement user authentication for production use
- Enable HTTPS in production

## 🤝 Contributing

Contributions are welcome! Please follow these steps:
1. Fork the repository
2. Create a feature branch
3. Commit your changes
4. Push to the branch
5. Open a Pull Request

## 📝 License

This project is open source and available under the [MIT License](LICENSE).

## 👥 Authors

- Your Name - Initial work

## 🙏 Acknowledgments

- Blood donation organizations for inspiration
- Open source community for tools and libraries
- Medical professionals for domain knowledge

## 📞 Support

For issues, questions, or suggestions:
- Open an issue on GitHub
- Email: your.email@example.com

## 🔄 Version History

- **v1.0.0** (2025-01-10)
  - Initial release
  - Core CRUD operations
  - Dashboard with charts
  - Modern UI/UX
  - Sample data included

---

**Made with ❤️ for saving lives through blood donation**
