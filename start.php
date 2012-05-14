<?php

Autoloader::map(array(
	'Hipchat\\Curl' => Bundle::path('hipchat').'classes/curl'.EXT,
	'Hipchat\\Room' => Bundle::path('hipchat').'classes/room'.EXT,
));