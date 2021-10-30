# Turbin Web Backend

# API Spesification

## Register

-   Request
-   Method : POST
-   Endpoint: '/api/admin/register'
-   Header:
    -   Accept: application/json

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
    -   Bearer: token

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
-   Method : POST
-   Endpoint: '/api/admin/update'
-   Header:
    -   Accept: application/json
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
            "pesan": "Logout Failed"
        }
        ```
