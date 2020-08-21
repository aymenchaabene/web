<?php


class notification
{
	//attributs
	//content_notification	time_notification 	type_notification 
	private $content_notification;
	private $time_notification;
	private $type_notification;
	

	function __construct($content_notification,$time_notification,$type_notification)
	{
		$this->content_notification=$content_notification;
		$this->time_notification=$time_notification;
		$this->type_notification=$type_notification;
	}
	
	function get_Time()
	{
		return $this->time_notification;
	}
	function get_Content()
	{
		return $this->content_notification;
	}
	function get_Type()
	{
		return $this->type_notification;
	}

	
	
}
	
	
?>