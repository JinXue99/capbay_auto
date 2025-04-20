# 🚗 CapBay Auto
CapBay Auto is a Laravel-based web application designed to manage customer registrations, test drive bookings, and promotional eligibility for an auto dealership

## ✨ Capbay Software Technical Test

 Customer registration with validatin
 Test drive schedulig
 Promotion eligibility checs
 Agent dashboard for managing registratios
 Responsive design for various devics

## ⚙️ Prerequisites

 PHP >= 80
 Composr
 Laravel >= 9x
 SQLite (for local developmen)
 Node.js and npm (for frontend asset)

## 🚀 Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/JinXue99/capbay_auto.git
   cd capbay_auto
   ``


2. **Install PHP dependencies:**

   ```bash
   composer install
   ``


3. **Copy and configure the environment file:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ``


4. **Set up the database:**

   ```bash
   touch database/database.sqlite
   ``


   Update your `.env` file:

   ```env
   DB_CONNECTION=sqlite
   DB_DATABASE=/absolute/path/to/database/database.sqlite
   ``


5. **Run migrations:**

   ```bash
   php artisan migrate
   ``


6. **Install frontend dependencies:**

   ```bash
   npm install
   npm run dev
   ``


7. **Start the development server:**

   ```bash
   php artisan serve
   ``


   Visit `http://localhost:8000` in your browser.

## 👨🏻‍💻 Role
- Agent: http://localhost:8000/agent (to view the test drive Registration)
- Customer: http://localhost:8000 (to register)
