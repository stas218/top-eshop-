Top-Eshop (Top-eshop) - quick start
=================================

Structure:
- public/ is the web root
- config.php - main configuration
- setup_db.php - initialize sqlite DB and demo data

Quick local test:
1. Ensure PHP 7.4+ is installed.
2. From the project root run:
   php -S localhost:8000 -t public
3. Visit http://localhost:8000

Before production:
- Replace PLACEHOLDER_DOMAIN in config.php
- Setup SMTP credentials in config.php
- Replace admin password with a secure hash
- Set up Stripe keys if you want card payments
- Use HTTPS on hosting
