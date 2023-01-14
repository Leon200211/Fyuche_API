# Тестовое задание на позицию php разработчика


## Задание
Разработать REST API для записной книжки 


## Результат

Это REST API была написана на основе другого проекта (https://github.com/Leon200211/fitlent_online_store)
Многие методы и настройки не используются в данной Api, я их оставил для димонстрации возможности масштабирования проекта
Более подробно ознакомится полноценной работой методов можно здесь - https://github.com/Leon200211/fitlent_online_store Проект находится в стадии разработки

Для тестрования использовал Postman и Xdebug

Структура методов: 

    1.1. GET http://fyuche.api/                                (Получить все записи)
    1.2. GET http://fyuche.api/notebook/                        (Получить все записи)
    1.3. GET http://fyuche.api/notebook/show/id/<int:id>        (Получение определенной записи)
    1.4. POST http://fyuche.api/notebook/add                    (Добавление записи)
    1.5. POST http://fyuche.api/notebook/edit/id/<int:id>       (Изменение определенной записи)
    1.6. DELETE http://fyuche.api/notebook/delete/id/<int:id>   (Удаление определенной записи)
    
    "notebook" - можно не указывать
    
Поля для POST запискной книжки: 
  
    1. ФИО (обязательное)
    2. Компания
    3. Телефон (обязательное)
    4. Email (обязательное)
    5. Дата рождения 
    6. Фото
    
## Структура таблицы в БД

![image](https://user-images.githubusercontent.com/91278041/211824051-933c46de-c84b-4fcc-94d5-ecb19dd2469d.png)

## Примечание к проекта

### Структура проекта

В ядре проекта (*core/base*) находятся:
* Базовые классы и трейты для работы контроллеров
* Базовые классы и настройки для логгера ошибок
* Базовые классы для работы моделей
* Настройки проекта

В папке (*core/user*) находятся классы для реализации функционала api
Так же есть возможность добавить папку admin


![image](https://user-images.githubusercontent.com/91278041/211824450-0aa4d023-2e11-413b-9ac3-f6029b65f762.png)


### Данные

Получение структуры таблицы (метод createTableData)

![image](https://user-images.githubusercontent.com/91278041/211781495-a86142e1-417c-4fb6-941c-e727fd235586.png)

Получение данных таблицы (метод createData)

![image](https://user-images.githubusercontent.com/91278041/211786036-ad8b7a6f-2305-41c1-a887-c54064738d99.png)

Пример данных на принимаемых моделями

![image](https://user-images.githubusercontent.com/91278041/211825442-3cc0911f-a23f-4ce6-92bf-73f3efd5bfbe.png)


### Логгер ошибок

![image](https://user-images.githubusercontent.com/91278041/211824374-344e10f1-a30b-4a66-8131-d034fc645513.png)

    
    

## Результат работы api

### Вывод данных

![Безымянный](https://user-images.githubusercontent.com/91278041/211826383-10d767ae-02f0-4c50-aa37-c500cab6a7c7.png)

### Добавление данных

![Безымянный](https://user-images.githubusercontent.com/91278041/211826108-bb9d0251-b601-4736-9f01-24c6c3f8a806.png)

### Изменение данных

![211827354-412de216-51f9-44f8-a4b7-109602ed5775](https://user-images.githubusercontent.com/91278041/211828186-6d9798a8-5b9f-416c-9eb4-18376e7e2c87.png)

### Удаление данных

![image](https://user-images.githubusercontent.com/91278041/211827917-0124f373-4be6-4a0c-95b7-b162eeeebe0b.png)

