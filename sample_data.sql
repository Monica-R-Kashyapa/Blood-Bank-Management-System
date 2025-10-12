-- Sample Data for Blood Bank Management System

USE blood_bank;

-- Insert Doctors
INSERT INTO Doctor (doctor_id, doctor_name, doctor_add, doctor_phno) VALUES
(2, 'Dr. Sarah Johnson', '123 Medical St, City', '555-0101'),
(3, 'Dr. Michael Chen', '456 Health Ave, City', '555-0102'),
(4, 'Dr. Emily Davis', '789 Care Blvd, City', '555-0103'),
(5, 'Dr. Lisa Anderson', '654 Hospital Ln, City', '555-0105');

-- Insert Donors
INSERT INTO Donor (donor_id, donor_name, do_phno, do_add, do_dob, gender, weight, bp, doctor_id) VALUES
(3, 'John Smith', '555-1001', '100 Oak St, City', '1990-05-15', 'Male', 75.5, '120/80', 1),
(4, 'Emma Brown', '555-1002', '200 Pine St, City', '1985-08-22', 'Female', 62.3, '118/76', 2),
(5, 'Michael Johnson', '555-1003', '300 Maple St, City', '1992-03-10', 'Male', 82.1, '125/82', 1),
(6, 'Sophia Williams', '555-1004', '400 Elm St, City', '1988-11-30', 'Female', 58.7, '115/75', 3),
(7, 'James Davis', '555-1005', '500 Cedar St, City', '1995-07-18', 'Male', 78.9, '122/79', 2),
(8, 'Olivia Martinez', '555-1006', '600 Birch St, City', '1991-02-25', 'Female', 65.4, '119/77', 4);

-- Insert Blood Banks
INSERT INTO Blood_bank (bloodb_id, bloodb_name, bloodb_add) VALUES
(4, 'Central Blood Bank', '10 Main St, City'),
(5, 'City Hospital Blood Center', '20 Hospital Rd, City'),
(6, 'Community Blood Services', '30 Community Ave, City'),
(7, 'Regional Blood Bank', '40 Regional Blvd, City'),
(8, 'Metro Blood Donation Center', '50 Metro Dr, City');

-- Insert Blood Records
INSERT INTO Blood (blood_type, donor_id, bloodb_id) VALUES
('O+', 2, 2),
('B+', 3, 1),
('AB+', 4, 3),
('A+', 5, 2),
('O-', 6, 4),
('B-', 7, 3),
('AB-', 8, 5),
('B+', 1, 3),
('A+', 2, 4),
('O+', 3, 5),
('AB+', 4, 1),
('B+', 5, 2);

-- Insert Patients
INSERT INTO Patient (p_id, p_name, hospital_add) VALUES
(2, 'Maria Garcia', 'St. Mary Medical Center'),
(3, 'Robert Lee', 'Central Hospital'),
(4, 'Jennifer White', 'Community Health Center'),
(5, 'Christopher Hall', 'Regional Medical Center'),
(6, 'Amanda Young', 'Metro Hospital'),
(7, 'Daniel King', 'University Medical Center'),
(8, 'Jessica Wright', 'Memorial Hospital'),
(9, 'Matthew Lopez', 'Sacred Heart Hospital'),
(10, 'Sarah Hill', 'Mercy Medical Center');

-- Insert Blood Deliveries
INSERT INTO Blood_delivery (bloodb_id, p_id) VALUES
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(1, 6),
(2, 7),
(3, 8),
(4, 9),
(5, 10);
