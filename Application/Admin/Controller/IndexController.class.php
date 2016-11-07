<?php

namespace Admin\Controller;
use Think\Controller;
use Admin\Service\IndexService;
require_once dirname(dirname(__FILE__)) . '/Service/IndexService.php';
class IndexController extends Controller {
    public function __initialize(){
        header("Content-Type: text/html; charset=utf-8");
    }
    public function index(){
        $this->display();
    }
}