# Nest PHP API to control Hot Water (unofficial)

PHP API to control Hot Water for the Nest Thermostat (UK)

## How to Configure 

How to install and setup the Nest thermostat with Alexa to controll boost 

1. download all files 
	a. boost_hot_water.php     
	b. Cancel_hot_water.php
	c. nest_php_api.php 
	
2. inside files "a" & "b" fill in your account details and create your own private key 
3  inside file "a" set how long you wish to boost your water for. 
		if you ever need help there are "//text areas with areas you need to change" 

3. upload all 3 files into a webserver that can be accessed from the web as iftth will need this to send the comands to alexa 
4. create an accoutn with IFTTH if you have not done so already 
5. create an applet  
	a. your service will be Alexa 
	b. your trigger will be when you say a phrase 
	c. create your phrase mine is "boost" to turn the water on and "cancel boost" to turn it off 	
	d. select your action trigger for this you will select webhooks 
	e. enter the url of where you uploaded your file and include your key behind the url  to do this type ?key=then your key 
		eg. http://nestboost.com/nest/boost_hot_water.php?key=10i7P4D2dg
	f. the method must be "get"

6. save and create a second applet for cancelling the "boost"

once done go to your urls to see if they work

next you can add the IFTTH service to alexa  
and using the word "trigger" with your phrase you can now controll your Next Thermostat

## Usage

```php
// include the nest api library
include_once('./nest-php-api.php');

// create new nest object w/ login information
$nest = new Nest('john@doe.com', 'password');

// boost hot water for 30 minutes
$nest->setHotWaterBoost(30);

// boost hot water for X minutes
$nest->setHotWaterBoost(X);

// cancel the current boost
$nest->cancelHotWaterBoost();

// or you can also cancel by calling the following
$nest->setHotWaterBoost(0);

// when you either set or cancel the boost a json response will be returned
{"success":true,"code":200,"data":"Boom, hot water changed. Or you set it to the same as before."}

```