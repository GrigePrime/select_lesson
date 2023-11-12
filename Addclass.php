<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $class_id = isset($_REQUEST['class_id']) ? filter_var($_REQUEST['class_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';

    switch($op){
        default:
            show_all_class();
            break;
    }
    require("footer.php");

    function show_all_class(){
        global $smarty, $mysqli,$class_id,$op,$msg;
        $op = 'addclass';
        if($class_id!=''){
            $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%$class_id%'";
            $result=$mysqli->query($sql) or die("在查詢資料庫時發生錯誤a98". $mysqli->error);
            if (mysqli_num_rows($result) != 0) {
                $i = 0;
                while ($class= $result->fetch_assoc()) {
                            $all_class[$i] = $class;
                            $all_class[$i]['course_time'] = checktime($class['course_time01'],$class['course_time02'],$class['course_time03']);
                            $all_class[$i]['course_room'] = checkroom($class['course_room1'],$class['course_room2'],$class['course_room3']);
                            $all_class[$i]['course_people'] = $class['course_quotaPick'].'/'.$class['course_quota'];
                            $i++;
                        }
                $smarty->assign('all_class',$all_class);
                $op='search_result';
            }else{
                $msg = '查無資料';
            }
        }
    }

    function checkroom($room1,$room2,$room3){
        $room = '';
        if($room1!=''){
            $room =  $room.$room1;}
        if($room2!=''){
            $room =  $room.','.$room2;}
        if($room3!=''){
            $room=  $room.','.$room3;}
        return $room;
    }

    function checktime($time1,$time2,$time3){
        $time = '';
        if($time1!=''){
            $time =  $time.changetime($time1);}
        if($time2!=''){
            $time =  $time.','.changetime($time2);}
        if($time3!=''){
            $time=  $time.','.changetime($time3);}
        return $time;
    }
    function changetime($orgtime){
        if($orgtime==''){
            return '';}
        $week = substr($orgtime,0,1);
        $time = substr($orgtime,1,2);
        switch($week){
            case '1':
                $week = '星期一';
                break;
            case '2':
                $week = '星期二';
                break;
            case '3':
                $week = '星期三';
                break;
            case '4':
                $week = '星期四';
                break;
            case '5':
                $week = '星期五';
                break;
            case '6':
                $week = '星期六';
                break;
            case '7':
                $week = '星期日';
                break;
            default:
                $week = '';
                break;
        }
        return $week.'第'.$time.'節';


    }
?>