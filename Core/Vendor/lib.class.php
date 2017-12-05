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

/**
* function：使用字符串方式读XML文件
*自动加载类，需要去lib.xml里面注册
* date：2017.12.03
**/
$file = VENDOR_PATH.'lib.xml';
$con = file_get_contents($file);
//XML标签配置
$xmlTag = array(
    'classname',
    'classfile',
    'classpath'
);
$arr = array();
foreach($xmlTag as $x) {
    preg_match_all("/<".$x.">.*<\/".$x.">/", $con, $temp);
    $arr[] = $temp[0];
}
//去除XML标签并组装数据
$lib = array();
foreach($arr as $key => $value) {
    foreach($value as $k => $v) {
        $a = explode($xmlTag[$key].'>', $v);
        $v = substr($a[1], 0, strlen($a[1])-2);
        $lib[$k][$xmlTag[$key]] = $v;
    }
}
//echo '<pre>';
//print_r($data);
foreach($lib as $k=>$vol){
  $venclasspath = VENDOR_PATH.$vol['classpath']."/".$vol['classfile'];
  if(file_exists($venclasspath)){
   //echo $venclasspath;
   include_once($venclasspath); //引入文件
  }else{
   echo $vol['classfile']."类文件不存在";exit;
  }
}

?>
