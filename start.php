<?php

Autoloader::map(array(
	'Hipchat\\Room' => Bundle::path('hipchat').'classes/room'.EXT,
	'Hipchat\\User' => Bundle::path('hipchat').'classes/user'.EXT,
));