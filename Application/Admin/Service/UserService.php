<?php

namespace Admin\Service;
use Admin\Model\UserModel;
use Admin\Model\QuestionModel;
use Admin\Model\AnswerModel;
class UserService{
    function getNum(){
        $userDb = new UserModel();
        return $userDb->count('user_id');
    }
    function getUserLIst($page = '', $perPage = ''){
        $userDb = new UserModel();
        return $userDb->limit($page.','.$perPage)->order('user_name')->select();
    }
    function deleteUser($userId){
        $userDb = new UserModel();
        $map['user_id'] = $userId;
        return $userDb->where($map)->delete();
    }
}