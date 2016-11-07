<?php

namespace Home\Service;

use Home\Model\QuestionModel;
use Home\Model\AnswerModel;

class QuestionService{
    public function getQuestion($qId) {
        $question = new QuestionModel();
        $map['q_id'] = $qId;
        $result = $question->where($map)->select();
        return $result;
    }
    
    public function askQuestion($data) {
        $question = new QuestionModel();
        $question->add($data);
    }
    
    public function deleteQuestion($qId, $userId) {
        $question = new QuestionModel();
        $answer = new AnswerModel();
        //判断是否为本人的问题
        $privilege = $question->field('q_id, user_id')->where($qId, $userId)->find();
        if($privilege) {
            $map['q_id'] = $qId;
            $result1 = $question->where($map)->delete();
            $result2 = $answer->where($map)->delete();
            if($result1 && $result2) {
                $question->commit();
                $answer->commit();
                return TRUE;
            }
            else {
                $question->rollback();
                $answer->rollback();
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }
    
    public function modifyQuestion($qId, $userId, $data) {
        $question = new QuestionModel();
        //判断是否为本人的问题
        $privilege = $question->field('q_id, user_id')->where($qId, $userId)->find();
        if($privilege) {
            $map['q_id'] = $qId;
            $result = $question->where($map)->save($data);
            return $result;
        }
        else {
            return FALSE;
        }
    }
}