# ✅ Evaluación práctica de recuperación

En este documento se detallan distintos criterios de evaluación que se tendrán en cuenta a la hora de valorar la nota a obtener.

Lo podemos ver como una _Rúbrica de Corrección™️_ pero con algunos matices importantes.

## ℹ️ Índice

* [🎯 Objetivos de este documento](#-objetivos-de-este-documento)
* [📊 Criterios de evaluación](#-criterios-de-evaluacin)
    * [📝 Documentación (10%)](#-documentacin-10)
    * [💻 Casos de uso (90%)](#-casos-de-uso-90)

## 🎯 Objetivos de este documento

Este documento se lleva a cabo como una ayuda extra con la intención de servir a modo de:

* Checklist de cosas a tener en cuenta para repasar antes de empezar a hacer la práctica, y antes de entregarla
* Transparencia en la evaluación: ¿Qué aspectos principales se tendrán en cuenta para la nota?
* Agilidad en la evaluación: ¿Dónde se encuentran los distintos elementos a evaluar?
    * ☝️ ¡Pista!: Si no puedes enlazar a un ejemplo concreto donde aplique un concepto, seguramente es que algo no acabe de encajar en lo que se pide 😬

Cuáles NO son los objetivos de este documento:

* Desglosar pormenorizadamente todos los detalles que pueden surgir en la evaluación
* Servir de documento legal al que adherirse a pie juntillas a la hora de reclamar

## 📊 Criterios de evaluación

### 📝 Documentación (10%)

* 👀 Fichero `README.md` en la raíz del repositorio explicando claramente:
    * Objetivo del proyecto
    * Instrucciones de configuración del entorno para poder ejecutar el proyecto
    * Puntos de entrada de la aplicación indicando por cada uno:
        * Qué hace
        * Qué argumentos de entrada espera y de qué tipo son
        * Qué devuelve
        * Qué efectos colaterales (_side effects_) provoca (guarda en BD, escribe log, crea un enlace en bitly…)
* ✅ Fichero `EVALUACION.md` (este documento) en la raíz del repositorio con las tablas de autoevaluación rellenadas
* 🔀 Limpieza Git:
    * Hacer un commit inicial con el código del que se parta en caso de tomar como base cualquier [proyecto de esqueleto](https://github.com/CodelyTV?q=skeleton&type=&language=php) o práctica de grupo si se considera oportuno
    * Seguir una de las siguientes estrategias a la hora de trabajar en Git:
        * _Feature branches_: 1 rama por cada caso de uso que contenga los diversos _commits_ hasta ser funcional, y finalmente integrar a `master` con _commit_ de _merge_ una vez acabado de todo el ejercicio. Ejemplo (commits más recientes arriba, se lee empezando por abajo):
            ```bash
            * 21c8e03 Merge branch '03-short_urls_counter' into master // ☝️ único commit de _merge_ en `master` desde la rama `03-bitly_short_url`
            |\
            | * … (los commits que sean, ver ejemplo en el primer ejercicio de abajo 👇)
            |/
            * 5e5cc9c Merge branch '02-save_short_urls' into master
            |\
            | * … (los commits que sean, ver ejemplo en el primer ejercicio de abajo 👇)
            |/
            * 91e6cf4 Merge branch '01-create_short_urls' into master
            |\
            | * a368038 👼 Update README.md and ENUNCIADO_RECUPERACION.md with the use case instructions
            | * 21c8e03 💤 … // Whatever steps you consider
            | * 5e5cc9c 📤 Require Guzzle dependency in order to serve as HTTP client for the bitly API
            | * 91e6cf4 ⚡ Implement a Hello World command testing out everything works
            | * 5e5cc9c 💻 Require Symfony Console dependency in order to serve as CLI
            |/
            * 79d8d6a 🚀 Project bootstrap based on https://github.com/CodelyTV/php-basic-skeleton
            ```
        * _Master-only_: Si se prefiere trabajar sin ramas y hacer los commits a `master`, es necesario un _tag_ en los _commits_ donde finalmente se consideren funcionales cada uno de los casos de uso. Ejemplo:
            ```bash
            * 79d8d6a (tag: 03-short_urls_counter) 👼 Update README.md and ENUNCIADO_RECUPERACION.md with the use case instructions
            * … (los commits que sean, ver ejemplo en el primer ejercicio de abajo 👇)
            * 5e5cc9c (tag: 02-save_short_urls) 👼 Update README.md and ENUNCIADO_RECUPERACION.md with the use case instructions
            * … (los commits que sean, ver ejemplo en el primer ejercicio de abajo 👇)
            * a368038 (tag: 01-create_short_urls) 👼 Update README.md and ENUNCIADO_RECUPERACION.md with the use case instructions
            * 21c8e03 💤 … // Whatever steps you consider
            * 5e5cc9c 📤 Require Guzzle dependency in order to serve as HTTP client for the bitly API
            * 91e6cf4 ⚡ Implement a Hello World command testing out everything works
            * 5e5cc9c 💻 Require Symfony Console dependency in order to serve as CLI
            * 79d8d6a 🚀 Project bootstrap based on https://github.com/CodelyTV/php-basic-skeleton
            ```
    * _Commits_ acotados, atómicos, y con _commit messages_ descriptivos
        * En el ejemplo del _log_ anterior se puede ver cómo aplica esto
        * Acotado: No 1 único commit tipo "Solution"
        * Atómico: No saltar al otro extremo de commits tipo "if clause", "if braces", "else", "else braces", etc. Nos debemos poder mover a cualquier commit sin que la build esté rota (en el caso de PHP, el código debe ser funcional. En lenguajes compilados, deberíamos poder compilar. En cualquier caso, los tests -en caso de existir- deberían pasar)
        * _Commit messages_ descriptivos: Intentar explicar el por qué de los cambios y no el qué (eso ya se ve en el _changelog_ del _commit_).
            * Ejemplo 👎: "Implement a Hello World command". Por qué KO: En changelog ya se ve que eso está pasando en ese commit. Nos interesa decir por qué hemos tomado esa decisión para poder trazarlo en un futuro, comunicarnos con nuestros compañeros, etc.
            * Ejemplo 👍: "Implement a Hello World command testing out everything works". Por qué OK: Ahora se entiende que realmente el objetivo no es hacer un _Hello World_. Ahora se entiende que hemos hecho este commit para validar que todos los engranajes funcionan y ponernos a trabajar en la chicha a partir de aquí.

#### Tabla autoevaluación

☝️ Se debe editar la columna "¿Hecho?" dejando únicamente el indicador conforme se ha llevado a cabo o no cada apartado.

| Concepto           | Peso | ¿Hecho? | Enlace                            |
| ------------------ | ---- | ------- | --------------------------------- |
| 👀 `README.md`     | 2,5% | ❌/✅   | [README.md](README.md)            |
| ✅ `EVALUACION.md` | 2,5% | ❌/✅   | [EVALUACION.md](EVALUACION.md)    |
| 🔀 Limpieza Git    | 5%   | ❌/✅   | [Listado commits](commits/master) |

### 💻 Casos de uso (90%)

Tenemos 3 casos de uso a implementar. Cada uno con los siguientes pesos respecto la nota final de la práctica:

* 🔗 Acortar: 27%
* 🏪 Guardar: 31,5%
* 🎰 Contador: 31,5%

Por cada uno de ellos aplican los siguientes criterios:

* 👀 Funcionalidad: ¿Se puede ejecutar el caso de uso y se comporta tal y como se describe en el enunciado?
    * Representa un 20% de la nota del caso de uso
* 👌 Implementación (diseño y arquitectura): ¿Se aplican los principios y técnicas vistas en clase?
    * Representa un 80% de la nota del caso de uso
    * Ejemplos de aspectos que se tendrán en cuenta:
        * Uso de PHP 7.4 con tipado en atributos, argumentos de entrada y retorno
        * Técnicas de _Clean Code_ como el uso de Cláusulas de guarda, métodos acotados…
        * Cumplimiento de estándares PSR
        * Estructura de _namespaces_ escalable. Como raíz del proyecto usaremos: `LaSalle\UrlShortener\NombreApellido\`
        * Principios SOLID
        * Arquitectura Hexagonal
        * Event-Driven Architecture
        * Simple Design

Como bien sabemos, este ejercicio bien podría ser un script en 1 fichero `UrlShortener.php` y a molar. No tiene una alta complejidad que requiera de los niveles de abstracción vistos en clase en términos de entidades, _Value Objects_, separación en capas, etc.

No obstante, estamos validando que somos capaces de llevar a la práctica conceptos aplicables en contextos donde la **tolerancia al cambio, testabilidad, y mantenibilidad** de nuestro código son aspectos críticos.

Con lo cuál, partimos de la base de que este `UrlShortener` es un proyecto que deberemos mantener al largo plazo añadiendo funcionalidades, manteniendo las existentes, y que recibirá un alto volumen de peticiones concurrentes.

#### Tabla autoevaluación

☝️ Se debe editar la columna "¿Hecho?" dejando únicamente el indicador conforme se ha llevado a cabo o no cada apartado.

En este caso, **el enlace deberá apuntar a la clase que represente el punto de entrada más externo** del caso de uso. Esto es: Controlador HTTP, comando de consola, o suscriptor del evento si fuera necesario dependiendo de cada caso. Solo 1 enlace por caso de uso.

| Caso de uso | Concepto          | Peso  | ¿Hecho? | Enlace |
| ----------- | ----------------- | ----- | ------- | ------ |
| 🔗 Acortar  | 👀 Funcionalidad  | 5,4%  |   ✅    |        |
| 🔗 Acortar  | 👌 Implementación | 21,6% |   ✅    |  [app:url-shortener](src/UrlShortened/Infrastructure/Ui/Cli/ShortenerCommand.php)      |
| 🏪 Guardar  | 👀 Funcionalidad  | 6,3%  |   ✅    |        |
| 🏪 Guardar  | 👌 Implementación | 25,2% |   ✅    |  [UrlShortener](src/UrlShortened/Application/UrlShortener/UrlShortener.php)      |
| 🎰 Contador | 👀 Funcionalidad  | 6,3%  | ❌/✅   |        |
| 🎰 Contador | 👌 Implementación | 25,2% | ❌/✅   |        |

