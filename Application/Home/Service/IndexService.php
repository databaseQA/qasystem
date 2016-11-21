<?php

namespace Home\Service;

use Home\Model\UserModel;
use Home\Model\QuestionModel;
use Home\Model\AnswerModel;
use Home\Model\TypeModel;

class IndexService{
    function getQuestionType(){
        $typeDb = new TypeModel();
        return $typeDb->select();
    }
    function getQuestionList($arr = array(), $page = '', $perPage = ''){

        $questionDb = new QuestionModel();
        if(count($arr) != 0){
            $re = $questionDb
                ->field('question.q_id,question.q_title,question.q_time,question.a_num,user.user_nickname')
                ->where(searchLike($arr))
                ->limit($page.','.$perPage)
                ->join('user on user.user_id = question.user_id')
                ->order('a_num desc, q_time desc')
                ->select();
        }else{
            $re = $questionDb
                ->field('question.q_id,question.q_title,question.q_time,question.a_num,user.user_nickname')
                ->limit($page.','.$perPage)
                ->join('user on user.user_id = question.user_id')
                ->order('a_num desc, q_time desc')
                ->select();
        }
        if($re){
            return $re;
        }else{
            return false;
        }
    }
    function getNum($arr){
        $questionDb = new QuestionModel();
        return $questionDb
            ->where(searchLike($arr))
            ->count('q_id');
    }
    function getHotQuestion(){
        $questionDb = new QuestionModel();
        return $questionDb
            ->field('q_id,q_title,q_time,user_name,question.a_num')
            ->order('question.a_num desc')
            ->limit(0,5)
            ->join("user ON user.user_id = question.user_id")
            ->select();
    }
    function getNewQuestion(){
        $questionDb = new QuestionModel();
        return $questionDb
            ->field('q_id,q_title,q_time,question.a_num,user_name')
            ->order('question.q_time desc')
            ->limit(0,5)
            ->join("user ON user.user_id = question.user_id")
            ->select();
    }
}