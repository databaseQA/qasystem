<?php

namespace Home\Service;

use Home\Model\QuestionModel;
use Home\Model\AnswerModel;

class AnswerService{
    public function getAnswer($aId) {
        $answer = new AnswerModel();
        $map['a_id'] = $aId;
        $result = $answer->where($map)->select();
        return $result;
    }
    
    public function answerQuestion($data) {
        $answer = new AnswerModel();
        $aId = $data['a_id'];
        $result1 = $answer->add($data);
        $result2 = $this->updateQState($aId);
        if($result1 && $result2) {
            $answer->commit();
            $this->updateQState($aId);
            return TRUE;
        }
        else {
            $answer->rollback();
            $this->updateQState($aId);
            return FALSE;
        }
    }
    
    public function deleteAnswer($aId, $userId) {
        $answer = new AnswerModel();
        //判断是否为本人的答案
        $privilege = $answer->field('a_id, user_id')->where($aId, $userId)->find();
        if($privilege) {
            $map['a_id'] = $aId;
            $result1 = $answer->where($map)->delete();
            $result2 = $this->updateQState($aId);
            if($result1 && $result2) {
                $answer->commit();
                $this->updateQState($aId);
                return TRUE;
            }
            else {
                $answer->rollback();
                $this->updateQState($aId);
                return FALSE;
            }
        }
        else {
            return FALSE;
        }
    }
    
    public function modifyAnswer($aId, $userId, $data) {
        $answer = new AnswerModel();
        //判断是否为本人的答案
        $privilege = $answer->field('a_id, user_id')->where($aId, $userId)->find();
        if($privilege) {
            $map['a_id'] = $aId;
            $result = $answer->where($map)->save($data);
            return $result;
        }
        else {
            return FALSE;
        }
    }
    
    public function updateQState($aId) {
        $answer = new AnswerModel();
        $question = new QuestionModel();
        $qId = $answer->field('q_id')->where("a_id='$aId'")->select();
        $aNum = $question->field('a_num')->where("q_id='$qId'")->select();
        if($aNum == 0) {
            $result = $question->where("q_id='$qId'")->setField('q_state', '未解决');
        }
        else {
            $result = $question->where("q_id='$qId'")->setField('q_state', '已解决');
        }
        return $result;
    }
}