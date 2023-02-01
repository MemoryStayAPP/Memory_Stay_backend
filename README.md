
# Api Documentation

# api docs


# --------------------------

## requierd header
### key: accept
### value: application/json

# --------------------------


# POST:

## /auth/register

user register

REQUIRED FIELDS:

    name = required
  
    email = required | unique
 
    password = required

RESPONSE:

    ON SUCCESS:
  
        status = true
  
        message = "User Created Successfully"
  
        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code = 500


## /auth/login

    user login

REQUIRED FIELDS:

    email = required
 
    password = required

RESPONSE:

    ON SUCCESS:
  
        status = true
  
        message = "User Logged In Successfully"

        token = generated token
  
        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code {
            460 => "Email & Password does not match with our record."
            461 => "validation error"
            500 => unknown error
        } 

## /auth/delete

    delete user

REQUIRED FIELDS:

    id => required

RESPONSE:

    ON SUCCESS:
  
        status = true
  
        message = 'User of id {id} deleted successfully"
  
        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code {
            461 => "validation error"
            500 => unknown error
        } 

# REQUIRE TOKEN:

## /markers/create

    create marker

REQUIRED FIELDS:

    name => required
    description => required
    lng => required
    lat => required
    author => required

RESPONSE:

    ON SUCCESS:
  
        status = true
  
        message = "Marker of id {id} created"

        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code {
            461 => "validation error"
            500 => unknown error
        } 



## /markers/delete

    delete marker of id

REQUIRED FIELDS:

    id => required

RESPONSE:

    ON SUCCESS:
  
        status = true
  
        message = "Marker of id {id} deleted successfully"

        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code {
            461 => "validation error"
            500 => unknown error
        } 

## /markers/select

    selects one marker of id

    REQUIRED FIELDS:
  
    id => required

RESPONSE:

    ON SUCCESS:
  
        status = true

        Marker elements:
            name
            description
            author
            created_at
            lng
            lat
        
        errors => errors from validation
        response code = 200
  
    ON ERROR:
 
        status = false

        message = generated error message

        response code {
            461 => "validation error"
            500 => unknown error
        } 
## GET:
/markers/get

    Returns all markers



