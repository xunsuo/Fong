<?php
// +----------------------------------------------------------------------
// | FONG框架 [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2008-2018 http://www.fong.net.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: FONG <YunFong@YunFong.com>
// +----------------------------------------------------------------------

class DB {
private $connect;

   public function __construct(){
      include_once(CONF_PATH.'config'.CONF_EXT);
      $this->connect = mysql_connect($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD'],$config['DB_NAME']); //链接数据库信息
      mysql_select_db($config['DB_NAME']); //关联到数据库
      mysql_query('set names utf-8');//获取数据库编码格式
   }

  //查询
   public function select($sql){
     $result = mysql_query($sql,$this->connect);
     $val =mysql_fetch_array($result,MYSQL_ASSOC );
     return $val;
   }
   //修改
   public function update($sql){
     $result = mysql_query($sql,$this->connect);
   return $result;
   }
   //删除
   public function delete($sql){
     $result = mysql_query($sql,$this->connect);
   return $result;
   }
   //添加
   public function insert($sql){
       $result = mysql_query($sql,$this->connect);
     return $result;
   }





}




 ?>
