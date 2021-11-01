# Turbin Web Backend

# API Spesification

## Register

-   Request
-   Method : POST
-   Endpoint: '/api/admin/register'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json

```json
{
    "name": "your name",
    "email": "your email",
    "password": "your password"
}
```

-   Response

    -   Success

        ```json
        {
            "code" : 201,
            "pesan": "Register Success",
            "access_token": "your uniquie token",
            "user" : [
                "id" : "user id",
                "name": "user name",
                "email": "user email",
                "address": "user address",
                "phone": "user phone number",
                "photo": "user photo",
                "created_at": "date created at",
                "updated_at": "date updated at",

            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Register Failed"
        }
        ```

## Login

-   Request
-   Method : POST
-   Endpoint: '/api/admin/login'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json

```json
{
    "email": "your email",
    "password": "your password"
}
```

-   Response

    -   Success

        ```json
        {
            "code" : 200,
            "pesan": "Login Success",
            "access_token": "your uniquie token",
            "user" : [
                "id" : "user id",
                "name": "user name",
                "email": "user email",
                "address": "user address",
                "phone": "user phone number",
                "photo": "user photo",
                "created_at": "date created at",
                "updated_at": "date updated at",

            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Login Failed"
        }
        ```

## Logout

-   Request
-   Method : POST
-   Endpoint: '/api/admin/logout'
-   Header:

    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

        ```json
        {
            "id": "user id"
        }
        ```

-   Response
    -   Success
        ```json
        {
            "code": 200,
            "pesan": "Logout Success"
        }
        ```
    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Logout Failed"
        }
        ```

## Update Profile

-   Request
-   Method : PUT
-   Endpoint: '/api/admin/update'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

```json
{
    "name": "user name",
    "address": "user address",
    "phone": "user phone number"
}
```

-   Response

    -   Success

        ```json
        {
           "code" : 200,
           "pesan": "Update Success",
           "user" : [
               "id" : "user id",
               "name": "user name",
               "email": "user email",
               "address": "user address",
               "phone": "user phone number",
               "photo": "user photo",
               "created_at": "date created at",
               "updated_at": "date updated at",

           ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Update Failed"
        }
        ```

## Update Photo

-   Request
-   Method : PUT
-   Endpoint: '/api/admin/photo'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

```json
{
    "photo": "url photo"
}
```

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Update photo Success",
            "photoUrl": "photo url"
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Update Photo Failed"
        }
        ```

## Get Photo

-   Request
-   Method : GET
-   Endpoint: '/api/admin/photo'
-   Header:

    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Get photo Success",
            "photoUrl": "photo url"
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Get Photo Failed"
        }
        ```

## Insert Article

-   Request
-   Method : POST
-   Endpoint: '/api/admin/article'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

```json
{
    "title": "title article",
    "description": "article description",
    "image": "article image"
}
```

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Get article Success",
            "data": [
                "id": 1,
                "title": "article title",
                "description": "article description",
                "image": "url article image",
                "created_at": "date created at",
                "updated_at": "date updated at"
            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Insert Article Failed"
        }
        ```

## Update Article

-   Request
-   Method : PUT
-   Endpoint: '/api/admin/article'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

```json
{
    "id": "article id",
    "title": "title article",
    "description": "article description",
    "image": "article image"
}
```

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Update Article Success",
            "data": [
                "id": 1,
                "title": "article title",
                "description": "article description",
                "image": "url article image",
                "created_at": "date created at",
                "updated_at": "date updated at"
            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Update Article Failed"
        }
        ```

## Delete Article

-   Request
-   Method : DELETE
-   Endpoint: '/api/admin/article'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json
    -   Bearer: token

```json
{
    "id": "article id"
}
```

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Delete Article Success"
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Delete Article Failed"
        }
        ```

## Get Article By Id

-   Request
-   Method : GET
-   Endpoint: '/api/article/{id}'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json

```json
{
    "id": "article id"
}
```

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Get Article Success",
            "data": [
                "id": 1,
                "title": "article title",
                "description": "article description",
                "image": "url article image",
                "created_at": "date created at",
                "updated_at": "date updated at"
            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Get Article Failed"
        }
        ```

## Get Articles

-   Request
-   Method : GET
-   Endpoint: '/api/articles'
-   Header:
    -   Accept: application/json
    -   Content-Type: application/json

-   Response

    -   Success

        ```json
        {
            "code": 200,
            "pesan": "Get Articles Success",
            "data": [
                {
                    "id": 1,
                    "title": "article title",
                    "description": "article description",
                    "image": "url article image",
                    "created_at": "date created at",
                    "updated_at": "date updated at"
                },
                {
                    "id": 2,
                    "title": "article title",
                    "description": "article description",
                    "image": "url article image",
                    "created_at": "date created at",
                    "updated_at": "date updated at"
                }
            ]
        }
        ```

    -   Failed
        ```json
        {
            "code": 400,
            "pesan": "Get Articles Failed"
        }
        ```
