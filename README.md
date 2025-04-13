# Fund Return Management System (Laravel 9 API)

This Laravel-based API allows you to create investment funds, add returns (compound or non-compound), revert returns, and calculate the value of a fund at any specific date.

## ⚙️ Local Setup Guide (XAMPP on Port 8080)

### 🧱 Requirements
- PHP 8.0+
- Composer
- MySQL (via XAMPP)
- Apache running on Port 8080
- Postman (for API testing)

### 🚀 Installation Steps

1Copy .env.example to .env:

bash
Copy
Edit
cp .env.example .env
Update .env database config:

makefile
Copy
Edit
DB_DATABASE=fund_return
DB_USERNAME=root
DB_PASSWORD=
Generate application key:

bash
Copy
Edit
php artisan key:generate
Run database migrations:

bash
Copy
Edit
php artisan migrate
✅ Using the API
Base URL:

bash
Copy
Edit
http://localhost:8080/FundReturnProject/public/index.php
📌 API Endpoints
1. Create Fund
POST /api/funds

json
Copy
Edit
{
  "name": "My Test Fund",
  "initial_balance": 1000
}
2. Add Return
POST /api/funds/{fund_id}/returns

json
Copy
Edit
{
  "return_type": "monthly",
  "is_compound": true,
  "percentage": 5,
  "effective_date": "2024-01-01"
}
3. Get Fund Value
GET /api/funds/{fund_id}/value?date=2024-03-01

4. Revert a Return
DELETE /api/returns/{return_id}

🧪 Postman Testing Instructions
Set method (POST/GET/DELETE)

Set URL using the base:
http://localhost:8080/FundReturnProject/public/index.php/...

Go to the Body tab

Choose raw → JSON

Set header:
Content-Type: application/json

📦 Directory Structure Overview
routes/api.php → API endpoints

app/Models/Fund.php → Fund model

app/Models/FundReturn.php → Return model

app/Http/Controllers/FundController.php → Controller logic

database/migrations/ → DB table definitions

💡 Features
Compound & flat return support

Return reversal with rollback logic

Value calculation by effective date

Clean API validation & structure

👑 Developer Info
Olajide Peter Ayobami
📧 contact@peterman.com.ng
🌐 www.peterman.com.ng