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

//----------------------------------
// YunFong公共入口文件,变量的定义
//----------------------------------

//类文件后缀
//URL 模式定义
const EXT               =   '.class.php';
const CONT              =   'Controller';
const MODE              =   'Model';
const VIEW              =   'View';
const HOME              =   'Index';
// 系统常量定义
defined('LIB_PATH')     or define('LIB_PATH',       YUN_FONG.'/'); // 系统核心类库目录
defined('VENDOR_PATH')  or define('VENDOR_PATH',       YUN_FONG.'/Vendor/'); // 系统核心类库目录
defined('COMMON_PATH')  or define('COMMON_PATH',       YUN_FONG.'/Common/'); // 系统核心类库目录

defined('RUNTIME_PATH') or define('RUNTIME_PATH',   APP_PATH.'Runtime/');   // 系统运行时目录
defined('CONT_PATH')    or define('CONT_PATH',      APP_PATH.'Controller/'); // 系统应用模式目录
defined('MODE_PATH')    or define('MODE_PATH',      APP_PATH.'Model/'); // 系统应用模式目录
defined('VIEW_PATH')    or define('VIEW_PATH',      APP_PATH.'View/'); // 系统应用模式目录
defined('CONF_PATH')    or define('CONF_PATH',      APP_PATH.'Conf/'); // 应用配置目录
defined('CORE_PATH')    or define('CORE_PATH',      LIB_PATH.'Fong/'); // Think类库目录
defined('CONF_EXT')     or define('CONF_EXT',       '.php'); // 配置文件后缀

defined('LOG_PATH')     or define('LOG_PATH',       RUNTIME_PATH.'Log/'); // 应用日志目录
defined('TEMP_PATH')    or define('TEMP_PATH',      RUNTIME_PATH.'Temp/'); // 应用缓存目录
defined('DATA_PATH')    or define('DATA_PATH',      RUNTIME_PATH.'Data/'); // 应用数据目录
defined('CACHE_PATH')   or define('CACHE_PATH',     RUNTIME_PATH.'Cache/'); // 应用模板缓存目录
defined('LIB_URL')     or define('LIB_URL',        $_SERVER['SERVER_NAME']); // 域名地址



//加载核心Fong类
require CORE_PATH.'Fong'.EXT;
?>
