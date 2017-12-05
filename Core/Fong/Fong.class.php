<?php
// +----------------------------------------------------------------------
// | FONG框架 Fong框架核心文件
// +----------------------------------------------------------------------
// | Copyright (c) 2008-2018 http://www.fong.net.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: FONG <Fong@YunFong.com>
// +----------------------------------------------------------------------
// | createfile生成文件的方法
// +----------------------------------------------------------------------
// | createdir生成目录的方法
// +----------------------------------------------------------------------

/*
*初始化文件
*创建文件方法
*/
static $filstr='';
static $filcof='';
function createfile($file,$filstr){

   if (!file_exists ($file)){
   $cFile = fopen ($file,'w');
       if (! $cFile) {
       echo 'create '.$file.' file fail';
     }
     /**创建写入内容**/
        if (is_writable($file) == true) {
                 fwrite($cFile, $filstr);
                 //file_put_contents ($file, $data);
        }
   fclose($cFile);
   }
}
/*
*初始化目录
*创建目录方法
*/
function createdir($path,$chmod){
    if (is_dir($path)){  //判断目录存在否，存在不创建
           echo "目录'" . $path . "'已经存在";
    }else{ //不存在创建
                $re=mkdir($path,$chmod,true); //第三个参数为true即可以创建多极目录
               if ($re){
                       echo "目录创建成功，可以开始的你项目...";
               }else{
                       echo "目录创建失败,请检查权限！";
               }
       }
}
/*
*判断当前应用目录是否存在
*不存在自动创建目录
*/
 if(!is_dir(APP_NAME)){
  //自动创建目录
  /*
  *创建应用目录Application
  */
  createdir(APP_NAME,"0755");
  /*
  *创建二级目录Controller控制器
  *创建应用目录
  */
  createdir(CONT_PATH,"0755");
  /*
  *创建二级目录Model模型
  *创建应用目录Application
  */
  createdir(MODE_PATH,"0755");
  /*
  *创建二级目录VIEW视图
  *创建应用目录Application
  */
  createdir(VIEW_PATH,"0755");
  /*
  *创建二级目录conf
  *创建应用目录Application
  */
  createdir(CONF_PATH,"0755");
  /*
  *创建二级目录runtime缓存目录
  *创建应用目录Application
  */
  createdir(RUNTIME_PATH,"0777");
  /*
  *创建二级目录runtime缓存目录Log,Temp,Data,Cache
  *创建应用目录Application
  */
  createdir(LOG_PATH,"0777");
  createdir(TEMP_PATH,"0777");
  createdir(DATA_PATH,"0777");
  createdir(CACHE_PATH,"0777");
  /*创建二级目录下文件默认入口控制器
  *创建/Application/Controller/IndexController.class.php
  */
  //die("index初始化文件的内容");
  $filstr.="<?php \r\n";
  $filstr.=" class IndexController extends Controller { \r\n";
  $filstr.=" public function index(){ \r\n";
  $filstr.=" echo '欢迎访问Fong框架';\r\n}\r\n}";
  createfile(CONT_PATH."Index".CONT.EXT,$filstr);
  /*创建二级目录下文件默认入口控制器
  *创建/Application/conf/config.php
  *数据库配置文件
  */
  //die("conf初始化文件的内容");
  $filcof.="<?php \r\n";
  $filcof.="return array(\r\n//'配置项'=>'配置值'\r\n\r\n);";
  createfile(CONF_PATH."config".CONF_EXT,$filcof);

}

require COMMON_PATH.'config'.CONF_EXT;
require COMMON_PATH.'functions'.CONF_EXT;
require VENDOR_PATH.'lib'.EXT;
require CORE_PATH.'Controller'.CONF_EXT;
require CORE_PATH.'template'.EXT;

 ?>
