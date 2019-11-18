define({
    "api": [
        {
            "type": "post",
            "url": "/api/barcode/create",
            "title": "Генерация штрих-кода",
            "name": "BarcodeCreate",
            "group": "Barcode",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "number",
                            "optional": false,
                            "field": "product_id",
                            "description": "<p>Идентификатор продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "number",
                            "optional": false,
                            "field": "barcode_count",
                            "description": "<p>Количество штрих-кодов.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "product_id",
                            "description": "<p>Идентификатор продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n  \"barcode\":1048219148,\n  \"product_id\":1627228872,\n  \"updated_at\":\"2019-09-23 06:30:53\",\n  \"created_at\":\"2019-09-23 06:30:53\",\n  \"id\":2\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/barcode.php",
            "groupTitle": "Barcode"
        },
        {
            "type": "delete",
            "url": "/api/barcode/delete",
            "title": "Удаление штрих-кода",
            "name": "BarcodeDelete",
            "group": "Barcode",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "data",
                            "description": "<p>Сообщение об удалении штрих-кода.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n  \"data\":\"Barcode deteted\",\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/barcode.php",
            "groupTitle": "Barcode"
        },
        {
            "type": "post",
            "url": "/api/barcode/search",
            "title": "Поиск штрих-кода",
            "name": "BarcodeSearch",
            "group": "Barcode",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "product_id",
                            "description": "<p>Идентификатор продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n  \"barcode\":1048219148,\n  \"product_id\":1627228872,\n  \"updated_at\":\"2019-09-23 06:30:53\",\n  \"created_at\":\"2019-09-23 06:30:53\",\n  \"id\":2\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/barcode.php",
            "groupTitle": "Barcode"
        },
        {
            "type": "post",
            "url": "/api/barcode/update",
            "title": "Обновление штрих-кода",
            "name": "BarcodeUpdate",
            "group": "Barcode",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "number",
                            "optional": false,
                            "field": "product_id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Штрих-код.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "product_id",
                            "description": "<p>Идентификатор продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n  \"barcode\":1048219148,\n  \"product_id\":1627228872,\n  \"updated_at\":\"2019-09-23 06:30:53\",\n  \"created_at\":\"2019-09-23 06:30:53\",\n  \"id\":2\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/barcode.php",
            "groupTitle": "Barcode"
        },
        {
            "type": "post",
            "url": "/api/products/create",
            "title": "Добавление продукта",
            "name": "ProductsCreate",
            "group": "Products",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "\nHTTP/1.1 200 OK\n{\n    \"product_code\": \"19100\",\n    \"product_name\": \"Продукт\",\n    \"product_photo\": \"products-img/img4.jpg\",\n    \"product_rating\": \"1\",\n    \"updated_at\": \"2019-10-07 16:40:41\",\n    \"created_at\": \"2019-10-07 16:40:41\",\n    \"id\": 13\n}",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/products.php",
            "groupTitle": "Products"
        },
        {
            "type": "delete",
            "url": "/api/products/delete/:id",
            "title": "Удаление продукта",
            "name": "ProductsDelete",
            "group": "Products",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "string",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "data",
                            "description": "<p>Сообщение об удалении продукта.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n  \"data\":\"Product deteted\",\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/products.php",
            "groupTitle": "Products"
        },
        {
            "type": "get",
            "url": "/api/products/list",
            "title": "Список продуктов",
            "name": "ProductsList",
            "group": "Products",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n{\n    \"product_code\": \"19100\",\n    \"product_name\": \"Продукт\",\n    \"product_photo\": \"products-img/img4.jpg\",\n    \"product_rating\": \"1\",\n    \"updated_at\": \"2019-10-07 16:40:41\",\n    \"created_at\": \"2019-10-07 16:40:41\",\n    \"id\": 13\n},\n{\n    \"product_code\": \"19100\",\n    \"product_name\": \"Продукт\",\n    \"product_photo\": \"products-img/img3.jpg\",\n    \"product_rating\": \"1\",\n    \"updated_at\": \"2019-10-07 16:40:41\",\n    \"created_at\": \"2019-10-07 16:40:41\",\n    \"id\": 12\n}",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/products.php",
            "groupTitle": "Products"
        },
        {
            "type": "post",
            "url": "/api/products/show/:id",
            "title": "Показать продукт",
            "name": "ProductsShow",
            "group": "Products",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n{\n    \"product_code\": \"19100\",\n    \"product_name\": \"Продукт\",\n    \"product_photo\": \"products-img/img4.jpg\",\n    \"product_rating\": \"1\",\n    \"updated_at\": \"2019-10-07 16:40:41\",\n    \"created_at\": \"2019-10-07 16:40:41\",\n    \"id\": 13\n}",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/products.php",
            "groupTitle": "Products"
        },
        {
            "type": "post",
            "url": "/api/products/update/:id",
            "title": "Обновление продукта",
            "name": "ProductsUpdate",
            "group": "Products",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_code",
                            "description": "<p>Код продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_name",
                            "description": "<p>Наименование продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_photo",
                            "description": "<p>Фото продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "product_rating",
                            "description": "<p>Рэйтинг продукта.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время изменения.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор продукта.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "\nHTTP/1.1 200 OK\n{\n    \"product_code\": \"19100\",\n    \"product_name\": \"Продукт\",\n    \"product_photo\": \"products-img/img4.jpg\",\n    \"product_rating\": \"1\",\n    \"updated_at\": \"2019-10-07 16:40:41\",\n    \"created_at\": \"2019-10-07 16:40:41\",\n    \"id\": 13\n}",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/products.php",
            "groupTitle": "Products"
        },
        {
            "type": "post",
            "url": "/api/users/create",
            "title": "Регистрация пользователя",
            "name": "UsersCreate",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password",
                            "description": "<p>Пароль.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password_confirmation",
                            "description": "<p>Подтверждение пользователя.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>Email пользователя подтвержден.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время обновления аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n[\n {\n   \"id\": 1,\n   \"name\": \"MyName\",\n   \"email\": \"name@mail.com\",\n   \"email_verified_at\": \"null\",\n   \"created_at\": \"2019-09-20 14:09:02\",\n   \"updated_at\": \"2019-09-20 14:09:02\",\n   \"api_token\":\"uAvOQsQuq1hNXmPMRN3YSo0LGeu9yrFoB8SzxhfLpBcA9TRx5lq9yyeNulcJ\"\n }\n]",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "delete",
            "url": "/api/users/delete",
            "title": "Удаление пользователя",
            "name": "UsersDelete",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "string",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Идентификатор пользователя.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "data",
                            "description": "<p>Сообщение об удалении пользователя.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n   \"data\": \"User deleted.\"\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "get",
            "url": "/api/users/list",
            "title": "Список пользователей",
            "name": "UsersList",
            "group": "Users",
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>Email пользователя подтвержден.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время обновления аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n[\n {\n   \"id\": 1,\n   \"name\": \"MyName\",\n   \"email\": \"name@mail.com\",\n   \"email_verified_at\": \"null\",\n   \"created_at\": \"2019-09-20 14:09:02\",\n   \"updated_at\": \"2019-09-20 14:09:02\",\n   \"api_token\": \"uAvOQsQuq1hNXmPMRN3YSo0LGeu9yrFoB8SzxhfLpBcA9TRx5lq9yyeNulcJ\"\n }\n]",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "post",
            "url": "/api/users/login",
            "title": "Авторизация пользователя",
            "name": "UsersLogin",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password",
                            "description": "<p>Пароль.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>Email пользователя подтвержден.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время обновления аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n   \"id\": 1,\n   \"name\": \"MyName\",\n   \"email\": \"name@mail.com\",\n   \"email_verified_at\": \"null\",\n   \"created_at\": \"2019-09-20 14:09:02\",\n   \"updated_at\": \"2019-09-20 14:09:02\",\n   \"api_token\": \"uAvOQsQuq1hNXmPMRN3YSo0LGeu9yrFoB8SzxhfLpBcA9TRx5lq9yyeNulcJ\"\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "post",
            "url": "/api/users/logout",
            "title": "Выход пользователя",
            "name": "UsersLogout",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "data",
                            "description": "<p>Сообщение о выходе пользователя.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n   \"data\": \"User logged out.\"\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "post",
            "url": "/api/users/search",
            "title": "Поиск пользователя",
            "name": "UsersSearch",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": true,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": true,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>Email пользователя подтвержден.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время обновления аккаунта пользователя.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n[\n {\n   \"id\": 1,\n   \"name\": \"MyName\",\n   \"email\": \"name@mail.com\",\n   \"email_verified_at\": \"null\",\n   \"created_at\": \"2019-09-20 14:09:02\",\n   \"updated_at\": \"2019-09-20 14:09:02\",\n }\n]",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        },
        {
            "type": "post",
            "url": "/api/users/update",
            "title": "Обновление данных пользователя",
            "name": "UsersUpdate",
            "group": "Users",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "string",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password",
                            "description": "<p>Пароль.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password_confirmation",
                            "description": "<p>Подтверждение пароля.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "number",
                            "optional": false,
                            "field": "id",
                            "description": "<p>ID пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>Имя пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>Email пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>Email пользователя подтвержден.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>Дата/время создания аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>Дата/время обновления аккаунта пользователя.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api токен доступа.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n   \"id\": 1,\n   \"name\": \"MyName\",\n   \"email\": \"name@mail.com\",\n   \"email_verified_at\": \"null\",\n   \"created_at\": \"2019-09-20 14:09:02\",\n   \"updated_at\": \"2019-09-20 14:09:02\",\n   \"api_token\": \"uAvOQsQuq1hNXmPMRN3YSo0LGeu9yrFoB8SzxhfLpBcA9TRx5lq9yyeNulcJ\"\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha-1/user.php",
            "groupTitle": "Users"
        }
    ]
});
