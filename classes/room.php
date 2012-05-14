<?php namespace Hipchat;

use \Config;

class Room
{
	public static function message($from, $message, $color = 'yellow', $room_id = null)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'room_id'    => (int) ($room_id ?: $config['room_id']),
			'message'    => $message,
			'from'       => $from,
			'format'     => 'json',
			'notify'     => 1,
		);

		$post_data = http_build_query($data);

		$request = Curl::make('POST https://api.hipchat.com/v1/rooms/message', $data);
		
		$request->option(CURLOPT_SSL_VERIFYPEER, Config::get('hipchat::api.verify_ssl', 1));
		$request->option(CURLOPT_FOLLOWLOCATION, 1);
		$request->option(CURLOPT_RETURNTRANSFER, 1);
		$request->option(CURLOPT_TIMEOUT, 15);

		return $request->call();
	}
}