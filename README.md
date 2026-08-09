![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![C#](https://img.shields.io/badge/C%23-239120?style=for-the-badge&logo=c-sharp&logoColor=white)
![Git](https://img.shields.io/badge/Git-F05032?style=for-the-badge&logo=git&logoColor=white)


# NelsTech Installation & Quotation System

A modern **web-based quotation and service management system** developed for **NelsTech**, a company providing installation services such as **Air Conditioning, Solar Systems, CCTV, Gate Motors, Electric Fencing, and Electrical Services**.

The system allows customers to request quotations online, while administrators can manage, track, and respond to requests through an admin dashboard.

---

## Features

### Customer Features
- Request quotations online
- Select service type
- Upload project details
- Receive email confirmation
- Contact NelsTech directly
- Mobile-friendly interface

### Admin Features
- Secure admin login
- View all quotation requests
- Update quotation status
- Mark requests as completed
- Respond to customers by email
- Manage website content and gallery

### Service Categories
- Solar Installation
- Air Conditioning Installation
- CCTV Installation
- Gate Motor Installation
- Electric Fence Installation
- Electrical Services

---

## Technologies Used

| Technology | Purpose |
|------------|---------|
| PHP | Backend development |
| MySQL | Database management |
| HTML5 | Page structure |
| CSS3 | Styling |
| JavaScript | Interactivity |
| PHPMailer | Email notifications |
| XAMPP | Local development |

---

## Screenshots

### Home Page
![Home](screenshots/home.png)

### Services Section
![Services](screenshots/services.png)

### Quotation Form
![Quote](screenshots/quote.png)

### Admin Dashboard
![Admin](screenshots/admin.png)

---

## Installation

### Requirements
- XAMPP / WAMP / LAMP
- PHP 8+
- MySQL 5.7+

### Setup

1. **Clone the repository**

```bash
git clone https://github.com/romeo079/nelstech.git
```

2. **Move the project folder** to `htdocs`.

3. **Create the database**

```sql
CREATE DATABASE nelstech;
```

4. **Import the SQL file**

- Open phpMyAdmin
- Select `nelstech`
- Import `database/nelstech.sql`

5. **Configure email settings**

Edit:

```text
config/mail.php
```

Add your SMTP credentials.

6. **Start Apache and MySQL**

7. **Open the application**

```text
http://localhost/nelstech
```

---

## Default Admin Login

```text
Email: admin@nelstech.co.za
Password: admin123
```

> Change the password after the first login.

---

## Project Structure

```text
nelstech/
│
├── admin/
├── assets/
│   ├── css/
│   ├── js/
│   └── images/
├── config/
├── database/
├── includes/
├── uploads/
├── screenshots/
├── index.php
├── services.php
├── quote.php
├── contact.php
└── README.md
```

---

## Database Features

- Customer quotation requests
- Service categories
- Admin accounts
- Contact messages
- Status tracking (Pending, Approved, Completed)

---

## Future Improvements

- PDF quotation generation
- WhatsApp integration
- Online payment support
- Role-based admin access
- Analytics dashboard
- Customer portal
- Image gallery management

---

## Learning Outcomes

This project helped me improve my skills in:

- Full-stack web development
- Database design
- User authentication
- Email integration with PHPMailer
- File uploads
- CRUD operations
- Responsive design
- Debugging and testing

---

## Author

**Romeo Chauke**

- GitHub: [@romeo079](https://github.com/romeo079)
- Email: chaukeromeo01@gmail.com

---

## License

This project is developed for **portfolio and educational purposes**.
