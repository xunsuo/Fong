<?php
 class IndexController extends Controller {
     public function index(){

     $db = new DB();
     $actlist = $db->select("select * from weixin_user");
      //var_dump($actlist);
     $this->assign('actlist', $actlist);
     $this->display('index');
    }
    public function news(){
      echo "news方法";
    }

}
