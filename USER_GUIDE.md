# 📖 User Guide - Blood Bank Management System

## Table of Contents
1. [Getting Started](#getting-started)
2. [Dashboard Overview](#dashboard-overview)
3. [Managing Doctors](#managing-doctors)
4. [Managing Donors](#managing-donors)
5. [Managing Blood Banks](#managing-blood-banks)
6. [Managing Blood Inventory](#managing-blood-inventory)
7. [Managing Patients](#managing-patients)
8. [Managing Blood Deliveries](#managing-blood-deliveries)
9. [Tips & Best Practices](#tips--best-practices)
10. [Troubleshooting](#troubleshooting)

---

## 🚀 Getting Started

### First Time Setup

1. **Access the Application**
   - Open your web browser
   - Navigate to `http://localhost:5000`
   - You'll see the landing page with blood donation information

2. **Navigate the System**
   - Use the top navigation bar to access different sections
   - Click the blood drop logo (🩸) to return to the home page
   - Hover over menu items to see color-coded highlights

3. **Understanding the Interface**
   - **Home**: Educational content about blood donation
   - **Dashboard**: Statistics and charts overview
   - **Doctors**: Manage medical professionals
   - **Donors**: Manage blood donors
   - **Blood Banks**: Manage blood bank locations
   - **Blood**: Manage blood inventory
   - **Patients**: Manage patient records
   - **Deliveries**: Track blood deliveries

---

## 📊 Dashboard Overview

### Viewing Statistics

1. **Navigate to Dashboard**
   - Click "Dashboard" in the navigation bar
   - Wait for charts to load (may take 2-3 seconds)

2. **Understanding the Cards**
   - **Top Row**: Quick statistics
     - Total Doctors
     - Total Donors
     - Total Blood Banks
     - Total Patients
     - Total Deliveries
   - Each card shows the current count

3. **Reading the Charts**

   **Blood Type Distribution (Pie Chart)**
   - Shows percentage of each blood type
   - Hover over segments to see exact numbers
   - Click legend items to hide/show types

   **Gender Distribution (Doughnut Chart)**
   - Male vs Female donor ratio
   - Center shows total donors
   - Hover for percentages

   **Top Institutions (Bar Chart)**
   - Hospitals with most blood requests
   - Longer bars = more requests
   - Hover to see exact counts

---

## 👨‍⚕️ Managing Doctors

### Adding a New Doctor

1. **Navigate to Doctors Page**
   - Click "Doctors" in the navigation bar
   - You'll see three forms: Add, Update, Delete

2. **Fill in the Add Form**
   ```
   Doctor ID: Enter a unique number (e.g., 101)
   Name: Enter full name (e.g., Dr. John Smith)
   Address: Enter complete address
   Phone Number: Enter 10-digit number (e.g., 5551234567)
   ```

3. **Submit the Form**
   - Click "Add Doctor" button
   - Wait for success message
   - Form will clear automatically

4. **Common Errors**
   - "Doctor ID already exists" → Use a different ID
   - "Invalid phone number" → Must be exactly 10 digits
   - "All fields required" → Fill in all fields

### Updating Doctor Information

1. **Locate the Update Form** (middle column)

2. **Enter Doctor ID**
   - Type the ID of the doctor you want to update

3. **Select Field to Update**
   - Choose from dropdown:
     - doctor_name
     - doctor_add (address)
     - doctor_phno (phone)

4. **Enter New Value**
   - Type the new information

5. **Click "Update Doctor"**
   - Success message will appear
   - Changes are immediate

### Deleting a Doctor

1. **Use the Delete Form** (right column)

2. **Enter Doctor ID**
   - Type the ID of the doctor to delete

3. **Click "Delete Doctor"**
   - Confirm the deletion
   - Doctor will be removed from system

4. **Important Notes**
   - Cannot delete if doctor has associated donors
   - Action is permanent and cannot be undone

### Viewing All Doctors

1. **Click "View Records" Button**
   - Located below the forms
   - Table will appear with animation

2. **Using the Table**
   
   **Search:**
   - Type in the search box (top right)
   - Searches across all columns
   - Results update in real-time

   **Sort:**
   - Click any column header
   - Arrow indicates sort direction
   - Click again to reverse order

   **Pagination:**
   - Use "Previous" and "Next" buttons
   - Change entries per page (10, 25, 50, 100)
   - Shows "Showing X to Y of Z entries"

---

## ❤️ Managing Donors

### Adding a New Donor

1. **Navigate to Donors Page**

2. **Fill in the Add Form**
   ```
   Donor ID: Unique number (e.g., 201)
   Name: Full name
   Phone Number: 10 digits
   Address: Complete address
   Date of Birth: Click calendar icon to select
   Gender: Select Male or Female
   Weight: In kilograms (minimum 50kg)
   Blood Pressure: Format 120/80
   Doctor ID: Must be an existing doctor
   ```

3. **Important Validations**
   - Weight must be ≥ 50kg (donation requirement)
   - BP format must be XXX/XX (e.g., 120/80)
   - Doctor ID must exist in system
   - Age calculated automatically from DOB

4. **Submit**
   - Click "Add Donor"
   - Success notification appears
   - Form clears for next entry

### Updating Donor Information

1. **Enter Donor ID** in update form

2. **Select Field to Update**
   - Available fields:
     - Name
     - Phone Number
     - Address
     - Date of Birth
     - Gender
     - Weight
     - Blood Pressure
     - Doctor ID

3. **Enter New Value**

4. **Click "Update Donor"**

### Viewing Donor Records

1. **Click "View Records"**

2. **Table Columns**
   - ID, Name, Phone, Address
   - DOB, Gender, Weight, BP
   - Associated Doctor

3. **Filter Options**
   - Search by any field
   - Sort by any column
   - Export to CSV (optional)

---

## 🏥 Managing Blood Banks

### Adding a Blood Bank

1. **Navigate to Blood Banks Page**

2. **Fill in the Form**
   ```
   Blood Bank ID: Unique number (e.g., 301)
   Name: Institution name (e.g., City Blood Bank)
   Address: Complete address with city
   ```

3. **Click "Add Blood Bank"**

### Updating Blood Bank

1. **Enter Blood Bank ID**

2. **Select Field**
   - bloodb_name (Name)
   - bloodb_add (Address)

3. **Enter New Value**

4. **Click "Update Blood Bank"**

### Viewing Blood Banks

1. **Click "View Records"**

2. **Table Shows**
   - Blood Bank ID
   - Institution Name
   - Address

3. **Use Search** to find specific banks

---

## 🩸 Managing Blood Inventory

### Adding Blood Record

1. **Navigate to Blood Page**

2. **Fill in the Form**
   ```
   Blood Type: Select from dropdown
     (A+, A-, B+, B-, O+, O-, AB+, AB-)
   Donor ID: Must exist in system
   Blood Bank ID: Must exist in system
   ```

3. **System Automatically**
   - Records collection date
   - Calculates expiry (42 days)
   - Assigns unique blood ID

4. **Click "Add Blood"**

### Important Notes

- **Blood Type Selection**
  - Choose carefully (cannot be changed easily)
  - Verify with donor records

- **Donor Verification**
  - System checks if donor exists
  - Ensures donor is eligible

- **Blood Bank Verification**
  - Must be registered blood bank
  - Ensures proper storage location

### Viewing Blood Inventory

1. **Click "View Records"**

2. **Table Columns**
   - Blood ID
   - Blood Type
   - Donor ID
   - Blood Bank ID
   - Collection Date (auto)
   - Expiry Date (auto)

3. **Monitoring**
   - Check expiry dates regularly
   - Red highlight for expired blood
   - Yellow highlight for expiring soon

---

## 💉 Managing Patients

### Adding a Patient

1. **Navigate to Patients Page**

2. **Fill in the Form**
   ```
   Patient ID: Unique number (e.g., 401)
   Name: Full patient name
   Hospital Address: Complete hospital address
   ```

3. **Click "Add Patient"**

### Updating Patient Information

1. **Enter Patient ID**

2. **Select Field to Update**
   - p_name (Name)
   - hospital_add (Hospital Address)

3. **Enter New Value**

4. **Click "Update Patient"**

### Viewing Patient Records

1. **Click "View Records"**

2. **Table Shows**
   - Patient ID
   - Patient Name
   - Hospital Address

3. **Search & Sort** as needed

---

## 🚚 Managing Blood Deliveries

### Creating a Delivery Record

1. **Navigate to Blood Deliveries Page**

2. **Fill in the Form**
   ```
   Blood Bank ID: Source blood bank
   Patient ID: Recipient patient
   ```

3. **System Checks**
   - Blood availability at bank
   - Patient exists in system
   - Records delivery date automatically

4. **Click "Add Delivery"**

### Tracking Deliveries

1. **Click "View Records"**

2. **Table Shows**
   - Delivery ID
   - Blood Bank ID
   - Patient ID
   - Delivery Date

3. **Monitor Status**
   - Recent deliveries at top
   - Search by patient or blood bank

---

## 💡 Tips & Best Practices

### Data Entry

1. **Use Consistent Formatting**
   - Phone numbers: 10 digits, no spaces
   - Blood pressure: XXX/XX format
   - Dates: Use date picker for accuracy

2. **Verify Before Submitting**
   - Double-check IDs
   - Confirm blood types
   - Verify phone numbers

3. **Keep Records Updated**
   - Update addresses when changed
   - Update phone numbers regularly
   - Remove inactive donors

### Search & Navigation

1. **Use Search Effectively**
   - Type partial names for quick search
   - Use ID for exact matches
   - Clear search to see all records

2. **Sort for Better Organization**
   - Sort by ID for chronological order
   - Sort by name for alphabetical list
   - Sort by date for recent entries

3. **Pagination**
   - Use 10 entries for quick scanning
   - Use 100 entries for bulk operations
   - Export large datasets if needed

### Data Management

1. **Regular Maintenance**
   - Check for expired blood weekly
   - Update donor information quarterly
   - Archive old delivery records

2. **Backup**
   - Export data regularly
   - Keep backup of database
   - Document important changes

3. **Security**
   - Don't share sensitive information
   - Log out when done
   - Report any issues immediately

---

## 🔧 Troubleshooting

### Common Issues

#### "Cannot connect to database"
**Solution:**
1. Check if MySQL is running
2. Verify database credentials in `app.py`
3. Ensure `blood_bank` database exists

#### "Table not loading"
**Solution:**
1. Hard refresh page (Ctrl + Shift + R)
2. Clear browser cache
3. Check browser console for errors

#### "Form not submitting"
**Solution:**
1. Check all required fields are filled
2. Verify data format (phone, BP, etc.)
3. Ensure no duplicate IDs
4. Check for error messages

#### "Charts not displaying"
**Solution:**
1. Wait 3-5 seconds for data to load
2. Refresh the dashboard page
3. Check if database has data
4. Verify Chart.js is loading

#### "Search not working"
**Solution:**
1. Clear search box and try again
2. Refresh the page
3. Check if table is initialized
4. Try different search terms

### Performance Issues

#### "Page loading slowly"
**Solution:**
1. Check internet connection
2. Clear browser cache
3. Reduce entries per page
4. Close unnecessary browser tabs

#### "Table taking long to load"
**Solution:**
1. Reduce number of records displayed
2. Use search to filter results
3. Optimize database queries
4. Consider pagination

### Error Messages

#### "ID already exists"
- Use a different, unique ID
- Check existing records first

#### "Invalid format"
- Follow the format shown in placeholder
- Example: Phone (1234567890), BP (120/80)

#### "Record not found"
- Verify the ID exists
- Check for typos
- Use "View Records" to find correct ID

#### "Cannot delete - has dependencies"
- Remove related records first
- Example: Delete donor's blood records before deleting donor

---

## 📞 Getting Help

### Resources
- **README.md**: Installation and setup
- **FEATURES.md**: Detailed feature descriptions
- **This Guide**: Step-by-step instructions

### Support
- Check error messages carefully
- Review this guide for solutions
- Contact system administrator
- Report bugs with screenshots

---

## 🎓 Quick Reference

### Keyboard Shortcuts
- `Ctrl + F`: Search in table
- `Tab`: Navigate between form fields
- `Enter`: Submit form
- `Esc`: Close modals
- `Ctrl + Shift + R`: Hard refresh

### Data Formats
- **Phone**: 1234567890 (10 digits)
- **Blood Pressure**: 120/80
- **Date**: Use date picker
- **Weight**: Number in kg (≥50)

### Color Codes
- **Green**: Success, Add actions
- **Yellow**: Warning, Update actions
- **Red**: Error, Delete actions
- **Blue**: Information, View actions

---

**Happy Managing! 🩸❤️**

*For technical details, see [README.md](README.md)*  
*For feature list, see [FEATURES.md](FEATURES.md)*
