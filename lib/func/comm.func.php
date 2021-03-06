<?php
/**
 *  一些公用的函数
 */

//统计item数量函数
function item_count(){
    global $dbc;
    $sql = "SELECT COUNT(item_id)  FROM `bd_item`";
    $query = $dbc->query($sql);
    $row = $query->fetch_array();
    return $row[0];
}

//获取某个分类下item数
function cate_item_count($cate_id){
    global $dbc;
    $sql = "SELECT COUNT(item_id)  FROM `bd_item` WHERE `item_cate_id` = $cate_id ";
    $query = $dbc->query($sql);
    $row = $query->fetch_array();
    return $row[0];
}

//统计分类数量函数
function cate_count(){
    global $dbc;
    $sql = "SELECT COUNT(cate_id)  FROM `bd_cate`";
    $query = $dbc->query($sql);
    $row = $query->fetch_array();
    return $row[0];
}

//统计用户数量函数
function user_count(){
    global $dbc;
    $sql = "SELECT COUNT(uid)  FROM `bd_user`";
    $query = $dbc->query($sql);
    $row = $query->fetch_array();
    return $row[0];
}

//获取当前路径文件名
function get_filename($url=0){
    if($url=0){
        $url = $_SERVER['PHP_SELF'];
    }
    $filename = end(explode('/',$url));
    return $filename;
}

//根据id获取查询item sql
function get_item_sql($id){
     $item_sql = "SELECT * FROM `bd_item`  WHERE item_id = $id";
     return $item_sql;
}

//根据id获取查询cate sql
function get_cate_sql($id){
    $cate_sql = "SELECT * FROM `bd_cate`  WHERE cate_id = $id";
    return $cate_sql;
}

function get_gravatar( $email, $s = 80, $d = 'mm', $r = 'g', $img = false, $atts = array() ) {
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5( strtolower( trim( $email ) ) );
    $url .= "?s=$s&d=$d&r=$r";
    if ( $img ) {
        $url = '<img src="' . $url . '"';
        foreach ( $atts as $key => $val )
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}