## Laravel Google Custom Search Engine
Laravel package to get Google Custom Search results from Google Custom Search Engine API for both free and paid version.

##### Brief history
As Swiftype closed free plans, I started to find some alternative without too much coding, but was unsucessfull.
The best I found was [Spatie's Google Search package](https://github.com/spatie/googlesearch) for Google CSE paid version, so I made
some research and develop package similar way, but independent to Google CSE version. 

## Installation
1/ Install with Composer

```bash
composer require jdrda/laravel-google-custom-search-engine
```

2/ Add the service provider to config/app.php

```php
'providers' => [
    '...',
    'JanDrda\LaravelGoogleCustomeSearchEngine\LaravelGoogleCustomeSearchEngineProvider'
];
```
3/ Add alias for Facade to config/app.php
```php
'aliases' => [
	...
	'GoogleCseSearch' => 'JanDrda\LaravelGoogleCustomeSearchEngine\Facades\LaravelGoogleCustomeSearchEngineProvider',
	...
]
```

4/ Publish the config file
```bash
php artisan vendor:publish --provider="JDrda\LaravelGoogleCustomeSearchEngine\LaravelGoogleCustomeSearchEngineProvider"
```

## Configuration

### Creating your custom search engine
1. If you create your engine at https://cse.google.com/cse/ you will find the ID after you click at Settings
2. Just check the URL you have like https://cse.google.com/cse/setup/basic?cx=search_engine_id and the string after cx= is your search engine ID
     
!! Attention !! If you change style of your Custom search engine, the ID can be changed

### Get your API key
1. go to https://console.developers.google.com, than
2. click on the menu on the right side of the GoogleAPI logo and click on 'Create project'
3. enter the name of the new project - it is up to you, you can use 'Google CSE'
4. wait until project is created - the indicator is color circle on the top right corner around the bell icon
5. API list is shown - search for 'Google Custom Search API' and click on it
6. click on 'Enable' icone on the right side of Custom Search API headline
7. click on the 'Credentials' on the left menu under the 'Library' section
8. click on the 'Create credentials' and choose 'API key'
9. your API key is shown, so copy and paste it here

### Save the configuration values
Save search engine ID and api ID in your config/laravelGoogleCustomSearchEngine

## Usage

### Simple usage
Create an object and call the function getResults to get first 10 results
```php
$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
$results = $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase' 
```

You can also get information about the search like total records and search time
```php
$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
$results = $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase' 
$info = $fulltext->getSearchInformation(); // get search information
```

### Advanced usage
You can use any parameter supported at Google. List of parameters is here:
https://developers.google.com/custom-search/json-api/v1/reference/cse/list#parameters

E.g. you want to get next 10 results
```php
$parameters = array(
    'start' => 10 // start from the 10th results,
    'num' => 10 // number of results to get, 10 is maximum and also default value
)

$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
$results = $fulltext->getResults('some phrase', $parameters); // get second 10 results for query 'some phrase'
```

You can also get the raw result from Google including other information
Full list of response variables is available here:
https://developers.google.com/custom-search/json-api/v1/reference/cse/list#response
```php
$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
$results = $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase'
$rawResults = $fulltext->getRawResults(); // get complete response from Google
```

For getting the number of results only use
```php
$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize
$results =  $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase'
$noOfResults = $fulltext->getTotalNumberOfResults(); // get total number of results (it can be less than 10)
```

If you have more engines / more api keys, you can override the config variables with following functions

```php
$fulltext = new LaravelGoogleCustomSearchEngine(); // initialize

$fulltext->setEngineId('someEngineId'); // sets the engine ID
$fulltext->setApiKey($apiKey); // sets the API key

$results =  $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase'
```

## Documentation
Essetial documentation will be at [Github Wiki](https://github.com/jdrda/laravelgooglecsesearch/wiki)
Now is under the development.

### License
This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) 

## About
I am independent senior software consultant living in the Czech republic in IT business from 1997.