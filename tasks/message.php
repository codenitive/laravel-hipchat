<?php

class Hipchat_Room_Task
{
	public function message($arguments)
	{
		list($from, $message) = $arguments;

		echo Hipchat\Room::message($from, $message);
	}
}