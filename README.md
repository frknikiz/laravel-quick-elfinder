# Laravel Quick Elfinder #
[![Total Downloads](https://poser.pugx.org/frknikiz/laravel-quick-elfinder/downloads)](https://packagist.org/packages/frknikiz/laravel-quick-elfinder) 
[![License](https://poser.pugx.org/frknikiz/laravel-quick-elfinder/license)](https://packagist.org/packages/frknikiz/laravel-quick-elfinder)

Laravel Quick Elfinder package allows you to use [Elfinder](https://github.com/barryvdh/laravel-elfinder) quickly.
> This packages is only available for Laravel 4.*

# Library Features #

- Uses Laravel Elfinder Package
- fast,simple,not plagued by configuration

# Installation #

Begin with installing this package through Composer. Edit your project's composer.json

	"require": {
	        "frknikiz/laravel-quick-elfider":"dev-master"
	}

Next, update Composer from the Terminal:

    composer update
    
Open `app/config/app.php`, and add a new item to the providers array.

	'Frknikiz\CustomElfinder\CustomElfinderServiceProvider'

Publish Elfinder config from the Terminal:

	php artisan cfinder:pub

> Access to security "isAdminLogin" name, you must define a filter.

Publish Elfinder Asset from the Terminal:

    php artisan elfinder:publish
    
Finally,Publish Quick Elfinder Asset from the Terminal:

	php artisan asset:publish frknikiz/laravel-quick-elfinder

# Usage #


In the view file you want to use, call `Cutil::getjs()` method after you called the jQuery file 

Example:
	
    <div>
    	<input type="text" name="path" disabled/>
    	<button class="find">Add İmage</button>
    	<button class="remove">Remove İmage</button>
    </div>
    <div>
    	<input type="text" name="path" disabled/>
    	<button class="find">Add İmage</button>
    	<button class="remove">Remove İmage</button>
    </div>
	...
	
	{{HTML::script('jquery.min.js')}}
	{{Cutil::getJs()}}

In this sample above, when you click instance of "find" class, elfinder view will appear. After you choose your image source ,  image url will place in input.

"find" Class : Opens Elfinder Window

"remove" Class : Clears İnput

# References #

[Laravel Elfinder](https://github.com/barryvdh/laravel-elfinder)

# License #

    Copyright 2015 Furkan İKİZ.
    
    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at
    
       http://www.apache.org/licenses/LICENSE-2.0
    
    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
