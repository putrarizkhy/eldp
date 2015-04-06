<?php

  
/*echo '{"status":'. json_encode($user) .',"user_fullname":'. json_encode($usercheck['User']['name']) .',"user_sex":'. json_encode($usercheck['User']['sex']) .',"user_age":'. json_encode($usercheck['User']['age']) .',"user_address":'. json_encode($usercheck['User']['address']) .',"user_phone":'. json_encode($usercheck['User']['phone']) .'}'; */

echo '{
    "status":'. json_encode($status) .',
    "flashMessage":'. json_encode($flashMessage).',
    "IdMember":'. json_encode($user['User']['id_member']).',
    "Username":'. json_encode($user['User']['username']).',
    "Nama":'. json_encode($user['User']['name']).',
    "Lahir":'. json_encode($user['User']['lahir']).',
    "Telpon":'. json_encode($user['User']['telpon']).',
    "Group":'. json_encode($user['User']['group']).',
    "idtoResponse":'. json_encode($idtoResponse).'
    }';
?>