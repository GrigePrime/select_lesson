<?php
    require_once('header.php');
    $op = isset($_REQUEST['op']) ? filter_var($_REQUEST['op'],FILTER_SANITIZE_SPECIAL_CHARS) : 'home';
    $user_id = isset($_REQUEST['user_id']) ? filter_var($_REQUEST['user_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    $chose_cancel_id = isset($_REQUEST['chose_cancel_id']) ? filter_var($_REQUEST['chose_cancel_id'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
    if($isuser==false){
        $msg = '請先登入';
    }else{
        show_course_selected();
        if($chose_cancel_id != ''){
            check_cancel_class($chose_cancel_id);
        }
    }

    require("footer.php");

    function show_course_selected(){
            global $smarty, $mysqli,$op,$user_id, $msg;

//             if($isuser==false){
//                 $msg = '請先登入';
//                 return;
//             }
            $op = 'lessonCancel';
            $user_id = $_SESSION['user_id'];
            $sql = "SELECT * FROM `ccm` WHERE `ccm_id` LIKE '%{$user_id}%'";
            $result = $mysqli->query($sql) or die("在查詢課表時發生錯誤".$mysqli->error);

            if(mysqli_num_rows($result) != 0){
                $ccm_course_data = $result->fetch_assoc();
                $ccm_course_credit = $ccm_course_data['ccm_credit'];
                $ccm_course_array = explode(",",$ccm_course_data['ccm_course']);

                for($i = 0;$i<count($ccm_course_array);$i++){
                    if($ccm_course_array[$i] != ''){
                        $sql = "SELECT * FROM `course_data` WHERE `course_id` LIKE '%{$ccm_course_array[$i]}%' ";
                        $course_d = $mysqli->query($sql) or die("在查詢課程時發生錯誤".$mysqli->error);
                        $course_d_f = $course_d->fetch_assoc();
                        $ccm_course_forCancel[$i]['course_name'] = $course_d_f['course_name'];
                        $ccm_course_forCancel[$i]['course_credit'] = $course_d_f['course_credit'];
                        $ccm_course_forCancel[$i]['course_RE'] = $course_d_f['course_RE'];
                        $ccm_course_forCancel[$i]['course_id'] = $course_d_f['course_id'];
                    }
                }
                $smarty->assign('ccm_course_forCancel',$ccm_course_forCancel);
            }else{
                 $msg = '查無資料';
            }
        }

    function check_cancel_class($chose_cancel_id){
        global $smarty, $mysqli,$op,$msg;
        $user_id = $_SESSION['user_id'];
        $op = "lessonCancel";
        $sql = "SELECT `ccm_credit` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
        $user_credit =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶資料". $mysqli->error);
        $user_credit_data = $user_credit->fetch_assoc();
        $user_old_credit = $user_credit_data['ccm_credit'];
        $sql = "SELECT `rules`.`rules_min_credit` FROM `rules` JOIN `ccm` ON `rules`.`rules_depart` = `ccm`.`ccm_grade` WHERE `ccm`.`ccm_id` = '{$user_id}'";
        $user_rules_min_credit =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶規則". $mysqli->error);
        $user_rules_min_credit_data = $user_rules_min_credit->fetch_assoc();
        $user_rules_min_credit = $user_rules_min_credit_data['rules_min_credit'];
        $sql = "SELECT `course_credit` FROM `course_data` WHERE `course_id` = '{$chose_cancel_id}'";
        $chose_class_credit = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程學分". $mysqli->error);
        $chose_class_credit_data = $chose_class_credit->fetch_assoc();
        $chose_class_credit = $chose_class_credit_data['course_credit'];
        //改
        $sql = "SELECT `rules`.`rules_class` FROM `rules` JOIN `ccm` ON `rules`.`rules_depart` = `ccm`.`ccm_grade` WHERE `ccm`.`ccm_id` = '{$user_id}'";
        $user_rules_class =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶規則". $mysqli->error);
        $user_rules_class_data = $user_rules_class->fetch_assoc();
        $user_rules_class = $user_rules_class_data['rules_class'];
        $user_rules_class = explode(",",$user_rules_class);

        $course_flag = false;

        for($i = 0;$i<count($user_rules_class);$i++){
            if($chose_cancel_id == $user_rules_class[$i]){
                $course_flag = true;
            }
        }

        $sql = "SELECT `course_RE` FROM `course_data` WHERE `course_id` = '{$chose_cancel_id}'";
        $chose_class_RE = $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到課程". $mysqli->error);
        $chose_class_RE_data= $chose_class_RE->fetch_assoc();
        $chose_class_RE = $chose_class_RE_data['course_RE'];

        //抓舊總學分，當前要退選的學分，規定最低學分

            if($course_flag == true){
                $msgdanger = '不可以退選必修!';
                $smarty->assign('msgdanger',$msgdanger);
                return;
                //改
            }else if($user_old_credit - $chose_class_credit < $user_rules_min_credit){
                $msgdanger = '低於規定學分';
                $smarty->assign('msgdanger',$msgdanger);
                return;
            }else{
                $sql = "SELECT `ccm_course` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
                $alreadyclass =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶課表". $mysqli->error);
                $alreadyclass_data = $alreadyclass->fetch_assoc();
                $alreadyclass_list = $alreadyclass_data['ccm_course'];
                $alreadyclass_array = explode(",",$alreadyclass_list);
                $new_list ='';
                $list_first_count = 0;
                //刪除課程
                for($i = 0;$i<count($alreadyclass_array);$i++){
                    if($alreadyclass_array[$i] == $chose_cancel_id){
                        array_splice($alreadyclass_array,$i,1);
                        array_filter($alreadyclass_array);
                    }else if($alreadyclass_array[$i] != '' && $list_first_count == 0){
                        $new_list = $alreadyclass_array[$i];
                        $list_first_count = 1;
                    }else if($alreadyclass_array[$i] != '' && $list_first_count != 0){
                        $new_list = $new_list.','.$alreadyclass_array[$i];
                    }
                }


                $sql = "UPDATE `ccm` SET `ccm_credit` = `ccm_credit`-{$chose_class_credit} WHERE `ccm_id` = '{$user_id}'";
                $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶學分". $mysqli->error);
                $sql = "UPDATE `ccm` SET `ccm_course` = '{$new_list}' WHERE `ccm_id` = '{$user_id}'";
                $mysqli->query($sql) or die("在查詢資料庫時發生錯誤,更新用戶課表". $mysqli->error);

                $sql = "SELECT `ccm_credit` FROM `ccm` WHERE `ccm_id` = '{$user_id}'";
                $user_credit_n =$mysqli->query($sql) or die("在查詢資料庫時發生錯誤,找不到用戶資料". $mysqli->error);
                $user_credit_data_n = $user_credit_n->fetch_assoc();
                $user_old_credit_n = $user_credit_data_n['ccm_credit'];
//                 echo nl2br("\n");
//                 echo $user_old_credit_n;

                show_course_selected();
                $msgsuccess = '退選成功';
                $smarty->assign('msgsuccess',$msgsuccess);
                $course_flag = false;
                return;
            }
    }
?>