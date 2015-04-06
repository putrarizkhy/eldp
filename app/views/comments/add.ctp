<?php

echo '{"status":'. json_encode($status) .',"flashMessage":'. json_encode($flashMessage).',"comment_name":'. json_encode($comment['User']['name']).',"comment_content":'. json_encode($comment['Comment']['content']).',"comment_date":'. json_encode($comment['Comment']['content']).',"comment_photo":'. json_encode($$comment['User']['photo']).'}';
?>