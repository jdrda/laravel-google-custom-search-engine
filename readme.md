## Laravel Google Custom Search Engine

Laravel package to get Google Custom Search results from Google Custom Search Engine API for both free and paid version.

##### Brief history
As Swiftype closed free plans, I started to find some alternative without too much coding, but was unsucessfull.
The best I found was [Spatie's Google Search package](https://github.com/spatie/googlesearch) for Google CSE paid version, so I made
some research and develop package similar way, but independent to Google CSE version. 

## Installation
1. Install with Composer

```bash
composer require jdrda/laravel-google-custom-search-engine
```

2. Add the service provider to config/app.php

```php
'providers' => [
    '...',
    'JanDrda\LaravelGoogleCustomeSearchEngine\LaravelGoogleCustomeSearchEngineProvider'
];
```
3. Add alias for Facade to config/app.php
```php
'aliases' => [
	...
	'GoogleCseSearch' => 'JanDrda\LaravelGoogleCustomeSearchEngine\Facades\LaravelGoogleCustomeSearchEngineProvider',
	...
]
```

4. Publish the config file
```bash
php artisan vendor:publish --provider="JDrda\LaravelGoogleCustomeSearchEngine\LaravelGoogleCustomeSearchEngineProvider"
```

## Fast configuration

## Documentation
Essetial documentation will be at [Github Wiki](https://github.com/jdrda/laravelgooglecsesearch/wiki)

### License
The Olapus is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT) 

## About
I am independent senior software consultant living in the Czech republic in IT business from 1997.