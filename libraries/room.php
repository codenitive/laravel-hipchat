<?php namespace Hipchat;

use \Config, Hybrid\Curl;

class Room
{
	/**
	 * List all rooms
	 *
	 * @static
	 * @access  public
	 * @return  Hybrid\Curl
	 */
	public static function all()
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'format'     => 'json',
		);

		return static::call('GET https://api.hipchat.com/v1/rooms/list', $data);
	}

	/**
	 * Show a room detail
	 *
	 * @static
	 * @access  public
	 * @param   integer     $room_id
	 * @return  Hybrid\Curl
	 */
	public static function show($room_id)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'room_id'    => $room_id,
			'format'     => 'json',
		);

		return static::call('GET https://api.hipchat.com/v1/rooms/show', $data);
	}

	/**
	 * Delete a room
	 *
	 * @static
	 * @access  public
	 * @param   integer     $room_id
	 * @return  Hybrid\Curl
	 */
	public static function delete($room_id)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'room_id'    => $room_id,
			'format'     => 'json',
		);

		return static::call('POST https://api.hipchat.com/v1/rooms/delete', $data);
	}

	/**
	 * Show a room history
	 *
	 * @static
	 * @access  public
	 * @param   integer     $room_id
	 * @param   string      $date
	 * @param   string      $timezone
	 * @return  Hybrid\Curl
	 */
	public static function history($room_id, $date = 'recent', $timezone = 'UTC')
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'room_id'    => $room_id,
			'date'       => $date,
			'timezone'   => $timezone,
			'format'     => 'json',
		);

		return static::call('GET https://api.hipchat.com/v1/rooms/history', $data);
	}

	/**
	 * Create a new room
	 *
	 * @static
	 * @access  public
	 * @param   string      $name
	 * @param   integer     $owner_user_id
	 * @param   string      $privacy
	 * @param   boolean     $guest_access
	 * @return  Hybrid\Curl
	 */
	public static function create($name, $owner_user_id, $privacy = 'public', $topic = '', $guest_access = false)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token'    => $config['token'],
			'name'          => $name,
			'owner_user_id' => $owner_user_id,
			'privacy'       => $privacy,
			'topic'         => $topic,
			'guest_access'  => (true === $guest_access) ? 1 : 0,
			'format'        => 'json',
		);

		return static::call('POST https://api.hipchat.com/v1/rooms/create', $data);
	}

	/**
	 * Send a message to a room
	 *
	 * @static
	 * @access  public
	 * @param   integer     $room_id
	 * @param   string      $from
	 * @param   string      $message
	 * @param   string      $color
	 * @return  Hybrid\Curl
	 */
	public static function message($room_id, $from, $message, $color = 'yellow')
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'room_id'    => $room_id,
			'message'    => $message,
			'from'       => $from,
			'color'      => $color,
			'format'     => 'json',
			'notify'     => 1,
		);

		return static::call('POST https://api.hipchat.com/v1/rooms/message', $data);
	}
	
	/**
	 * Send a curl request to Hipchat
	 *
	 * @static
	 * @access  protected
	 * @param   string      $url
	 * @param   array       $data
	 * @return  Hybrid\Curl
	 */
	protected static function call($url, $data)
	{
		$request = Curl::make($url, $data);
		$request->option(CURLOPT_SSL_VERIFYPEER, Config::get('hipchat::api.verify_ssl', 1));
		$request->option(CURLOPT_FOLLOWLOCATION, 1);
		$request->option(CURLOPT_RETURNTRANSFER, 1);
		$request->option(CURLOPT_TIMEOUT, 15);

		return $request->call();
	}
}