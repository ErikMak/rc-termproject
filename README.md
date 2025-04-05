<img src="https://github.com/user-attachments/assets/b1421e4a-b9ef-45b5-a076-c5260f4ed5a9" width="400">


# :car: Дипломный проект - reCar
Рабочее название проекта "reCar".

SPA веб-приложение с клиент-серверной архитектурой, RESTful веб-сервис аренды автомобилей различных категорий, разработанный на базе фреймворков Vue и Laravel с использованием языков программирования PHP и TypeScript. В проекте используется СУБД - PostgreSQL.

Веб-приложение взаимодействует с [API системы прогнозирования серьезности ДТП](https://github.com/ErikMak/dtp-prediction), использующую модель нейронной сети. 

> [!NOTE]  
> Является частью дипломного проекта 4 курса и продолжением курсового проекта 3 курса университета. 

## :books: Технологии использованы
* HTML, CSS, JavaScript
* Vue, Vuex
* Vuetify
* TypeScript
* PHP, Laravel

> Подробнее об использующихся библиотеках в разделе вики ["Пакеты"](https://github.com/ErikMak/rc-termproject/wiki/%D0%9F%D0%B0%D0%BA%D0%B5%D1%82%D1%8B).

## :anchor: Быстрый переход

* [Требования](#requires)
* [Особенности](#features)
* [Подробное описание](#description)
* [Как установить](#install)
* [Скриншоты и схемы](#screenshots)

<a name="requires"></a>

## :hammer_and_wrench: Требования

Клиент:

Package | Version
--- | ---
[npm](https://www.npmjs.com/package/npm) | V10.5.0+
[Node](https://nodejs.org/en)  | V21.7.1+

Сервер:

Package | Version
--- | ---
[composer](https://getcomposer.org/) | V2.7.1+
[PHP](https://www.php.net/)  | V8.1.9+
[PostgreSQL](https://www.postgresql.org/)  | V14+
[nginx](https://nginx.org/en/download.html)  | V1.23+

> [!IMPORTANT]  
> Так как в логику аренды авто заложено взаимодействие с системой прогнозирования ДТП необходимо так же локально запустить API, разработанное с использованием библиотеки FastAPI, которое находится в отдельном [репозитории](https://github.com/ErikMak/dtp-prediction).

<a name="features"></a>

## Особенности
- Современный стэк технологий
- Mobile First разработка
- Адаптивный material веб-дизайн
- Покрытие тестами
- Интеграция системы на базе нейронной сети
- Продуманное веб-приложение
- Ведение репозитория

<a name="description"></a>

## Подробное описание

Сервис позволяет брать в аренду доступные автомобили 
посуточно или на месяц. Авто разделены на категории, 
по которым можно осуществлять поиск, и представлены 
в виде удобного каталога. Пользователи имеют возможность 
оставлять отзывы на автомобили, просматривать свою 
историю аренды, помечать любимые авто. Можно выбирать 
комплектацию авто, цвет, доп. опции в конфигураторе.

<a name="install"></a>

## Установка - Wiki
Дополнительную информацию о веб-приложении, тестировании можно узнать в [разделе Wiki репозитория](https://github.com/ErikMak/rc-termproject/wiki).

Там же можно получить инструкцию по развертыванию проекта на сервере или локально.

<a name="screenshots"></a>

## :camera: Скриншоты
### Интерфейс
_Интерфейс мобильной версии_

![Без-имени-1](https://github.com/user-attachments/assets/f315bd0d-3baa-48c8-90a9-5c41187a27e9)


_Интерфейс мобильной версии_

![Без-имени-2](https://github.com/user-attachments/assets/6042e0ca-b42c-46ad-8bdd-2d6a0577dbc5)


_Интерфейс мобильной версии_

![Без-имени-3](https://github.com/user-attachments/assets/8b409f5b-5c2c-4858-a3f5-b6ea9d7d50be)

### Схемы
_Таблицы базы данных_

![Untitled](https://github.com/user-attachments/assets/3ba18da5-6cd9-4b1f-b204-bce570823ba0)

_UML-диаграмма последовательности_

![UML_seq](https://github.com/user-attachments/assets/8370c432-6195-48cb-b873-e9f2e345a852)

