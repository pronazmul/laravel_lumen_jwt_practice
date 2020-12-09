<p align="center"><a href="#" ><img src="https://i.ibb.co/KbzvJj4/1-MAnu-Uwghp-P3-X0zoy67-P4m-A.png" width="600"></a></p>  
 <h1 align="center">Laravel | Lumen Rest Api</h1> 

>## Definition: 

* REST: Representational Source Transfer.
* API: Application Programming interface.
* WHY: To use single database in various platforms IOT (internet of things) Devices. Transfer or use data from one software to another software. 

<p align="center"><a href="#" ><img src="https://i.ibb.co/xqgDfFX/A75-F0359-2-BED-4-B42-A562-12-E5-D044-DF2-F.png" width="500"></a></p> 

>## Properties: 
* Client-server: Works Between Client & SERVER.
* Stateless / Rest: Never Store any Data inside API Script.
* Cacheable: Device Can Store Cache but API not.
* Uniform interface: Various methods can operate from a single URL/Route. 

>## Tools for Start Working: 
* 	xampp: For Apache & MySQL Support;
* 	composer: Php Package Manager;
* 	Sequence: First XAMPP then composer, composer depends on XAMPP php.
* 	Postman: For Working with various request method, browser only works with get() method.

>## Installation Command: 
* 	install_command: composer create-project --prefer-dist laravel/lumen blog
* 	Development server: php -S localhost:8000 -t public  

### Laravel Lumen Generator: 
* Install: composer require flipbox/lumen-generator
* Why: To Create Model, Migration, Controller using Command Line. 
* Configure Lumen Generator Class: Add in Bootstrap/app.php file:
	- Source: https://github.com/flipboxstudio/lumen-generator
```php
$app->register(Flipbox\LumenGenerator\LumenGeneratorServiceProvider::class);
```

>## METHOD OF REST API

Request Method| Action
------------ | -------------
$route->get($uri, $callback) | To view Data
$route->post($uri, $callback) | To insert Data
$route->put($uri, $callback) | To update Data

>## Route Parameters (Required & Optional): 
### 	Required:
```php
		$router->get('/{name}/{age}', function($name,$age){
		return " My Name is $name & Age is $age";
		});
		
		//Here Both Params Are Required, If Router can't get one will generate Error.
```
###	Optional: 
```php
		$router->get('/name[/{name}]',function($name=null){
		return " My Name is $name";
		});
				
		//Here Parameter is Optional, If Router can't get use default value Null.
```
>## Setup Controller Before Use: 
* Create A New Controller.
* Extends chield to Parent.
* Set Namespace.
* Use User.php from Models.

```php 
	<?php

	namespace App\Http\Controllers;
	use App\Models\User;

	class RestController extends Controller
	{
	    //Write Your Logics Here
	}
```

>## Pass Parameter From Route To Controller: 
### Create Router & Sent Value to Controller:
```php
$router->get('/{name}','demoController@method');
```
### Receive & Use Parameter Data to Conttoller:
```php 
	<?php

	namespace App\Http\Controllers;
	use App\Models\User;

	class demoController extends Controller
	{
	    public function method($name){
	    	return "My Name is $name";
	    }
	}
```

>## Response Area: 
* Header: Confidential Data pass and receive.
* Param: Single data pass & receive.
* Body: Average Data pass and receive.

>## Data Response Type: 
* Header: Only Can Receive Key Value Pair Value, Can not receive Json Object and Other Complex Data.
* Body: Can Receive Json Object, Json Array & any Other types of response.

>## Response Type: 
* 	Simple String Response.
* 	JSON Response. *
* 	XML Response.
* 	Download. *
* 	Redirect. *

### Simple String Response In Body:
```php
 		public function ApiCheck(){
		return response("Pro Nazmul")
		}
		// It's Good Practice to sent response in body using response() method.
```

### Simple String Response In Header (key & Valude):
```php
 		public function ApiCheck(){
		return response('')->header("Name", "Programmer Nazmul Huda");
		}
		// Use Key Value Pair in header() method.
```

### JSON Response In Body: 
```php
	    public function getRouterData(){
		$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
		return response->json($age);
	    }
	   // If pass Associative Array As Json Response then you will get Json Array Or pass index array, Multidimentional Array get json array. 
	   // Database Data Always Return as Associative Array.
```

### Redirect Response Example: 
* Router Setup:
```php
	$router-> get('/a','ApiController@A');
	$router-> get('/b','ApiController@B');
```
* Method Setup: 
```sh
		public function A(){
			return redirect('/b');
			}
	
		public function B(){
			return "I am From Route B";
			}
			
		//When User Hit Route a Method A redirect to route b
``` 
### Redirect Response Example: 
* Firstly Store a File in public Folder.
* Router Setup:
```php
	$router-> get('/download','ApiController@Download');
```
```php
		public function Download(){
			$path = 'coder.png';
			return response()->download($path);
			}
```

>## DATA SENDING & CATCHING: 
* Process: Parameter(visible), Header(hide), Body_Json.
<p align="center"><a href="#" ><img src="https://i.ibb.co/VBGLFB5/28-E45-E34-69-FD-4-D58-A223-4-E9762633-FDD.png" width="600"></a></p> 

### Data Catching Requirments: 
* Use Rquest Class: use Illuminate\Http\Request
* Catch Body & Params Data using Request Object.
* Catch Header Data Using Request Object ->header() method.
* Practice Data Sending & Catching by Postman. 


### Catch Only Body & Parameter Data:
```php	
<?php

	namespace App\Http\Controllers;
	use Illuminate\Http\Request

	class requestController extends Controller
	{
		public function Catch(Request $req){
			return $req;
			}
	}
```
### Catch Only Header Data:
```php
<?php

	namespace App\Http\Controllers;
	use Illuminate\Http\Request

	class requestController extends Controller
	{
		public function Catch(Request $req){
			return $req->header('name');
		}
		//Specify key to get the Specific key Value.
	}

```



>## Database Crud Operation: 
* Requirement
	- Create Database & Connected to Laravel .env .
	- Create Model & Connect with Database Table.
	- Use Postman to check Api Request & Response.
	- Create Controller use Model for DB Operation & use Request Class to handle Request/Response. 
	- Comment Out: Bootstrap > app "$app->withEloquent()" //To use Models inside Eloquent.
	
### Router Method Setup	Example
```php
<?php
	/** @var \Laravel\Lumen\Routing\Router $router */

	$router->get('/crud','crudController@Select');
	$router->post('/crud','crudController@Insert');
	$router->put('/crud','crudController@Update');
	$router->delete('/crud','crudController@Delete');
```
	


### Controller Crud Operation Example
```php
<?php

	namespace App\Http\Controllers;
	use Illuminate\Http\Request;
	use App\Models\userModel;

	class crudController extends Controller
	{
	    public function Select(){
		    $result = userModel::get();
		    return $result;
	    }

	    public function Insert(Request $request){
		    $name = $request->input('name');
		    $email = $request->input('email');
		    $mobile = $request->input('mobile');    
		    $result = userModel::insert(["name"=>$name, "email"=> $email, "mobile"=>$mobile]);
		    
		    if($result){return "Data Inserted Successfully";}
		    else{return "Data Failed To Insert";}
	    }


	    public function Delete(Request $request){
		    $id = $request->input('id');
		    $result = userModel::where('id',$id) -> delete();
		    
		    if($result){return "Data Deleted Successfully";}
		    else{return "Data Failed To Delete";}
	    }

	    public function Update(Request $request){     
		    $id = $request->input('id');
		    $name = $request->input('name');
		    $result= userModel::where('id',$id) -> update(['name' => $name]);
		    
		    if($result){return "Data Updated Successfully";}
		    else{return "Data Failed To Update";}
	    }
}
```
>## Authentication Steps: 

*	Client Server: Sent Request To authentication Server For Access Token.
*	Auth Server: Check Access Token Validity & Response to Client's Request.
*	Client Server: Sent Request To resource Server with Access token.
*	Resource Server: Validate access token to Auth server & Finally Response Client's Request.

<p align="center"><a href="#" ><img src="https://i.ibb.co/F7DsxL7/OAuth-Roles.jpg" width="500"></a></p> 


>## Lumen Basic Authentication Steps: 

*	Uncheck Comment: "Authenticate middleware" &  "AuthServiceProvider" From Bootstrap-> App.php
*	Authentication Overview:
	- AuthServiceProvider method boot (): Access token will go inside boot method then method will check that key, if authorized or not value will transfer to middleware/ Authenticate.php
	- Authenticate method handle () : This method will receive boot() Logic value & declare if the authentication is success allow to go next step or not.

### Setup Logic in Auth Service Provider boot():
```php
public function boot()
    {
        $this->app['auth']->viaRequest('api', function ($request) {

            if ($request->header('api_token') == "123"){
                return new User();
            }
        });
    }
```

### Allow or Disallow user depending authServiceProvider Logic: 
```php
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
```
### Authenticate Route Example: 
```php
	Basic Route Example: $router->get('/auth', 'authController@authMethod');
	Authenticate Route Example: $router->get('/auth',['middleware'=>'auth','uses'=>'authController@authMethod']);
```

>## JWT Authentication: 

*	JWT: JSON WEB TOKEN.
*	Why: JWT is a standard process to transfer json data or secure Json Object transmitting system. Encrypt & decrypt json object for security purpose is the main goal of JWT.
*	Key: Encrypt & decrypt signed with public/private a key.

<p align="center"><a href="#" ><img src="https://i.ibb.co/VwSZw8S/0512-FC6-B-716-A-4205-BD87-CD75486-EA702.png" width="600"></a></p>  

*	Uses: 
	-	Authentication Purpose.
	-	Secure Data Transfer. 

>## JWT Structure 3 part: 

*	Header: 
	-	Algorithm.
	-	Type. 
*	Payload (Main Data): 
	-	Subject.
	-	Name. 
	-	May be a lot of Properties.
*	Signature: 
	-	Encryption type or Encoding type.
*	Token: 
	-	Finally Created a token with a key.
	-	Must have to use that key to decode.

>## JWT Resource: 

*	ENV (Environmental variable): 
	-	SET.env: KEY=value
	-	USE.env: env(‘key’)
	-	Why: Set important constant in.env
	-	Set JWT token key inside.env
*	Website: 
	-	Website: JWT.io
	-	Version: created by firebase company
	-	Command: composer require firebase/php-jwt
	-	Why: To use JWT Build in functions. 
	-	 "iss" (Issuer)
	-	 "sub" (Subject)
	-	 "aud" (Audience)
	-	 "exp" (Expiration Time)
	-	 "nbf" (Not Before)
	-	 "iat" (Issued At)
	-	 "jti" (JWT ID)
>##	Basic Syntax: 
```sh
use \Firebase\JWT\JWT;
$key = "example_key";
$payload = [
    	"iss" => "https://developer.com",
    	"sub" => "login Information",
    	"iat" => time();
"exp" => time()+3600;

$jwt = JWT::encode($payload, $key);
$decoded = JWT::decode($jwt, $key, array('HS256'));
``` 
>## API Documentation: 
Why: API documentation improves the developer experience by letting people integrate as quickly as possible with your API and increase user awareness.

### What to Describe: 
* API Version, Name, Description. 
* API End Point/ Methods.
* Request Parameter/ Header/ Body.
* Respons Type.
* Data Model.

### Api Documentation UI Library:
* Redoc | Swagger. 

