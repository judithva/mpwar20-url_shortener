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

    sudo docker-compose up -d
    sudo make interactive
 

## 🎯 Casos de uso 

### 🔗 Acortar

El comando de CLI [app:url-shortener](src/UrlShortened/Infrastructure/Ui/Cli/ShortenerCommand.php) espera una URL para devolver una URL acortada por [Bitly](src/UrlShortened/Infrastructure/Service/BiltyUrlShortener.php). Para ejecutar nuestro 
commando CLI desde nuestro [make interactive](sudo make interactive), hemos de utilizar la siguiente instrucción:

    bin/console app:url-shortener

## 🚀 Arquitectura
Esta practica sigue el patrón de Arquitectura Hexagonal, para ello se ha estructurado de la siguiente  manera:

```scala
$ tree

src
├── Kernel.php
└── UrlShortened
    ├── Application
    │   └── UrlShortener
    │       ├── UrlShortener.php
    │       ├── UrlShortenerRequest.php
    │       └── UrlShortenerResponse.php
    ├── Domain
    │   ├── Model
    │   │   ├── Aggregate
    │   │   │   └── UrlShortened.php
    │   │   └── ValueObject
    │   │       ├── UrlId.php
    │   │       └── Url.php
    │   └── Service
    │       └── UrlShortener.php
    └── Infrastructure
        ├── Service
        │   └── BiltyUrlShortener.php
        └── Ui
            └── Cli
                └── ShortenerCommand.php

```
