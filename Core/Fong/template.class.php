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
// |引入控制器模型视图
// +----------------------------------------------------------------------
// |模板控制template
// +----------------------------------------------------------------------
/*
*文件处理文件
*/
if(!empty($_GET['c'])){
       $controller = $_GET['c'];
        // require CONT_PATH.'Index'.CONT.EXT;
        // $cont = new IndexController();
        // $cont->index();
        $file = CONT_PATH . ucfirst($controller).CONT.EXT;   //构成文件路径strtolower全部小写
        if (file_exists($file)){  //获取文件
        include_once($file);      //引入文件
          /*
          *初始化对应的类
          */
          $class = ucfirst($controller).CONT;
          if(class_exists($class)){
            $cont = new $class;
          }//else{
            //error("找不到这个类名!");
          //die('找不到这个类名!');  //类的命名正确吗？
          //}
        }else{
          error("".$controller."Controller控制器不存在!");
        //die($controller."Controller控制器不存在"); //文件不存在
        }

        /*
        *  检测模型自动载入控制器
        *当文档不存在时模型不载入
        *
        */
        $Model = MODE_PATH . ucfirst($controller) .MODE.CONF_EXT;   //构成文件路径strtolower全部小写
        //echo $Model;
        if (file_exists($Model)){     //获取文件
        include_once($Model);         //引入文件
        }
        /*
        *调用当前控制器的方法
        *GET到方法名，method_exists检测控制器里面的方法是否存在
        *c存在的时候a存在的时候
        */
        if (file_exists($file)){
            $class = ucfirst($controller).CONT;
        if(class_exists($class)){
        if(!empty($_GET['a'])){
            $view=$_GET['a'];
            if(method_exists($cont,$view)){
            /*
            *调用动态变量
            */
            $cont->$view();
            }else{
              error("当前方法不存在!");
            }
        }
      }
    }

  }else{
      /*
      *默认检测当前的控制器默认入口页面载入index
      *引入当前默认入口index控制器文件
      */
      $file = CONT_PATH.HOME.CONT.EXT;   //构成文件路径strtolower全部小写
      include_once($file);   //引入文件
      /*
      *默认实例化当前的IndexController类
      *默认入口实例化引入模板模型
      */
      $cont = new IndexController();
      $Model = MODE_PATH.HOME.MODE.CONF_EXT;;   //构成文件路径strtolower全部小写
      if (file_exists($Model)){     //获取文件
      include_once($Model);         //引入文件
      }
  //echo "控制器不能为空";
    /*
    *调用当前控制器的方法
    *GET到方法名，method_exists检测控制器里面的方法是否存在
    */
    if(!empty($_GET['a'])){
        $view=$_GET['a'];
        if(method_exists($cont,$view)){
        /*
        *调用动态变量
        */
        $cont->$view();
        }else{
          error("当前方法不存在!");
        }
    }else{
      $cont->index();
    }


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




 ?>
