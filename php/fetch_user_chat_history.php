<?php

//fetch_user_chat_history.php

require_once 'connect.php';

echo fetch_user_chat_history($_POST['user_id'], $_POST['to_user_id'], $conn);

?>