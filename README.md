# Fund Return Management System (Laravel 9 API)

This Laravel-based API allows you to create investment funds, add returns (compound or flat), revert them, and calculate a fund's value at a specific date.

## ⚙️ Local Setup (XAMPP on port 8080)

### Requirements
- PHP 8.0+
- Composer
- MySQL via XAMPP
- Apache running on port 8080
- Postman for API testing

### Installation
1. Copy the example environment file and configure the database:
   ```bash
   cp .env.example .env
   # Edit DB_DATABASE, DB_USERNAME and DB_PASSWORD in .env
   ```
2. Generate the application key:
   ```bash
   php artisan key:generate
   ```
3. Run database migrations:
   ```bash
   php artisan migrate
   ```

## ✅ Using the API
Base URL: `http://localhost:8080/FundReturnProject/public/index.php`

### Endpoints
1. **Create Fund**
   `POST /api/funds`
   ```json
   {
     "name": "My Test Fund",
     "initial_balance": 1000
   }
   ```
2. **Add Return**
   `POST /api/funds/{fund_id}/returns`
   ```json
   {
     "return_type": "monthly",
     "is_compound": true,
     "percentage": 5,
     "effective_date": "2024-01-01"
   }
   ```
3. **Get Fund Value**
   `GET /api/funds/{fund_id}/value?date=2024-03-01`
4. **Revert a Return**
   `DELETE /api/returns/{return_id}`

### 🧪 Postman Tips
- Choose the correct method (POST/GET/DELETE).
- Use the base URL above.
- In the Body tab select `raw` → `JSON`.
- Set header `Content-Type: application/json`.

### 📦 Directory Overview
- `routes/api.php` – API endpoints
- `app/Models/Fund.php` – Fund model
- `app/Models/FundReturn.php` – Return model
- `app/Http/Controllers/FundController.php` – Controller logic
- `database/migrations/` – DB table definitions

### 💡 Features
- Compound & flat return support
- Return reversal with rollback
- Value calculation by date
- Clean API validation

### 👑 Developer Info
Olajide Peter Ayobami
<contact@peterman.com.ng>
[www.peterman.com.ng](http://www.peterman.com.ng)
