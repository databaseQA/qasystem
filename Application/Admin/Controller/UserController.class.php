<?php

namespace Admin\Controller;
use Think\Controller;
use Admin\Service\UserService;
require_once dirname(dirname(__FILE__)) . '/Service/UserService.php';
class UserController extends Controller {
    public function __initialize(){
        header("Content-Type: text/html; charset=utf-8");
    }

   //显示user列表
    public function index(){
        checkAdminLogin();
        $service = new UserService();

        //得到记录总条数
        $count = $service->getNum();

        $num = 20;//定义每一页条数
        $pageArray = page($count,$num);

        //分页后的用户表
        $userList = $service->getUserLIst($pageArray['perPage'], $pageArray['nextPage']);
    }
    public function deleteUser(){
        $service = new UserService();
        if(IS_POST){
            $id = $_POST['userId'];
            $re = $service->deleteUser($id);
            if($re){
                echo "删除用户成功";
            }
        }
    }
}