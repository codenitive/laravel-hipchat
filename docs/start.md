# Hipchat API Bundle

First, create an account at [Hipchat.com](http://hipchat.com). On logged in, navigate to **Group Admin** and choose **API** tab. You will need a token to allow the bundle to get and send request to Hipchat API Server through HTTP.

Once ready, update the configuration file in `hipchat/config/api.php`:

	/*
	 |--------------------------------------------------------------------------
	 | Hipchat HTTP API Auth Token
	 |--------------------------------------------------------------------------
	 | 
	 | Get API Auth Token from https://www.hipchat.com/docs/api
	 */
	'token'      => null,
	
	/*
	 |--------------------------------------------------------------------------
	 | Curl Verify SSL
	 |--------------------------------------------------------------------------
	 | 
	 | In case Curl wasn't install properly, use this to exclude CURLOPT_SSL_VERIFYPEER
	 */
	'verify_ssl' => 1,

## Available API

- [Room](room.md)
- [User](user.md)