<?php

  
/*echo '{"status":'. json_encode($user) .',"user_fullname":'. json_encode($usercheck['User']['name']) .',"user_sex":'. json_encode($usercheck['User']['sex']) .',"user_age":'. json_encode($usercheck['User']['age']) .',"user_address":'. json_encode($usercheck['User']['address']) .',"user_phone":'. json_encode($usercheck['User']['phone']) .'}'; */

echo '{"status":'. json_encode($status) .',"flashMessage":'. json_encode($flashMessage).',"memberid":'. json_encode($usermemberid).',"bookid":'. json_encode($bookid).',"available_book":'. json_encode($available_book).',"jatah_pinjam":'. json_encode($jatah_pinjam).'}';
?>