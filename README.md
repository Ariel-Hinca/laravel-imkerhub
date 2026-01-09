# ImkerHub
ImkerHub is een Laravel-platform voor imkers en klanten. 
Imkers kunnen hun bijenproducten en diensten aanbieden, terwijl klanten deze producten eenvoudig kunnen bekijken en bestellen.
Admins beheren gebruikers, producten, bestellingen, nieuws en FAQ-items.

De website bevat:
- gebruikersauthenticatie
- publieke gebruikersprofielen
- nieuwsitems
- FAQ-sectie
- contactformulier
- een eenvoudig bestelsysteem (extra feature)

## Installatie (lokale omgeving)
### 1. Repository clonen
- git clone
- cd imkerhub

### 2. Dependencies installeren
- composer install
- npm install
- npm run dev

### 3. `.env` configureren
Maak een `.env` bestand op basis van `.env.example` en vul je databasegegevens in.
- cp .env.example .env

### 4. App key genereren
- php artisan key:generate

### 5. Database migreren + seeders uitvoeren
- php artisan migrate --seed

### 6. Storage link maken (voor profielfoto’s)
- php artisan storage:link

### 7. Project lokaal starten
Ik kan "php artisan serve" niet runnen wegens mijn lokale Windows-omgeving (FireWall), daarom gebruik ik deze command om de applicatie te starten:
- php -S 127.0.0.1:8081 -t public

De website is daarna bereikbaar via:
http://127.0.0.1:8081


## Authenticatie (Laravel Breeze)
Voor de basis-authenticatie gebruik ik Laravel Breeze, de officiële starter kit van Laravel. 
Breeze voorziet de standaardfunctionaliteiten zoals registratie, login, logout, “remember me”, wachtwoord reset en optioneel e-mailverificatie.

Documentatie: https://laravel.com/docs/breeze

## Default Admin Account
Bij het uitvoeren van de seeders wordt automatisch een administrator aangemaakt:
- Email: admin@ehb.be
- Wachtwoord: Password!321

Deze gebruiker kan andere accounts adminrechten geven of afnemen.

## Belangrijke informatie
- `vendor/` en `node_modules/` staan in `.gitignore`, zoals vereist.
- Het project gebruikt Blade, Tailwind CSS (via Vite) en Laravel Eloquent ORM.

## Bronvermeldingen
- Laravel Breeze documentatie: https://laravel.com/docs/breeze
- Laravel framework documentatie: https://laravel.com/docs

- Voor bepaalde onderdelen van dit project, zoals het admin CRUD-systeem voor nieuwsitems en het opslaan van afbeeldingen, heb ik gebruikgemaakt van AI-ondersteuning (ChatGPT: https://chatgpt.com/share/694aa92c-83b4-800f-acd3-1e6837097414).
  De AI werd gebruikt om stap-voor-stap uitleg te krijgen en voorbeeldcode te genereren die aangepast werd aan mijn project.
  Alle gegenereerde code werd nagekeken en begrepen voordat ze werd toegepast.

### Afbeeldingen opslaan in Laravel
Voor het uploaden van de profielfoto-upload heb ik extra informatie gebruikt uit dit artikel:
- https://medium.com/@laravelprotips/storing-public-and-private-files-images-in-laravel-a-comprehensive-guide-6620789fad3b

### Favicon

De favicon die in dit project wordt gebruikt, is gegenereerd met **Real Favicon Generator**.  
- https://realfavicongenerator.net

De gegenereerde favicon-bestanden zijn toegevoegd aan de Laravel `public/` map.

### Contactformulier – e-mail logging

Het contactformulier verstuurt een e-mail naar de admin.
Tijdens lokale ontwikkeling heb ik gebruikgemaakt van de Laravel `log` mailer, waardoor de volledige e-mailinhoud wordt opgeslagen in: storage/logs/laravel.log
Dit maakt het mogelijk om aan te tonen dat het e-mailverzendproces correct werkt zonder een echte mailserver te gebruiken.

Voor dit onderdeel heb ik de volgende tutorial als referentie gebruikt:
- https://www.itsolutionstuff.com/post/laravel-contact-form-send-email-tutorial-example.html

De code werd vereenvoudigd en aangepast aan de structuur en het niveau van mijn project.
