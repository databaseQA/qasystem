<?php

namespace Admin\Service;
use Admin\Model\UserModel;
use Admin\Model\QuestionModel;
use Admin\Model\AnswerModel;
class QuestionService{
    function getNum($arr = array()){
        $questionDb = new QuestionModel();
        if(count($arr) != 0){
            return $questionDb->where(searchLike($arr))->count('q_id');
        }
        return $questionDb->count('q_id');
    }
    function getQuestionList($arr = array(), $page = '', $perPage = ''){
        $questionDb = new QuestionModel();
        if(count($arr) != 0){
            $re = $questionDb->where(searchLike($arr))->limit($page.','.$perPage)->order('q_time')->select();
        }else{
            $re = $questionDb->limit($page.','.$perPage)->order('q_time')->select();
        }
        if($re){
            return $re;
        }else{
            return false;
        }
    }
    function deleteQuestion($id){
        $questionDb = new QuestionModel();
        $answerDb = new AnswerModel();
        $map['q_id'] = $id;
        $re1 = $answerDb->where($map)->delete();

        $re2 = $questionDb->where($map)->delete();

        if($re1 && $re2){
            $answerDb->commit();
            $questionDb->commit();
            return true;
        }else{
            $answerDb->rollback();
            $questionDb->rollback();
            return false;
        }
    }
    function showQuestion($id){
        $map['q_id'] = $id;
        $questionDb = new QuestionModel();
        $answerDb = new AnswerModel();
        $arr = array();
        $arr['question'] = $questionDb->where($map)->find();
        $arr['answer'] = $answerDb->field('answer.*, user.user_name, user.user_nickname')->
                            where($map)->join('user ON user.user_id = answer.user_id')->select();
    }
}