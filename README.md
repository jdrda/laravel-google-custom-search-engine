[![SensioLabsInsight](https://insight.sensiolabs.com/projects/971d87c0-18b1-4c32-9cf1-4763345b8e70/mini.png)](https://insight.sensiolabs.com/projects/971d87c0-18b1-4c32-9cf1-4763345b8e70)
[![GitHub version](https://badge.fury.io/gh/jdrda%2Flaravel-google-custom-search-engine.svg)](https://badge.fury.io/gh/jdrda%2Flaravel-google-custom-search-engine)
[![CII Best Practices](https://bestpractices.coreinfrastructure.org/projects/546/badge)](https://bestpractices.coreinfrastructure.org/projects/546)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/jdrda/laravel-google-custom-search-engine/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/jdrda/laravel-google-custom-search-engine/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/jdrda/laravel-google-custom-search-engine/badges/build.png?b=master)](https://scrutinizer-ci.com/g/jdrda/laravel-google-custom-search-engine/build-status/master)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/4438fdee3b8b45b2b47ca38b29774fdc)](https://www.codacy.com/app/yan_2/laravel-google-custom-search-engine?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=jdrda/laravel-google-custom-search-engine&amp;utm_campaign=Badge_Grade)
[![Code Climate](https://codeclimate.com/github/jdrda/laravel-google-custom-search-engine/badges/gpa.svg)](https://codeclimate.com/github/jdrda/laravel-google-custom-search-engine)
[![Dependency Status](https://gemnasium.com/badges/github.com/jdrda/laravel-google-custom-search-engine.svg)](https://gemnasium.com/github.com/jdrda/laravel-google-custom-search-engine)
![](https://reposs.herokuapp.com/?path=jdrda/laravel-google-custom-search-engine)
[![GitHub issues](https://img.shields.io/github/issues/jdrda/laravel-google-custom-search-engine.svg)](https://github.com/jdrda/laravel-google-custom-search-engine/issues)
[![GitHub forks](https://img.shields.io/github/forks/jdrda/laravel-google-custom-search-engine.svg)](https://github.com/jdrda/laravel-google-custom-search-engine/network)
[![GitHub stars](https://img.shields.io/github/stars/jdrda/laravel-google-custom-search-engine.svg)](https://github.com/jdrda/laravel-google-custom-search-engine/stargazers)
[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://raw.githubusercontent.com/jdrda/laravel-google-custom-search-engine/master/license.md)
[![Packagist](https://img.shields.io/packagist/v/jan-drda/laravel-google-custom-search-engine.svg)]()
[![Packagist](https://img.shields.io/packagist/dt/jan-drda/laravel-google-custom-search-engine.svg)]()
#Laravel Google Custom Search Engine
Laravel package to get Google Custom Search results from Google Custom Search Engine API for both free and paid version.

#### Brief history
As Swiftype closed free plans, I started to find some alternative without too much coding, but was unsucessfull.
The best I found was [Spatie's Google Search package](https://github.com/spatie/googlesearch) for Google CSE paid version, so I made
some research and develop package similar way, but independent to Google CSE version.
 
#### Coffee for developers
If you like this project, you can buy me a coffee to help me get fresh. :)
https://ko-fi.com/A067ES5

## Installation
1/ Install with Composer

```bash
composer require jan-drda/laravel-google-custom-search-engine
```

2/ Add the service provider to config/app.php

```php
'providers' => [
    '...',
    'JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngineProvider'
];
```
3/ Add alias for Facade to config/app.php
```php
'aliases' => [
	...
	'GoogleCseSearch' => 'JanDrda\LaravelGoogleCustomSearchEngine\Facades\LaravelGoogleCustomSearchEngineProvider',
	...
]
```

4/ Publish the config file
```bash
php artisan vendor:publish --provider="JanDrda\LaravelGoogleCustomSearchEngine\LaravelGoogleCustomSearchEngineProvider"
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
Save search engine ID and api ID in your config/laravelGoogleCustomSearchEngine.php

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
$fulltext->setApiKey('someApiId'); // sets the API key

$results =  $fulltext->getResults('some phrase'); // get first 10 results for query 'some phrase'
```

## Documentation
Essetial documentation will be at [Github Wiki](https://github.com/jdrda/laravelgooglecsesearch/wiki)
Now is under the development.

## License
This package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) 

## About
I am independent senior software consultant living in the Czech republic in IT business from 1997.
