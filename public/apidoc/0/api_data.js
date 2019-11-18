define({
    "api": [
        {
            "type": "post",
            "url": "/api/user",
            "title": "Barcode verificate",
            "name": "Barcode_verificate",
            "group": "Barcode",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api token.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "barcode",
                            "description": "<p>Barcode.</p>"
                        }
                    ]
                }
            },
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "boolean",
                            "optional": false,
                            "field": "id",
                            "description": "<p>Product original true/false.</p>"
                        }
                    ]
                },
                "examples": [
                    {
                        "title": "Success-Response:",
                        "content": "HTTP/1.1 200 OK\n {\n   \"original\": 1\n }",
                        "type": "json"
                    }
                ]
            },
            "version": "0.0.0",
            "filename": "api-dacha/barcode.php",
            "groupTitle": "Barcode"
        },
        {
            "type": "get",
            "url": "/user",
            "title": "Get Users List",
            "name": "Get_Users_list",
            "group": "User",
            "success": {
                "fields": {
                    "Success 200": [
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "id",
                            "description": "<p>User id.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>User name.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>User email.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>User email verified.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>User account created date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>User account update date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api token.</p>"
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
            "filename": "api-dacha/user.php",
            "groupTitle": "User"
        },
        {
            "type": "post",
            "url": "/api/register",
            "title": "User register",
            "name": "Register_user",
            "group": "User",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "name",
                            "description": "<p>User name.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "email",
                            "description": "<p>User email.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password",
                            "description": "<p>User password.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password_confirmation",
                            "description": "<p>User password confirmation.</p>"
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
                            "field": "id",
                            "description": "<p>User id.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>User name.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>User email.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>User email verified.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>User account created date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>User account update date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api token.</p>"
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
            "filename": "api-dacha/user.php",
            "groupTitle": "User"
        },
        {
            "type": "post",
            "url": "/api/login",
            "title": "User login",
            "name": "User_login",
            "group": "User",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "email",
                            "description": "<p>User email.</p>"
                        },
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "password",
                            "description": "<p>User password.</p>"
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
                            "field": "id",
                            "description": "<p>User id.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "name",
                            "description": "<p>User name.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email",
                            "description": "<p>User email.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "email_verified_at",
                            "description": "<p>User email verified.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "created_at",
                            "description": "<p>User account created date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "updated_at",
                            "description": "<p>User account update date.</p>"
                        },
                        {
                            "group": "Success 200",
                            "type": "string",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api token.</p>"
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
            "filename": "api-dacha/user.php",
            "groupTitle": "User"
        },
        {
            "type": "post",
            "url": "/api/logout",
            "title": "User logout",
            "name": "User_logout",
            "group": "User",
            "parameter": {
                "fields": {
                    "Parameter": [
                        {
                            "group": "Parameter",
                            "type": "String",
                            "optional": false,
                            "field": "api_token",
                            "description": "<p>Api token.</p>"
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
                            "description": "<p>User logged out.</p>"
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
            "filename": "api-dacha/user.php",
            "groupTitle": "User"
        }
    ]
});
