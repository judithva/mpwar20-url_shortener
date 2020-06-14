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

    sudo docker-compose -f docker-compose.yml -f docker-compose.db.yml up -d
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


## 🚀 Arquitectura
Esta practica sigue el patrón de Arquitectura Hexagonal, para ello se ha estructurado de la siguiente  manera:

```scala
$ tree

src
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
    │   │   ├── Event
    │   │   │   └── UrlWasShorten.php
    │   │   └── ValueObject
    │   │       ├── UrlId.php
    │   │       └── Url.php
    │   ├── Service
    │   │   └── UrlShortener.php
    │   └── UrlShortenedRepository.php
    └── Infrastructure
        ├── Persistence
        │   ├── MysqlDatabase.php
        │   └── Repository
        │       └── MySQLUrlShortenedRepository.php
        ├── Service
        │   └── BiltyUrlShortener.php
        └── Ui
            └── Cli
                └── ShortenerCommand.php

```

## 🤔 Consideraciones

*  Cabe mencionar que con el uso de algunas dependencias de Symfony se aprovechado para realizar la inyección de dependencias en el fichero [service.yaml](config/services.yaml)
   y así tener el código limpio.
