# O tomto frameworku

Tento framework vznikol na podporu výučby predmetu Vývoj aplikácií pre intranet a intrenate (VAII)
na [Fakulte informatiky a riadenia](https://www.fri.uniza.sk/) [Žilinskej univerzity v Žiline](https://www.uniza.sk/). Framework je navrhnutý tak, aby bol čo
najmenší a najjednoduchší.

# Návod a dokumentácia

Kód frameworku je kompletne okomentovaný. V prípade, že na pochopenie potrebujete dodatočné informácie,
navštívte [WIKI stránky](https://github.com/thevajko/vaiicko/wiki).

# Docker

Framework ma v adresári `<root>/docker` základnú konfiguráciu pre spustenie a debug web aplikácie. Všetky potrebné služby sú v `docker-compose.yml`. Po ich spustení sa vytvorí:

- __WWW document root__ je nastavený adresár riešenia, čiže web bude dostupný na adrese [http://localhost/](http://localhost/). Server má pridaný modul pre
  ladenie móde" (`xdebug.start_with_request=yes`).
- webový server beží na __PHP 8.2__ s [__Xdebug 3__](https://xdebug.org/) nastavený na port __9003__ v "auto-štart" móde
- PHP ma doinštalované rozšírenie __PDO__
- databázový server s vytvorenou _databázou_ a tabuľkami `messages` a `users` na porte __3306__ a bude dostupný na `localhost:3306`. Prihlasovacie údaje sú:
    - MYSQL_ROOT_PASSWORD: db_user_pass
    - MYSQL_DATABASE: databaza
    - MYSQL_USER: db_user
    - MYSQL_PASSWORD: db_user_pass
- phpmyadmin server, ktorý sa automatický nastavený na databázový server na porte __8080__ a bude dostupný na
  adrese [http://localhost:8080/](http://localhost:8080/)

# Spustenie projektu

Inštalácia PHPStorm:

1. Otvorte prehliadač a prejdite na stránku -> PHPStorm - JetBrains
2. Kliknite na tlačidlo Download (stiahnuť).
3. Vyberte verziu pre váš operačný systém (Windows, macOS, Linux).
4. Po stiahnutí spustite inštalačný súbor a postupujte podľa pokynov inštalátora.
5. Po dokončení inštalácie spustite PHPStorm a podľa potreby sa prihláste do svojho JetBrains účtu.

Inštalácia Dockeru:

1. Otvorte prehliadač a prejdite na -> Docker - oficiálna stránka
2. Kliknite na tlačidlo Download (stiahnuť).
3. Vyberte verziu pre váš operačný systém:
4. Windows: Stiahnite a nainštalujte Docker Desktop for Windows.
5. MacOS: Stiahnite a nainštalujte Docker Desktop for Mac.
6. Linux: Postupujte podľa pokynov pre váš distribúciu (napr. Ubuntu, Fedora).
7. Po stiahnutí spustite inštalačný súbor a postupujte podľa pokynov inštalátora.
8. Po dokončení reštartujte počítač (ak je to potrebné).
9. Spustite Docker Desktop a uistite sa, že beží.

Spustenie Docker Compose:

1. Nájdite v PHP storme súbor docker
2. Otvorte ho
3. Nájdite docker-compose
4. spustite docker-compose

Otvorenie lokálnej adresy v prehliadači
Keď je Docker Compose úspešne spustený, môžete si otvoriť svoju PHP aplikáciu v prehliadači.

Otvorte Google Chrome, Firefox, alebo iný prehliadač.

Do adresného riadka zadajte: http://127.0.0.1/




    
