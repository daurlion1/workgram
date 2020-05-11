# <h1>Workgram Project</h1>

### BAD TEAM

### API BASE URL: https://workgram.com/api/



<h3> Примечание: знак ' || ' значит ИЛИ </h3>

<hr>
<br> INVALID_FIELD = 1;
<br> UNAUTHORIZED = 2;
<br> SYSTEM_ERROR = 3;
<br> AUTH_ERROR = 4;
<br> ACCESS_DENIED = 5;
<br> UNIQUE_RESOURCE_CONFLICT = 6;
<br> RESOURCE_NOT_FOUND = 7;
<br> INVALID_ARGUMENT = 8;
<br> INVALID_TOKEN = 9;
<br> INVALID_RESET_CODE = 10;
<br> INVALID_PASSWORD_FORMAT = 11;
<br> INVALID_EMAIL_FORMAT = 12;
<br> INVALID_USERNAME_FORMAT = 13;
<br> EXPIRED_RESET_CODE = 14;
<br> EXPIRED_TOKEN = 15;
<br> EMPTY_CODE = 16;
<br> FILE_NOT_FOUND = 17;
<br> TOO_LARGE_FILE_SIZE = 18;
<br> REQUIRED_PARAMS_NOT_FOUND = 19;
<br> ALREADY_EXISTS = 20;
<br> ALREADY_REQUESTED = 21;
<br> NOT_ALLOWED = 22;
<br> PASSWORDS_MISMATCH = 23;
<br> FIELD_REQUIRED = 24;
<br> NOT_ENOUGH_BALANCE = 25;
<br> INVALID_LOGIN = 26;
<br> INVALID_PASSWORD = 27;
<hr>

### Авторизация:
#### URL: http://127.0.0.1:8000/api/login
#### IMAGE BASE URL: https://tensend.me/images/{$image_name}
##### Токен передается через HEADER: Authorization => Bearer Token
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
ПО EMAIL:

```
    POST Request:
    {
    	"email" : "admin@mail.ru",
    	"password" : "password",
        "device_token" : "fcm_token",
        
    }
    
    Response
    {"token":"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTU4ODI1MjYwMCwiZXhwIjoxNTg4MjU2MjAwLCJuYmYiOjE1ODgyNTI2MDAsImp0aSI6IjVKY1JMd1NuRElFck0wbzEiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.b3PZatTG207e4k97-QwUSXBubWcL99O8sTI1u7ZMR_8",
    "name":null,"
    surname":null,
    "nickname":"",
    "avatar":"",
    "success":true}

```
### Регистрация
#### URL: http://127.0.0.1:8000/api/register

```
    POST Request:
    {
    	"email" : "admin@mail.ru",
        "password" : "password",
        "nickname": "administrator",
        "firstname":"Zae",
        "lastname":"Bal",
        "description":"Programmer"
    
    }
    
    RESPONSE:
    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC92MVwvcmVnaXN0ZXIiLCJpYXQiOjE1Nzk4OTk0MzksImV4cCI6MTU3OTkwMzAzOSwibmJmIjoxNTc5ODk5NDM5LCJqdGkiOiI1ZHo4UHRvZktPaDlqT2F6Iiwic3ViIjo4LCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.UFwfblZ-ODHRXzPkt7AenXHp_Z5bVoUM_nXAt4HE5EU",
        "success": true
    }

```

### Вывод всех категорий
#### URL: http://127.0.0.1:8000/api/categories

```
    GET Request:
    Query Parameter
        ?page=0 // от 0 до ~
        ?size=10 // по дефолту можно не передавать, количество выводимых элементов
        
    RESPONSE:
    {
        "categories": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                },
                {
                    "id": 2,
                    "name": "asd",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 3,
                    "name": "TestCategory1",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                },
                {
                    "id": 4,
                    "name": "TestCategory2",
                    "created_at": null,
                    "updated_at": null,
                    "deleted_at": null
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/categories?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/categories?page=1",
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/categories",
            "per_page": 10,
            "prev_page_url": null,
            "to": 4,
            "total": 4
        },
        "success": true
    }

```

### Получение моих категорий (пагинировано)
#### URL: http://127.0.0.1:8000/api/user/categories
##### Токен передается через HEADER: Authorization => Bearer Token
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    GET Request
    Query Parameter
        ?page=0 // от 0 до ~
        ?size=10 // по дефолту можно не передавать, количество выводимых элементов

    RESPONSE
    
    {
        "user_categories": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/user/categories?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/user/categories?page=1",
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/user/categories",
            "per_page": 10,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        },
        "success": true
    }
```
### Добавление изменение моих категорий 
#### URL: http://127.0.0.1:8000/api/user/categories/add
##### Токен передается через HEADER: Authorization => Bearer Token
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    POST Request:
    {
    	"categories_ids": [2,3] // тут находятся только те которые будут у пользователя остальные другие которые были до этого удалятся 
    }	
    
    Response
    {
        "message": "Successful operation",
        "success": true
    }

```
### Вывод всех проектов по ID категории
#### URL: http://127.0.0.1:8000/api/projects?category_id=1

```
    GET Request:
    Query Parameter
        ?page=0 // от 0 до ~
        ?size=10 // по дефолту можно не передавать, количество выводимых элементов
        ?category_id = 1 //
        
        
    Response:
    
    {
        "$projects": {
            "current_page": 1,
            "data": [
                {
                    "id": 1,
                    "name": "test",
                    "description": "sadsadasdasdasdasdasd",
                    "price": 100,
                    "latitude": "123",
                    "longitude": "213",
                    "status": 2,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-06-18 17:01:45",
                    "created_at": null,
                    "updated_at": "2020-04-30 11:58:00",
                    "creator": {
                        "id": 1,
                        "firstname": "admin",
                        "email": "admin@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 13:44:37",
                        "updated_at": "2020-05-11 04:21:12",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": "IOS"
                    },
                    "implementer": {
                        "id": 1,
                        "firstname": "admin",
                        "email": "admin@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 13:44:37",
                        "updated_at": "2020-05-11 04:21:12",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": "IOS"
                    }
                },
                {
                    "id": 2,
                    "name": "New_Project",
                    "description": "New description",
                    "price": 200,
                    "latitude": "123123",
                    "longitude": "123",
                    "status": 0,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-04-20 17:01:31",
                    "created_at": "2020-04-30 07:18:00",
                    "updated_at": "2020-04-30 07:18:00",
                    "creator": {
                        "id": 2,
                        "firstname": "Dauren",
                        "email": "daur-lion@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 17:00:22",
                        "updated_at": "2020-04-30 13:12:57",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": null
                    },
                    "implementer": null
                },
                {
                    "id": 3,
                    "name": "New_Project123123",
                    "description": "New description",
                    "price": 200,
                    "latitude": "123123",
                    "longitude": "123",
                    "status": 0,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-04-20 17:01:31",
                    "created_at": "2020-04-30 12:01:05",
                    "updated_at": "2020-04-30 12:17:17",
                    "creator": {
                        "id": 1,
                        "firstname": "admin",
                        "email": "admin@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 13:44:37",
                        "updated_at": "2020-05-11 04:21:12",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": "IOS"
                    },
                    "implementer": {
                        "id": 2,
                        "firstname": "Dauren",
                        "email": "daur-lion@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 17:00:22",
                        "updated_at": "2020-04-30 13:12:57",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": null
                    }
                },
                {
                    "id": 4,
                    "name": "New_Project123123",
                    "description": "New description",
                    "price": 200,
                    "latitude": "123123",
                    "longitude": "123",
                    "status": 0,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-04-20 17:01:31",
                    "created_at": "2020-04-30 13:13:17",
                    "updated_at": "2020-04-30 13:17:26",
                    "creator": {
                        "id": 2,
                        "firstname": "Dauren",
                        "email": "daur-lion@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 17:00:22",
                        "updated_at": "2020-04-30 13:12:57",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": null
                    },
                    "implementer": {
                        "id": 1,
                        "firstname": "admin",
                        "email": "admin@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 13:44:37",
                        "updated_at": "2020-05-11 04:21:12",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": "IOS"
                    }
                },
                {
                    "id": 5,
                    "name": "New_Project123123",
                    "description": "New description",
                    "price": 2000,
                    "latitude": "123123",
                    "longitude": "123",
                    "status": 0,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-04-20 17:01:31",
                    "created_at": "2020-05-01 07:19:22",
                    "updated_at": "2020-05-01 07:19:22",
                    "creator": {
                        "id": 1,
                        "firstname": "admin",
                        "email": "admin@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 13:44:37",
                        "updated_at": "2020-05-11 04:21:12",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": "IOS"
                    },
                    "implementer": null
                },
                {
                    "id": 6,
                    "name": "New_Project123123",
                    "description": "New description",
                    "price": 2000,
                    "latitude": "123123",
                    "longitude": "123",
                    "status": 0,
                    "start": "2020-04-18 17:01:31",
                    "finish": "2020-04-20 17:01:31",
                    "created_at": "2020-05-02 13:59:10",
                    "updated_at": "2020-05-02 13:59:10",
                    "creator": {
                        "id": 2,
                        "firstname": "Dauren",
                        "email": "daur-lion@mail.ru",
                        "email_verified_at": null,
                        "created_at": "2020-04-18 17:00:22",
                        "updated_at": "2020-04-30 13:12:57",
                        "role_id": 1,
                        "city_id": 1,
                        "description": "",
                        "nickname": "",
                        "rating_score": 0,
                        "image_path": "",
                        "lastname": "",
                        "platform": null
                    },
                    "implementer": null
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/projects?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/projects?page=1",
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/projects",
            "per_page": 10,
            "prev_page_url": null,
            "to": 6,
            "total": 6
        },
        "success": true
    }
```

### Вывод всех маоих проектов  по  роли (создатель)
#### URL: http://127.0.0.1:8000/api/user/projects/creator
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    GET Request:
    Query Parameter
        ?page=0 // от 0 до ~
        ?size=10 // по дефолту можно не передавать, количество выводимых элементов
        ?type = creator || implementer // стринг
        
        
    Response:
    
{
    "$projects": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "test",
                "description": "sadsadasdasdasdasdasd",
                "price": 100,
                "latitude": "123",
                "longitude": "213",
                "status": 2,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-06-18 17:01:45",
                "created_at": null,
                "updated_at": "2020-04-30 11:58:00",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            },
            {
                "id": 3,
                "name": "New_Project123123",
                "description": "New description",
                "price": 200,
                "latitude": "123123",
                "longitude": "123",
                "status": 0,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-04-20 17:01:31",
                "created_at": "2020-04-30 12:01:05",
                "updated_at": "2020-04-30 12:17:17",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": {
                    "id": 2,
                    "firstname": "Dauren",
                    "email": "daur-lion@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 17:00:22",
                    "updated_at": "2020-04-30 13:12:57",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": null
                },
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            },
            {
                "id": 5,
                "name": "New_Project123123",
                "description": "New description",
                "price": 2000,
                "latitude": "123123",
                "longitude": "123",
                "status": 0,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-04-20 17:01:31",
                "created_at": "2020-05-01 07:19:22",
                "updated_at": "2020-05-01 07:19:22",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": null,
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/projects/creator?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/projects/creator?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/user/projects/creator",
        "per_page": 10,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    },
    "success": true
}
```

### Вывод всех маоих проектов  по  роли (исполнитель)
#### URL: http://127.0.0.1:8000/api/user/projects/implementer
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    GET Request:
    Query Parameter
        ?page=0 // от 0 до ~
        ?size=10 // по дефолту можно не передавать, количество выводимых элементов
        ?type = creator || implementer // стринг
        
        
    Response:
    
{
    "$projects": {
        "current_page": 1,
        "data": [
            {
                "id": 1,
                "name": "test",
                "description": "sadsadasdasdasdasdasd",
                "price": 100,
                "latitude": "123",
                "longitude": "213",
                "status": 2,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-06-18 17:01:45",
                "created_at": null,
                "updated_at": "2020-04-30 11:58:00",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            },
            {
                "id": 3,
                "name": "New_Project123123",
                "description": "New description",
                "price": 200,
                "latitude": "123123",
                "longitude": "123",
                "status": 0,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-04-20 17:01:31",
                "created_at": "2020-04-30 12:01:05",
                "updated_at": "2020-04-30 12:17:17",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": {
                    "id": 2,
                    "firstname": "Dauren",
                    "email": "daur-lion@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 17:00:22",
                    "updated_at": "2020-04-30 13:12:57",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": null
                },
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            },
            {
                "id": 5,
                "name": "New_Project123123",
                "description": "New description",
                "price": 2000,
                "latitude": "123123",
                "longitude": "123",
                "status": 0,
                "start": "2020-04-18 17:01:31",
                "finish": "2020-04-20 17:01:31",
                "created_at": "2020-05-01 07:19:22",
                "updated_at": "2020-05-01 07:19:22",
                "creator": {
                    "id": 1,
                    "firstname": "admin",
                    "email": "admin@mail.ru",
                    "email_verified_at": null,
                    "created_at": "2020-04-18 13:44:37",
                    "updated_at": "2020-05-11 04:21:12",
                    "role_id": 1,
                    "city_id": 1,
                    "description": "",
                    "nickname": "",
                    "rating_score": 0,
                    "image_path": "",
                    "lastname": "",
                    "platform": "IOS"
                },
                "implementer": null,
                "category": {
                    "id": 1,
                    "name": "Management",
                    "created_at": "2020-04-18 13:45:38",
                    "updated_at": "2020-04-18 13:45:38",
                    "deleted_at": null
                }
            }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/user/projects/creator?page=1",
        "from": 1,
        "last_page": 1,
        "last_page_url": "http://127.0.0.1:8000/api/user/projects/creator?page=1",
        "next_page_url": null,
        "path": "http://127.0.0.1:8000/api/user/projects/creator",
        "per_page": 10,
        "prev_page_url": null,
        "to": 3,
        "total": 3
    },
    "success": true
}
```
### Создание проекта
#### URL: http://127.0.0.1:8000/api/create/project
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    POST Request:
    {
    	"name":"New_Project123123",
    	"description":"New description",
    	"category_id":1,
    	"price":200,
    	"latitude":"123123",
    	"longitude":"123",
    	"start":"2020-04-18 17:01:31",
    	"finish":"2020-04-20 17:01:31"
    }
    
    Response
   {
       "message": "Проект успешно создан",
       "success": true
   }

```

### Оптравление запроса на выполнение проекта (как со стороны исполнителя так и со стороны создателя)
#### URL: http://127.0.0.1:8000/api/send/request
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    POST Request:
    //Если пользователь является заказчиком и выбрал пользователя которого он хотел бы занять работой данным проектом
   	{
        	"project_id":5,
        	"is_to_specific_user":true,
        	"implementer_id":4
        	
    }
    
    ||
    
    //Стандартная заявка на выполенние проекта если ты исполнитель
    {
    	"project_id":5,
    	"is_to_specific_user":false
    	
    }
    Response
   {
       "message": "Упешно отправлен",
       "success": true
   }

```
### Принятие или отклонение запроса на выполнение проекта
#### URL: http://127.0.0.1:8000/api/accept/request
````
    Authorization : Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwczpcL1wvdGVuc2VuZC5tZVwvYXBpXC92MVwvbG9naW4iLCJpYXQiOjE1Nzk2MjcxNjYsImV4cCI6MTU3OTYzMDc2NiwibmJmIjoxNTc5NjI3MTY2LCJqdGkiOiJPeUg5T3hZcVY2d0d6QllyIiwic3ViIjoxLCJwcnYiOiJlZTVhYzY5NDI5YzU1NmQ3NWRiZTdmZjRlNThiOTdjZDRmNzE0MmViIn0.Ykb0nBteVz3KBVmfxAcPHtgA9JPyfD3CArwSL4P3onA
````
```
    POST Request:
    {
    	"request_id":6,
    	"is_accepted": true||false
    }
    
    Response
   {
       "message": "Статус успешно изменен",
       "success": true
   }

```
### Получение пользователей по id категории
#### URL: http://127.0.0.1:8000/api/users/by/category/{category_id}
```
    GET Request
    GET Request:
        Query Parameter
            ?page=0 // от 0 до ~
            ?size=10 // по дефолту можно не передавать, количество выводимых элементов

    RESPONSE
    {
        "users": {
            "current_page": 1,
            "data": [
                {
                    "firstname": "Dauren",
                    "lastname": "",
                    "description": "Programmer",
                    "rating_score": 0,
                    "image_path": "images/user-default.png",
                    "city_id": 1
                }
            ],
            "first_page_url": "http://127.0.0.1:8000/api/users/by/category/2?page=1",
            "from": 1,
            "last_page": 1,
            "last_page_url": "http://127.0.0.1:8000/api/users/by/category/2?page=1",
            "next_page_url": null,
            "path": "http://127.0.0.1:8000/api/users/by/category/2",
            "per_page": 10,
            "prev_page_url": null,
            "to": 1,
            "total": 1
        },
        "success": true
    }
```
