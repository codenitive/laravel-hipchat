# Hipchat API Room

## Table of Contents

- [Introduction](#introduction)
- [Methods](#methods)

<a name="introduction"></a>
## Introduction

This API allow your Laravel API to communicate with Hipchat Room API, described in <https://www.hipchat.com/docs/api>.

<a name="methods"></a>
## Methods

### all()

List all rooms.

	@return  Hybrid\Curl
	
	$list = Hipchat\Room::all();

### show($room_id)

Show a room detail.

	@param   integer     $room_id
	@return  Hybrid\Curl
	
	$show_detail = Hipchat\Room::show($room_id);

### delete($room_id)

Delete a room.

	@param   integer     $room_id
	@return  Hybrid\Curl
	
	$deleted = Hipchat\Room::delete($room_id);

### history($room_id, $date = 'recent', $timezone = 'UTC')

Show a room history.

	@param   integer     $room_id
	@param   string      $date
	@param   string      $timezone
	@return  Hybrid\Curl
	
	$histories = Hipchat\Room::history($room_id, 'recent', 'UTC');

### create($name, $owner_user_id, $privacy = 'public', $topic = '', $guest_access = false)

Create a new room.

	@param   string      $name
	@param   integer     $owner_user_id
	@param   string      $privacy
	@param   boolean     $guest_access
	@return  Hybrid\Curl
	
	$create = Hipchat\Room::create('Epic Room', $owner_id);

### message($room_id, $from, $message, $color = 'yellow')

Send a message to a room.

	@param   integer     $room_id
	@param   string      $from
	@param   string      $message
	@param   string      $color
	@return  Hybrid\Curl
	
	$message = Hipchat\Room::message($room_id, 'Caruso', 'YEAAAHHHHHHHHHHHH…..', 'red');
	
