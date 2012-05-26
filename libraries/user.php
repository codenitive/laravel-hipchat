<?php namespace Hipchat;

use \Config, Hybrid\Curl;

class User
{
	/**
	 * List all users
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

		return static::call('GET https://api.hipchat.com/v1/users/list', $data);
	}

	/**
	 * Show an user detail
	 *
	 * @static
	 * @access  public
	 * @param   integer     $user_id
	 * @return  Hybrid\Curl
	 */
	public static function show($user_id)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'user_id'    => $user_id,
			'format'     => 'json',
		);

		return static::call('GET https://api.hipchat.com/v1/users/show', $data);
	}

	/**
	 * Delete an user
	 *
	 * @static
	 * @access  public
	 * @param   integer     $user_id
	 * @return  Hybrid\Curl
	 */
	public static function delete($user_id)
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token' => $config['token'],
			'user_id'    => $user_id,
			'format'     => 'json',
		);

		return static::call('POST https://api.hipchat.com/v1/users/delete', $data);
	}

	/**
	 * Create a new user
	 *
	 * @static
	 * @access  public
	 * @param   string      $email
	 * @param   string      $name
	 * @param   string      $title
	 * @param   string      $password
	 * @param   boolean     $is_group_admin
	 * @param   string      $timezone
	 * @return  Hybrid\Curl
	 */
	public static function create($email, $name, $title, $password, $is_group_admin = false, $timezone = 'UTC')
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token'     => $config['token'],
			'email'          => $email,
			'name'           => $name,
			'title'          => $title,
			'password'       => $password,
			'is_group_admin' => (true === $is_group_admin) ? 1 : 0,
			'format'         => 'json',
		);

		return static::call('POST https://api.hipchat.com/v1/users/create', $data);
	}

	/**
	 * Update a user
	 *
	 * @static
	 * @access  public
	 * @param   integer     $user_id
	 * @param   string      $email
	 * @param   string      $name
	 * @param   string      $title
	 * @param   string      $password
	 * @param   boolean     $is_group_admin
	 * @param   string      $timezone
	 * @return  Hybrid\Curl
	 */
	public static function update($user_id, $email, $name, $title, $password, $is_group_admin = false, $timezone = 'UTC')
	{
		$config = Config::get('hipchat::api', '');

		$data = array(
			'auth_token'     => $config['token'],
			'user_id'        => $user_id,
			'email'          => $email,
			'name'           => $name,
			'title'          => $title,
			'password'       => $password,
			'is_group_admin' => (true === $is_group_admin) ? 1 : 0,
			'format'         => 'json',
		);

		return static::call('POST https://api.hipchat.com/v1/users/update', $data);
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