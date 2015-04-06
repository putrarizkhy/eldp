<?php

  
/*echo '{"status":'. json_encode($user) .',"user_fullname":'. json_encode($usercheck['User']['name']) .',"user_sex":'. json_encode($usercheck['User']['sex']) .',"user_age":'. json_encode($usercheck['User']['age']) .',"user_address":'. json_encode($usercheck['User']['address']) .',"user_phone":'. json_encode($usercheck['User']['phone']) .'}'; */

echo '{
    "status":'. json_encode($status) .',
    "flashMessage":'. json_encode($flashMessage).',
    "Judul":'. json_encode($notification['Notification']['title']).',
    "Isi":'. json_encode($notification['Notification']['content']).',
    "Expired":'. json_encode($notification['Notification']['expiration_date']).',
    "idtoResponse":'. json_encode($idtoResponse).'
    }';
?>