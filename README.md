# 👀 Práctica Acortador de URL

## Índice

* [🎉 Introducción](#-introduccin)
* [🔗 Puesta en marcha](#-inicializacion)
* [🎯 Casos de uso](#-casos-de-uso)
    * [🔗 Acortar](#-acortar)
    * [🏪 Guardar](#-guardar)
    * [🎰 Contador](#-contador)
* [🚀 Arquitectura](#-arquitectura)
* [🤔 Consideraciones](#-consideraciones)

## 🎉 Introducción

Esta práctica tiene como base el proyecto de PHP Bootstrap (base / project skeleton) de CodelyTv, más info del [repositorio](https://github.com/CodelyTV/php-basic-skeleton).
Además de algunas dependencias de Symfony, más info en [composer](composer.json)

## 🔗 Puesta en marcha

Previamente se ha de tener instalado [Docker](https://www.docker.com/get-started)

Para inicializar el proyecto se ha de levantar el entorno siguiendo los siguientes pasos:

    * Para levantar el servidor y base de datos   
    sudo docker-compose -f docker-compose.yml -f docker-compose.db.yml up -d
    
    * Para hacer uso de la consola del comando
    sudo make interactive

Una vez se haya levantado el entorno es necesario ejecutar el script de nuestro esquema de datos: 
    [UrlShortener.sql](database/urlShortener.sql)   

## 🎯 Casos de uso 

### 🔗 Acortar

El comando de CLI [app:url-shortener](src/UrlShortened/Infrastructure/Ui/Cli/ShortenerCommand.php) espera una URL para devolver una URL acortada por [Bitly](src/UrlShortened/Infrastructure/Service/BiltyUrlShortener.php). Para ejecutar nuestro 
commando CLI desde nuestro [make interactive](sudo make interactive), hemos de utilizar la siguiente instrucción:

    bin/console app:url-shortener

### 🏪 Guardar

Después de acortar el enlace con el commando CLI [app:url-shortener](src/UrlShortened/Infrastructure/Ui/Cli/ShortenerCommand.php), se dispara el evento [UrlWasShorten](src/UrlShortened/Domain/Model/Event/UrlWasShorten.php) que guardará toda 
la información de nuestro agregado [UrlShortened](src/UrlShortened/Domain/Model/Aggregate/UrlShortened.php), mediante nuestro caso de uso [SaveUrl](src/UrlShortened/Application/SaveUrl/SaveUrl.php) .

### 🎰 Contador

El [Endpoint HTTP](src/UrlShortened/Infrastructure/Ui/Http/GetShortenUrlsNumberByCampaignController.php) devuelve un JSON con los enlaces acortados segmentados por `utm_campaign`, queda pendiente de devolver el JSON con el total de enlaces
acortados.

## 🚀 Arquitectura
Esta practica sigue el patrón de Arquitectura Hexagonal, para ello se ha estructurado de la siguiente  manera:

```scala
$ tree

src
├── CacheKernel.php
├── Kernel.php
├── Shared
│   ├── Domain
│   │   ├── Bus
│   │   │   └── EventBus.php
│   │   └── Event
│   │       └── DomainEvent.php
│   └── Infrastructure
│       └── Bus
│           └── Event
│               ├── EventDispatcherDomainEventBus.php
│               └── SymfonyEvent.php
└── UrlShortened
    ├── Application
    │   ├── GetShortenUrlsNumberPerCampaign
    │   │   ├── GetShortenUrlsNumberPerCampaign.php
    │   │   ├── GetShortenUrlsNumberPerCampaignResponse.php
    │   │   └── GetShortenUrlsNumberResponse.php
    │   ├── SaveUrl
    │   │   ├── SaveUrl.php
    │   │   └── SaveUrlRequest.php
    │   ├── SaveUrlOnUrlWasShorten.php
    │   └── UrlShortener
    │       ├── UrlShortener.php
    │       ├── UrlShortenerRequest.php
    │       └── UrlShortenerResponse.php
    ├── Domain
    │   ├── Model
    │   │   ├── Aggregate
    │   │   │   └── UrlShortened.php
    │   │   ├── Dto
    │   │   │   └── ShortenUrlsPerCampaignNumber.php
    │   │   ├── Event
    │   │   │   └── UrlWasShorten.php
    │   │   └── ValueObject
    │   │       ├── UrlId.php
    │   │       └── Url.php
    │   ├── Service
    │   │   ├── ShortenUrlsPerCampaignCounter.php
    │   │   └── UrlShortener.php
    │   └── UrlShortenedRepository.php
    └── Infrastructure
        ├── Persistence
        │   ├── MysqlDatabase.php
        │   └── Repository
        │       ├── MySQLShortenUrlsPerCampaignCounter.php
        │       └── MySQLUrlShortenedRepository.php
        ├── Service
        │   └── BiltyUrlShortener.php
        └── Ui
            ├── Cli
            │   └── ShortenerCommand.php
            └── Http
                └── GetShortenUrlsNumberByCampaignController.php

```

## 🤔 Consideraciones

*  Cabe mencionar que con el uso de algunas dependencias de [Symfony](https://symfony.com/doc/current/index.html) se aprovechado para realizar la inyección de dependencias en el fichero [services.yaml](config/services.yaml)
   y así tener el código limpio. 
*  En el fichero [routes.yaml](config/routes.yaml) se ha declarado el punto de entrada de nuestro EndPoint HTTP.
*  En esta practica no se ha instalado Symfony como base sino algunas de sus dependencias para poder implementar las funcionalidades requeridas por lo que se ha tenido que incluir algunas clases y archivos.

         
