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
 *自定义方法
 *注册加载Vendor类，可自定义
 *类的文件名称格式为，如：函数名+类+文件类型
 */
class Functions{

  function I(){

  }


  function error($mgs){
    if(!APP_DEBUG){
    //确保重定向后，后续代码不会被执行
    header("Location: //".LIB_URL);}

    echo "<style>";
    echo "body{padding: 0px; margin: 0px;}";
    echo ".error{width: 800px; height:350px; margin: auto;}";
    echo ".errimg{ float: left; width:50px; margin-top: 110px;}";
    echo ".errimg img{ width: 100%;}";
    echo ".errmgs{ float: left; width:600px; height: 90px;line-height:50px; padding-left: 20px;margin-top: 110px;font-family: '微软雅黑';color: #666;}";
    echo ".fvbanben{ float: left;width: 800px; height: 40px; line-height: 40px;  margin-top: 20px; color: #999; font-family: '微软雅黑';}";
    echo "</style>";
    echo "<div class='error'>";
    echo "<div class='errimg'><img src='".CORE_PATH."error.png'></div>";
    echo "<div class='errmgs'>";
    echo "错误提示：".$mgs."<br/>";
    echo "</div>";
    echo "<div class='fvbanben'>FONG框架 当前版本：FV1.2</div>";
    echo "</div>";
  }


}



?>
