<?php
/**
 *  Admin Global Func
 */

//登录检查函数
function admincheck(){
    session_start();
    $sessionId = session_id();

    //检测是否登录，若没登录则转向登录界面

    if(!isset($_COOKIE['admin_name'])){
        header("Location:login.php");
        exit();

    }
    else
    {
        $user_name = $_COOKIE['user_name'];
    }
}

//添加item函数
function item_add($title,$cate_id,$link,$size,$info){

}

//item更新函数
function item_update(){

}

//cate添加函数
function cate_add($name,$order){
    $sql = "INSERT INTO `bd_cate` (`cate_id`, `cate_name`, `cate_order`) VALUES (NULL, '$name', '$order')";
    $query = mysql_query($sql);
    return $query;
}

//cate update函数
function cate_update($id,$name,$order){
    $sql ="UPDATE `bd_cate` SET `cate_name` = '$name', `cate_order` = '$order' WHERE `cate_id` = $order";
    $query = mysql_query($sql);
    return $query;
}
