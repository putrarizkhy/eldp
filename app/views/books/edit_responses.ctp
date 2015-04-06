<?php

  
/*echo '{"status":'. json_encode($user) .',"user_fullname":'. json_encode($usercheck['User']['name']) .',"user_sex":'. json_encode($usercheck['User']['sex']) .',"user_age":'. json_encode($usercheck['User']['age']) .',"user_address":'. json_encode($usercheck['User']['address']) .',"user_phone":'. json_encode($usercheck['User']['phone']) .'}'; */

echo '{
	"status":'. json_encode($status) .',
	"flashMessage":'. json_encode($flashMessage).',
	"coverbg":'. json_encode($ebook['Book']['cover']).',
	"title":'. json_encode($ebook['Book']['title']).',
	"pengarang":'. json_encode($ebook['Book']['pengarang']).',
	"details":'. json_encode($ebook['Book']['details']).',
	"filelocation":'. json_encode($ebook['Book']['file']).',
	"idtodelete":'. json_encode($idtoResponse).'}';
?>