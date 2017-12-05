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
 * 在我们的MVC框架中，处理视图的功能
 *处理控制器调用的方法
 */
class Controller extends Functions{
  // function __construct(){}
  /**
  * 保存赋给视图模板的变量
  */
  private $data = array();
  private $template ="";
  /**
  * 保存视图渲染状态
  */
  private $render = FALSE;
  /**
   * 加载一个视图模板
   */
  public function assign($variable , $value){
   $this->data[$variable]= $value;
  }

  //载入模板
   public function display($template=null){
       //echo $_GET['c'];
       /*
       *判断视图模板是否存在，控制器填写视图以控制调用为主，如不填写以url地址为主
       *display方法
       */
       if($template==''){
         if(!empty($_GET['a'])){
            $template = $_GET['a'];
         }
       }
       /*
       *当前检测控制器获取控制器名称
       */
       if(!empty($_GET['c'])){$controller=ucfirst($_GET['c']);}else{$controller=HOME;}
       /*
       *拼接当前视图的地址，检测文件是否存在，存在就载入文件，不存在输出页面错误提示
       */
       $file = VIEW_PATH.$controller ."/". strtolower($template) .CONF_EXT;
       if (file_exists($file)){
               $this->render = $file;
               extract($this->data);
               include($this->render);
       }else{
         $this->error('目录/View/'.$controller ."/". strtolower($template) .CONF_EXT. ' 文件模板不存在');
        //echo '目录/View/'.$controller ."/". strtolower($template) .CONF_EXT. ' 文件模板不存在';
       }
  }

}
 ?>
