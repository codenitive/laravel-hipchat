# Hipchat API User

## Table of Contents

- [Introduction](#introduction)
- [Methods](#methods)

<a name="introduction"></a>
## Introduction

This API allow your Laravel API to communicate with Hipchat User API, described in <https://www.hipchat.com/docs/api>.

<a name="methods"></a>
## Methods

### all()

List all users.

	@return  Hybrid\Curl
	
	$list = Hipchat\User::all();

### show($user_id)

Show a room detail.

	@param   integer     $user_id
	@return  Hybrid\Curl
	
	$show_detail = Hipchat\User::show($user_id);

### delete($user_id)

Delete a user.

	@param   integer     $user_id
	@return  Hybrid\Curl
	
	Hipchat\User::delete($user_id);

### create($email, $name, $title, $password, $is_group_admin = false, $timezone = 'UTC')

Create a new user.

	@param   string      $email
	@param   string      $name
	@param   string      $title
	@param   string      $password
	@param   boolean     $is_group_admin
	@param   string      $timezone
	@return  Hybrid\Curl
	
	$create = Hipchat\User::create('caruso@csi.com', 'Caruso', 'Mr', '123456', true, 'UTC');

### update($user_id, $email, $name, $title, $password, $is_group_admin = false, $timezone = 'UTC')

Update a user.

	@param   integer     $user_id
	@param   string      $email
	@param   string      $name
	@param   string      $title
	@param   string      $password
	@param   boolean     $is_group_admin
	@param   string      $timezone
	@return  Hybrid\Curl
	
	$update = Hipchat\User::update($user_id, 'caruso@csi.com', 'Caruso', 'Mr', '123456', true, 'UTC')
	
