# ImkerHub
ImkerHub is een Laravel-platform voor imkers en klanten. 
Imkers kunnen hun bijenproducten en diensten aanbieden, terwijl klanten deze producten eenvoudig kunnen bekijken en bestellen.
De website bevat gebruikersprofielen, nieuws, een FAQ-sectie, een contactpagina en een eenvoudig bestelsysteem.

## Installatie (lokale omgeving)
### 1. Repository clonen
git clone
cd imkerhub

### 2. Dependencies installeren
composer install
npm install
npm run dev

### 3. `.env` configureren
Maak een `.env` bestand op basis van `.env.example` en vul je databasegegevens in.

### 4. App key genereren
php artisan key:generate

### 5. Database migreren + seeders uitvoeren
php artisan migrate --seed

## Project lokaal starten
Ik kan "php artisan serve" niet runnen wegens mijn lokale Windows-omgeving (FireWall), daarom gebruik ik deze command om de applicatie te starten:
php -S 127.0.0.1:8081 -t public

De website is daarna bereikbaar via:
http://127.0.0.1:8081


## Authenticatie (Laravel Breeze)
Voor de basis-authenticatie gebruik ik Laravel Breeze, de officiële starter kit van Laravel. 
Breeze voorziet de standaardfunctionaliteiten zoals registratie, login, logout, “remember me”, wachtwoord reset en optioneel e-mailverificatie.

Documentatie: https://laravel.com/docs/breeze

## Default Admin Account
Bij het uitvoeren van de seeders wordt automatisch een administrator aangemaakt:
Email: admin@ehb.be
Wachtwoord: Password!321
Deze gebruiker kan andere accounts adminrechten geven of afnemen.

## Belangrijke informatie
- `vendor/` en `node_modules/` staan in `.gitignore`, zoals vereist.
- Het project gebruikt Blade, Tailwind CSS (via Vite) en Laravel Eloquent ORM.

## Bronvermeldingen
- Laravel Breeze documentatie: https://laravel.com/docs/breeze
- Laravel framework documentatie: https://laravel.com/docs
