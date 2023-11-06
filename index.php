<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    
    switch ($op) {

        // 改
		case 'login':
			header("location:user.php?op=login");
			exit;
			break;
            //改
         //改
        case 'lessontable':
            break;
            //改
		default :
			break;
	}
    
    
    require("footer.php");
?>