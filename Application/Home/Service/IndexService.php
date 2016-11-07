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
        return $questionDb->where($map)->select();
    }
}