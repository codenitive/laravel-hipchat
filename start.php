<?php

/*
|--------------------------------------------------------------------------
| Hipchat Library
|--------------------------------------------------------------------------
|
| Map Hipchat Library using PSR-0 standard namespace.
|
*/

Autoloader::namespaces(array(
	'Hipchat' => Bundle::path('hipchat').'libraries',
));

/*
|--------------------------------------------------------------------------
| Load Bundle dependencies
|--------------------------------------------------------------------------
|
| Should load Hybrid bundle if it's not registered.
|
*/

if ( ! Bundle::exists('hybrid'))
{
	Bundle::register('hybrid');
	Bundle::start('hybrid');
}
