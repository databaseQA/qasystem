<?php

namespace Admin\Service;
use Admin\Model\UserModel;
use Admin\Model\QuestionModel;
use Admin\Model\AnswerModel;
use Admin\Model\AdminModel;
class AdminService{
    //$data = array('admin_name' => '','admin_pwd' => '')
    function login($data){
        $AdminDb = new AdminModel();
        return $AdminDb->field('admin_name,admin_id')->where($data)->find();
    }
    function getAdminDetail($adminId){
        $AdminDb = new AdminModel();
        $map['admin_id'] = $adminId;
        return $AdminDb->where($map)->find();
    }
    function modify($adminId, $data){
        $AdminDb = new AdminModel();
        $map['admin_id'] = $adminId;
        return $AdminDb->where($map)->save($data);
    }
}