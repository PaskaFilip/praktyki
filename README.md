# Projekt na staże

## Sekcje
+ [Instalacja](#instalation)
+ [Cele projektu](#documentation)
+ [Opis projektu](#description)

## Instalacja <a name = "instalation"></a>


Aby aplikacja działała trzeba pobrać: XAMPP'a,Symfony, oraz Node.js. Instrukcje jak to zrobić można znaleźć na tych stronach:  
  - https://www.apachefriends.org/pl/download.html  
  - https://symfony.com/doc/current/setup.html  
  - https://nodejs.org/en/download/  

Trzeba również zainstalować wymagane biblioteki przy użyciu komendy:

```
composer install
```

Gdy repozytorium zostanie pobrane wchodzimy do naszego folderu roboczego za pomocą CMD przy użyciu komendy:

```
cd nazwafolderu
```

Aby uruchomić aplikację, należy wpisać komendę:

```
npm run dev
```

Jeśli się nie uda, oznacza to że najprawdopodobniej brakuje nam jednego pluginu.  
Aby go pobrać należy wpisać komendę:

```
npm install webpack-notifier@^1.6.0 --save-dev
```
## Cele projektu <a name = "documentation"></a>
### Zadania, które miały zostać wykonane:  
- Aplikacja ma za pomocą komendy konsolowej pobierać posty (końcówka /posts) a API REST jsonplaceholder.typicode.com i zapisywać je do bazy wraz z imieniem i nazwiskiem autora (pobrane w relacji z końcówki /users)  
- Aplikacja na podstronie /lista powinna wyświetlać listę pobranych postów z możliwości ich usunięcia z lokalnej bazy danych. Podstrona ta ma być dostępna po zalogowaniu - proszę użyć wbudowanych modułów autoryzacyjnych.  
- Z pomocą API platform aplikacja ma udostępniać końcówkę /posts z metodą GET do pobierania postów z lokalnej bazy danych.  

## Opis projektu <a name="description">
### Podstrony: 
- Jeśli chcemy zobaczyć listę postów, pobranych z jsonplaceholder.typicode.com/posts, należy wejść na podstronę /posts.  
- Aby wypełnić bazę danych, należy wejść na podstronę /populate
### Użytkownicy:
- admin z hasłem admin
- user z hasłem user
