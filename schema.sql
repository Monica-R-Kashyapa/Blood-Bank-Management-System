CREATE DATABASE blood_bank;

USE blood_bank;

CREATE TABLE Doctor (
    doctor_id INT  PRIMARY KEY,
    doctor_name VARCHAR(100),
    doctor_add VARCHAR(255),
    doctor_phno VARCHAR(15)
);

CREATE TABLE Donor (
    donor_id INT  PRIMARY KEY,
    donor_name VARCHAR(100),
    do_phno VARCHAR(15),
    do_add VARCHAR(255),
    do_dob DATE,
    gender VARCHAR(10),
    weight FLOAT,
    bp VARCHAR(20),
    doctor_id INT,
    FOREIGN KEY (doctor_id) REFERENCES Doctor(doctor_id)ON DELETE CASCADE
);

CREATE TABLE Blood_bank (
    bloodb_id INT  PRIMARY KEY,
    bloodb_name VARCHAR(100),
    bloodb_add VARCHAR(255)
);

CREATE TABLE Blood (
    blood_type VARCHAR(3),
    donor_id INT,
    bloodb_id INT,
    FOREIGN KEY (donor_id) REFERENCES Donor(donor_id)ON DELETE CASCADE,
    FOREIGN KEY (bloodb_id) REFERENCES Blood_bank(bloodb_id)ON DELETE CASCADE
);

CREATE TABLE Patient (
    p_id INT  PRIMARY KEY,
    p_name VARCHAR(100),
    hospital_add VARCHAR(255)
);

CREATE TABLE Blood_delivery (
    bloodb_id INT,
    p_id INT,
    PRIMARY KEY (bloodb_id, p_id),
    FOREIGN KEY (bloodb_id) REFERENCES Blood_bank(bloodb_id)ON DELETE CASCADE,
    FOREIGN KEY (p_id) REFERENCES Patient(p_id)ON DELETE CASCADE
);
