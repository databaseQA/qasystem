<?php

namespace Home\Service;

use Home\Model\UserModel;

class UserService{
    public function register($data) {
        $user = new UserModel();
        $result = $user->add($data);
        return $result;
    }
    
    public function login($data) {
        $user = new UserModel();
        $result = $user->field('user_name, user_id')->where($data)->find();
        return $result;
    }
    
    function getUserDetail($userId){
        $user = new UserModel();
        $map['user_id'] = $userId;
        $result = $user->where($map)->select();
        return $result;
    }
    
    public function modify($userId, $data) {
        $user = new UserModel();
        $map['user_id'] = $userId;
        $result = $user->where($map)->save($data);
        return $result;
    }
    
    public function deleteUser($userId) {
        $user = new UserModel();
        $map['user_id'] = $userId;
        $data['user_name'] = "用户已注销";
        $data['user_pwd'] = '00000000000000000000';
        $data['user_nickname'] = $data['user_gender'] = $data['user_email'] = NULL;
        $data['q_num'] = 0;
        $data['a_num'] = 0;
        $result = $user->delete();
        return $result;
    }
}