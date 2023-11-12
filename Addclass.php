<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $class_id = isset($_REQUEST['class_id']) ? filter_var($_REQUEST['class_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';

    if($_GET['class_id']!=''){
        show_all_class();
    }
    require("footer.php");

    function show_all_class(){
        global $smarty, $mysqli,$class_id,$op;
        $op = 'addclass';
        $sql = "SELECT * FROM `course_data` WHERE `course_id` = '$class_id'";
        $result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤a98". $mysqli->error);
        if (mysqli_num_rows($result) != 0) {
            $total = $result->num_rows;
            $i = 0;
            while ($class= $result->fetch_assoc()) {
                        $all_class[$i] = $class;
                        $all_class[$i]['course_time'] = $class['course_time01'].','.$class['course_time02'].','.$class['course_time03'];
                        $all_class[$i]['course_room'] = $class['course_room1'].','.$class['course_room2'].','.$class['course_room3'];
                        $all_class[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
                        $i++;
                    }
            $smarty->assign('all_class',$all_class);
            $smarty->assign('total', $total);
            $op='search_result';
//             include_once('templates/showaddclass.html');
        }else{
            $result = None;
        }

//         $smarty->assign('pdType', $pdType);
    }
?>