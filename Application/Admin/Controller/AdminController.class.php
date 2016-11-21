<?php

namespace Admin\Controller;
use Think\Controller;
use Admin\Service\AdminService;
require_once dirname(dirname(__FILE__)) . '/Service/AdminService.php';
class AdminController extends Controller {
    public function __initialize(){
        header("Content-Type: text/html; charset=utf-8");
    }
    public function index(){
        checkAdminLogin();
        $this->display();
    }
    public function login(){
        $this->display();
    }
    public function doLogin(){
        if(IS_POST){
            $data = array(
                "admin_name" => $_POST['name'],
                "admin_pwd" => $_POST['password']
            );
            $service = new AdminService();
            $re = $service->login($data);
            if($re){
                session('admin.name', $re['admin_name']);
                session('admin.id', $re['admin_id']);
                $this->redirect('Admin/index');
            }
        }else{
            echo "非法请求";
        }
    }
    public function loginOut(){
        session('admin',null);
        $this->redirect('Index');
    }

    public function getAdminDetail(){
        checkAdminLogin();
        $service = new AdminService();
        $adminDetail = $service->getAdminDetail(session('admin.id'));
        if($adminDetail){
            $this->assign('adminDetail', $adminDetail);
        }
        $this->display('info');
    }

    public function modify(){
        checkAdminLogin();
        if(IS_POST){
            //修改信息，同时修改密码,需要进行验证
            $service = new AdminService();
            if(isset($_POST['old_password']) && !empty($_POST['old_password'])){
                $data = array(
                    'admin_pwd' => $_POST['old_password'],
                    'admin_id' => session('admin.id')
                );
                $re = $this->checkPwd($data);
                if(!$re){
                    echo "原始密码错误";
                    return;
                }

                $data = array(
                    'admin_pwd' => $_POST['password'],
                    'admin_email' => $_POST['email'],
                );
            }else{
                $data = array(
                    'admin_email' => $_POST['email'],
                );
            }

            //修改信息
            $re = $service->modify(session('admin.id'), $data);
            if(!$re){
                echo "修改信息失败";
            }else{
                echo "修改信息成功";
            }
        }
    }
    private function checkPwd($data){
        $service = new AdminService();
        $re = $service->login($data);
        if($re){
            return true;
        }else{
            return false;
        }
    }
    


}