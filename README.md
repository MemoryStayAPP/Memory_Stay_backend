# api docs


# --------------------------

## requierd header
### key: accept
### value: application/json

# --------------------------


## POST:
 > /auth/register
 </br>
 >> REQUIRED FIELDS:
 >>>name => required
 > <br/>
 >>>email => required | unique
 ><br/>
 >>> password => required
 
 >>RESPONSE:
 > <br/>
 >>> ON SUCCESS:
 ><br/> 
 > status => true
 > <br/>
 > message => User "Created Successfully"
 > <br/>
 > response code => 200
 > <br/>
 >>> ON ERROR:
 ><br/>
 >>> status => false
 > <br/>
 >>> message => generated error message 
 > <br/>
 >>> response code => 500

  
# /auth/login {}
 /auth/delete

 REQUIRE TOKEN:

  /markers/create
  /markers/delete
  /markers/select
## GET:
 /markers/get



