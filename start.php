<?php

Autoloader::map(array(
	'Hipchat\\Room' => Bundle::path('hipchat').'classes/room'.EXT,
	'Hipchat\\User' => Bundle::path('hipchat').'classes/user'.EXT,
));

// Should load Hybrid bundle if it's not registered
if ( ! Bundle::exists('hybrid'))
{
	Bundle::register('hybrid');
	Bundle::start('hybrid');
}