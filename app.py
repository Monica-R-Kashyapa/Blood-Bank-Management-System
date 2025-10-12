from flask import Flask, render_template, jsonify, request, flash
import pymysql
from config import Config

app = Flask(__name__)
app.config.from_object(Config)

def get_db_connection():
    return pymysql.connect(
        host=app.config['DB_HOST'],
        user=app.config['DB_USER'],
        password=app.config['DB_PASSWORD'],
        database=app.config['DB_NAME']
    )

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/dashboard')
def dashboard():
    return render_template('dashboard.html')

@app.route('/doctors', methods=['GET', 'POST'])
def doctors():
    doctors = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                doctor_id = request.form['doctor_id']
                doctor_name = request.form['doctor_name']
                doctor_add = request.form['doctor_add']
                doctor_phno = request.form['doctor_phno']
                
                cursor.execute("INSERT INTO Doctor (doctor_id, doctor_name, doctor_add, doctor_phno) VALUES (%s, %s, %s, %s)",
                              (doctor_id, doctor_name, doctor_add, doctor_phno))
                conn.commit()
                flash('Doctor added successfully!', 'success')
            elif 'update' in request.form:
                doctor_id = request.form['doctor_id']
                column = request.form['column']
                new_value = request.form['new_value']
                
                cursor.execute(f"UPDATE Doctor SET {column} = %s WHERE doctor_id = %s", (new_value, doctor_id))
                conn.commit()
                flash('Doctor updated successfully!', 'success')
            elif 'delete' in request.form:
                doctor_id = request.form['doctor_id']
                
                cursor.execute("DELETE FROM Doctor WHERE doctor_id = %s", (doctor_id,))
                conn.commit()
                flash('Doctor deleted successfully!', 'success')
        
        cursor.execute("SELECT * FROM Doctor")
        doctors = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        flash(f'Error: {str(e)}', 'error')
    
    return render_template('doctors.html', doctors=doctors)

@app.route('/donors', methods=['GET', 'POST'])
def donors():
    donors = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                donor_id = request.form['donor_id']
                donor_name = request.form['donor_name']
                do_phno = request.form['do_phno']
                do_add = request.form['do_add']
                do_dob = request.form['do_dob']
                gender = request.form['gender']
                weight = request.form['weight']
                bp = request.form['bp']
                doctor_id = request.form['doctor_id']
                
                cursor.execute("INSERT INTO Donor (donor_id, donor_name, do_phno, do_add, do_dob, gender, weight, bp, doctor_id) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                              (donor_id, donor_name, do_phno, do_add, do_dob, gender, weight, bp, doctor_id))
                conn.commit()
            elif 'update' in request.form:
                donor_id = request.form['donor_id']
                column = request.form['column']
                new_value = request.form['new_value']
                
                cursor.execute(f"UPDATE Donor SET {column} = %s WHERE donor_id = %s", (new_value, donor_id))
                conn.commit()
            elif 'delete' in request.form:
                donor_id = request.form['donor_id']
                
                cursor.execute("DELETE FROM Donor WHERE donor_id = %s", (donor_id,))
                conn.commit()
        
        cursor.execute("SELECT * FROM Donor")
        donors = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"Error in donors: {e}")
    
    return render_template('donors.html', donors=donors)

@app.route('/blood-banks', methods=['GET', 'POST'])
def blood_banks():
    blood_banks = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                bloodb_id = request.form['bloodb_id']
                bloodb_name = request.form['bloodb_name']
                bloodb_add = request.form['bloodb_add']
                
                cursor.execute("INSERT INTO Blood_bank (bloodb_id, bloodb_name, bloodb_add) VALUES (%s, %s, %s)",
                              (bloodb_id, bloodb_name, bloodb_add))
                conn.commit()
            elif 'update' in request.form:
                bloodb_id = request.form['bloodb_id']
                column = request.form['column']
                new_value = request.form['new_value']
                
                cursor.execute(f"UPDATE Blood_bank SET {column} = %s WHERE bloodb_id = %s", (new_value, bloodb_id))
                conn.commit()
            elif 'delete' in request.form:
                bloodb_id = request.form['bloodb_id']
                
                cursor.execute("DELETE FROM Blood_bank WHERE bloodb_id = %s", (bloodb_id,))
                conn.commit()
        
        cursor.execute("SELECT * FROM Blood_bank")
        blood_banks = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"Error in blood_banks: {e}")
    
    return render_template('blood_banks.html', blood_banks=blood_banks)

@app.route('/blood', methods=['GET', 'POST'])
def blood():
    blood_records = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                blood_type = request.form['blood_type']
                donor_id = request.form['donor_id']
                bloodb_id = request.form['bloodb_id']
                
                cursor.execute("INSERT INTO Blood (blood_type, donor_id, bloodb_id) VALUES (%s, %s, %s)",
                              (blood_type, donor_id, bloodb_id))
                conn.commit()
            elif 'update' in request.form:
                blood_type = request.form['blood_type']
                donor_id = request.form['donor_id']
                bloodb_id = request.form['bloodb_id']
                column = request.form['column']
                new_value = request.form['new_value']
                
                cursor.execute(f"UPDATE Blood SET {column} = %s WHERE blood_type = %s AND donor_id = %s AND bloodb_id = %s",
                              (new_value, blood_type, donor_id, bloodb_id))
                conn.commit()
            elif 'delete' in request.form:
                blood_type = request.form['blood_type']
                donor_id = request.form['donor_id']
                bloodb_id = request.form['bloodb_id']
                
                cursor.execute("DELETE FROM Blood WHERE blood_type = %s AND donor_id = %s AND bloodb_id = %s",
                              (blood_type, donor_id, bloodb_id))
                conn.commit()
        
        cursor.execute("SELECT * FROM Blood")
        blood_records = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"Error in blood: {e}")
    
    return render_template('blood.html', blood_records=blood_records)

@app.route('/patients', methods=['GET', 'POST'])
def patients():
    patients = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                p_id = request.form['p_id']
                p_name = request.form['p_name']
                hospital_add = request.form['hospital_add']
                
                cursor.execute("INSERT INTO Patient (p_id, p_name, hospital_add) VALUES (%s, %s, %s)",
                              (p_id, p_name, hospital_add))
                conn.commit()
            elif 'update' in request.form:
                p_id = request.form['p_id']
                column = request.form['column']
                new_value = request.form['new_value']
                
                cursor.execute(f"UPDATE Patient SET {column} = %s WHERE p_id = %s", (new_value, p_id))
                conn.commit()
            elif 'delete' in request.form:
                p_id = request.form['p_id']
                
                cursor.execute("DELETE FROM Patient WHERE p_id = %s", (p_id,))
                conn.commit()
        
        cursor.execute("SELECT * FROM Patient")
        patients = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"Error in patients: {e}")
    
    return render_template('patients.html', patients=patients)

@app.route('/blood-deliveries', methods=['GET', 'POST'])
def blood_deliveries():
    deliveries = []
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        if request.method == 'POST':
            if 'add' in request.form:
                bloodb_id = request.form['bloodb_id']
                p_id = request.form['p_id']
                
                cursor.execute("INSERT INTO Blood_delivery (bloodb_id, p_id) VALUES (%s, %s)",
                              (bloodb_id, p_id))
                conn.commit()
            elif 'delete' in request.form:
                bloodb_id = request.form['bloodb_id']
                
                cursor.execute("DELETE FROM Blood_delivery WHERE bloodb_id = %s", (bloodb_id,))
                conn.commit()
        
        cursor.execute("SELECT * FROM Blood_delivery")
        deliveries = cursor.fetchall()
        cursor.close()
        conn.close()
    except Exception as e:
        print(f"Error in blood_deliveries: {e}")
    
    return render_template('blood_deliveries.html', deliveries=deliveries)

@app.route('/api/dashboard-data')
def dashboard_data():
    try:
        conn = get_db_connection()
        cursor = conn.cursor(pymysql.cursors.DictCursor)
        
        # Fetch counts for dashboard
        cursor.execute("SELECT COUNT(*) AS count FROM Doctor")
        doctor_count = cursor.fetchone()['count']
        
        cursor.execute("SELECT COUNT(*) AS count FROM Donor")
        donor_count = cursor.fetchone()['count']
        
        cursor.execute("SELECT COUNT(*) AS count FROM Blood_bank")
        blood_bank_count = cursor.fetchone()['count']
        
        cursor.execute("SELECT COUNT(*) AS count FROM Blood")
        blood_count = cursor.fetchone()['count']
        
        cursor.execute("SELECT COUNT(*) AS count FROM Patient")
        patient_count = cursor.fetchone()['count']
        
        cursor.execute("SELECT COUNT(*) AS count FROM Blood_delivery")
        delivery_count = cursor.fetchone()['count']
        
        # Blood type distribution
        cursor.execute("SELECT blood_type, COUNT(*) AS count FROM Blood GROUP BY blood_type")
        blood_types = cursor.fetchall()
        if not blood_types:
            blood_types = [{'blood_type': 'A+', 'count': 0}, {'blood_type': 'B+', 'count': 0}, {'blood_type': 'O+', 'count': 0}]
        
        # Gender distribution
        cursor.execute("SELECT gender, COUNT(*) AS count FROM Donor GROUP BY gender")
        genders = cursor.fetchall()
        if not genders:
            genders = [{'gender': 'Male', 'count': 0}, {'gender': 'Female', 'count': 0}]
        
        # Top institutions (mock data for now)
        top_institutions = [
            {'name': 'City Hospital', 'count': 45},
            {'name': 'General Hospital', 'count': 38},
            {'name': 'Medical Center', 'count': 32}
        ]
        
        # Monthly donations (mock data for now)
        monthly_donations = [
            {'month': 'Jan', 'count': 10},
            {'month': 'Feb', 'count': 14},
            {'month': 'Mar', 'count': 20},
            {'month': 'Apr', 'count': 18},
            {'month': 'May', 'count': 24},
            {'month': 'Jun', 'count': 27}
        ]
        
        cursor.close()
        conn.close()
        
        return jsonify({
            'doctor_count': doctor_count,
            'donor_count': donor_count,
            'blood_bank_count': blood_bank_count,
            'blood_count': blood_count,
            'patient_count': patient_count,
            'delivery_count': delivery_count,
            'blood_types': blood_types,
            'genders': genders,
            'top_institutions': top_institutions,
            'monthly_donations': monthly_donations
        })
    except Exception as e:
        print(f"Error in dashboard_data: {e}")
        return jsonify({
            'error': 'Database connection failed',
            'doctor_count': 0,
            'donor_count': 0,
            'blood_bank_count': 0,
            'blood_count': 0,
            'patient_count': 0,
            'delivery_count': 0,
            'blood_types': [{'blood_type': 'A+', 'count': 0}],
            'genders': [{'gender': 'Male', 'count': 0}],
            'top_institutions': [{'name': 'N/A', 'count': 0}],
            'monthly_donations': [{'month': 'Jan', 'count': 0}]
        }), 500

if __name__ == '__main__':
    app.run(debug=True)
