<?php

if ( isset ( $_GET['file'] ) )
{
	if ( substr($_GET['file'], -3) == "jpg" || substr($_GET['file'], -4) == "jpeg")
	{
		header("Content-Type: image/jpeg");
	}
	elseif ( substr($_GET['file'], -3) == "png")
	{
		header("Content-Type: image/png");
	}

	echo file_get_contents($_GET['file']);
}