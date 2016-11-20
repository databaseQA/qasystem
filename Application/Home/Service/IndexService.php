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
    function search($key){
        $questionDb = new QuestionModel();
        $map['q_title'] = array('like', '%'.$key.'%');
        $map['q_content'] = array('like', '%'.$key.'%');
        $map['_logic'] = 'or';
        return $questionDb
            ->field('question.q_id,question.q_title,question.q_time,question.a_num,user.user_nickname')
            ->where($map)
            ->join('user on user.user_id = question.user_id')
            ->select();
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