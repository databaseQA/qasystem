<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\UserService;

require_once dirname(dirname(__FILE__)) . '/Service/UserService.php';

class UserController extends Controller {
    public function __initialize() {
        header("Content-Type: text/html; charset=utf-8");
    }
    
    public function register(){
        $this->display();
    }
    
    public function doRegister() {
        $data = array(
            "user_name" => $_POST['username'],
            "user_pwd" => $_POST['password'],
            //"user_nickname" => $_POST['nickname'],
            //"user_gender" => $_POST['gender'],
            //"user_email" => $_POST['email']
        );
        $user = new UserService();
        $result = $user->register($data);
        if($result) {
            $_SESSION["user"]=$data['user_name'];
            echo "<script>alert('注册成功！')</script>";
            $this->redirect('Index/index');
        }
        else {
            echo "<script>alert('注册失败！')</script>";
            $this->redirect('User/register');
        }
    }
    
    public function login(){
        $this->display();
    }

    public function doLogin() {
        if(isset($_POST['submit'])) {
            $data = array(
                "user_name" => $_POST['username'],
                "user_pwd" => $_POST['password']
            );
            $user = new UserService();
            $result = $user->login($data);
            if($result) {
                $_SESSION["user"]=$data['user_name'];
                $this->redirect('Index/index');
            }
            else {
                echo "<script>alert('用户名或密码错误！')</script>";
                $this->redirect('User/login');
            }
        }
        else {
            echo "<script>alert('非法请求！')</script>";
            $this->display();
        }
    }
    
    public function logout() {
        $_SESSION["user"]=NULL;
        $this->redirect('Index/index');
    }
    
    public function getUserDetail() {
        checkUserLogin();
        $user = new UserService();
        $result = $user->getUserDetail(session('user')['user_id']);
        if($result) {
            $this->ajaxReturn($result);
        }
    }
    
    public function modify() {
        checkUserLogin();
        $this->display();
    }
    
    public function doModify() {
        $data = array(
            "user_nickname" => $_POST['nickname'],
            "user_gender" => $_POST['gender'],
            "user_email" => $_POST['email'],
            "user_intro" => $_POST['intro']
        );
        $user = new UserService();
        $result = $user->modify(session('user')['user_id'], $data);
        if($result) {
            echo "<script>alert('修改资料成功！')</script>";
            $this->display();
        }
        else {
            echo "<script>alert('修改资料失败！')</script>";
            $this->display();
        }
    }
    
    public function modifyPwd() {
        checkUserLogin();
        $oldPwd = $_POST['old_pwd'];
        $newPwd = $_POST['new_Pwd1'];
        if($oldPwd == session('user')['user_pwd']) {
            $data = array(
                "user_pwd" => $newPwd
            );
            $user = new UserService();
            $result = $user->modify(session('user')['user_id'], $data);
            if($result) {
                echo "<script>alert('修改密码成功！')</script>";
                $this->display();
            }
            else {
                echo "<script>alert('修改密码失败！')</script>";
                $this->display();
            }
        }
        else {
            echo "<script>alert('原始密码错误，修改密码失败！')</script>";
            return;
        }
    }
    
    public function deleteUser() {
        $user = new UserService();
        $this->display();
        if(isset($_POST['yes'])) {
            $result = $user->deleteUser(session('user')['user_id']);
            if($result) {
                echo "<script>alert('注销用户成功！')</script>";
            }
            else {
                echo "<script>alert('注销用户失败！')</script>";
            }
        }
    }
}