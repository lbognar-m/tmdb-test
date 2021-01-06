<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Task: feed de date din tmdb.org

Intro aplicatie pe laravel, trebuie sa preluam feed de date din TMDB si sa il returnam ca si raspuns JSON. La fiecare element din lista vom formata sa se returneze doar:
descrierea, numele si poster_path, precum si o proprietate care o sa fie din partea aplicatie laravel: internal_id - random string de lungimea de 10 caractere
Ca si endpoint o sa folosesti https://developers.themoviedb.org/3/movies/get-movie-lists
Poti folosi api key 31f815104ff2b0e3efd8998a8ecd6b28
Endpointul final trebuie sa suporte paginare.
----------------------------------------------------------------------------------------------
## Mentiune

https://developers.themoviedb.org/3/movies/get-movie-lists nu contine date valide,
nu returneaza filme ci liste, care nu au descriere, nume si poster_path
(https://api.themoviedb.org/3/movie/400160/lists?api_key=31f815104ff2b0e3efd8998a8ecd6b28&callback&language=en-US&page=1),
si din cauza asta am folosit https://developers.themoviedb.org/3/movies/get-similar-movies

- am mai adaugat cateva mici detalii la JSON, ca si numarul maxim de pagini etc.
- pe index '/', am pus cateva linkuri catre API-ul generat de laravel, pt o accesare mai usoara.