# Klinik Baby -Vaksin Wak Ajim: A Child Vaccination Website

Hey there! This is **Vaksin Wak Ajim**, a project we built during my Diploma in IT program at UTHM Pagoh(During our third semester, under Web Development course). It started as a way to solve a simple problem: helping parents manage vaccination records without losing those easily misplaced physical booklets.

We got 88% of 100% on this project website or product. While i do still hold a grudge against my tutor for poker faced, i am happy with the result of this project. Check out hydrobaby.png for a suprise!

---

## Methodology
I followed a **Waterfall methodology** for this, moving from database schema design to a modular PHP implementation. 

* **Modular Architecture**: I broke the site down into universal `header.php` and `footer.php` files. This means the navigation stays consistent across the board, and we can hide the "Staff Login" link automatically once a user signs in.
* **Custom SQL Logic**: The system doesn't just store dates; it uses `TIMESTAMPDIFF` to calculate a baby’s age in months in real-time, which then triggers alerts for the Malaysian National Immunisation Programme (NIP).
* Note: Setting the Appointment date is still buggy in Firefox. While the whole webstie still works with all possible browser, it is recommended to use a Chromium browser for full testing.

* **Staff CRUD System**: Administrative users can manage the entire clinic workforce—adding, editing, or removing staff members—without ever touching phpMyAdmin.
* **Session-Based Security**: I implemented PHP sessions to ensure parents only see their own children's records and that the staff portal stays private.

### User Features
- **User Registration & Login**: Secure account creation and authentication for parents/guardians
- **Baby Management**: Add and manage baby profiles with relevant information
- **Appointment Booking**: Schedule appointments for baby care services
- **Appointment Management**: 
  - View booked appointments
  - Confirm appointments
  - Edit appointment details
  - Cancel appointments
- **User Dashboard**: Personalized dashboard to manage all user activities

### Staff Features
- **Staff Login**: Secure authentication for staff members
- **Staff Dashboard**: Dedicated dashboard for staff to view appointments and manage services
- **Staff Management**:
  - Add new staff members
  - Edit staff information
  - Delete staff members
- **Staff Directory**: View complete list of all available staff

### General Features
- **Responsive Design**: Clean and user-friendly interface with CSS styling
- **Database Integration**: Connected to a database for persistent data storage
- **Session Management**: Secure session handling for users and staff

---

* **Backend:** PHP 8.x (The engine)
* **Database:** MySQL (Relational data for families, staff, and vaccines)
* **Server:** Apache (Developed via XAMPP)
* **Frontend:** Pure HTML & CSS (Shoutout to Aidil for the styling!)

---

## Project Structure (Quick overview)
```
/WEBSITES
├── index.php             # Dynamic homepage with live Doctor lists
├── dashboard.php         # The parent's "Command Center"
├── staff_list.php        # Full administrative staff management
├── booking_process.php   # The logic that handles the SQL "heavy lifting"
├── config.php            # Your one-stop shop for DB credentials
└── IMAGES/               # Asset folder (Check out hydrobaby.png!)
```

