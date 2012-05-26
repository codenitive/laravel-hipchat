<?php

Autoloader::directories(array(
	Bundle::path('hipchat').'libraries',
));

// Should load Hybrid bundle if it's not registered
if ( ! Bundle::exists('hybrid'))
{
	Bundle::register('hybrid');
	Bundle::start('hybrid');
}