<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\AnswerService;

require_once dirname(dirname(__FILE__)) . '/Service/AnswerService.php';

class AnswerController extends Controller {
    public function __initialize() {
        header("Content-Type: text/html; charset=utf-8");
    }
    
    public function index(){
        checkUserLogin();
    }
    /*
    public function answerQuestion() {
        $data = array(
            "q_id" => $_GET['id'],
            "user_id" => session('user')['user_id'],
            "a_content" => $_GET['content'],
            "a_time" => date("Y-m-d H:i:s")
        );
        $answer = new AnswerService();
        $answer->answerQuestion($data);
    }
    */
    public function deleteAnswer() {
        $this->display();
        if(isset($_POST['yes'])) {
            $aId = $_GET['id'];
            $answer = new AnswerService();
            $result = $answer->deleteAnswer($aId, session('user')['user_id']);
            if($result) {
                echo "<script>alert('删除答案成功！')</script>";
            }
            else {
                echo "<script>alert('删除答案失败！')</script>";
            }
        }
    }
    
    public function modifyAnswer() {
        $data = array(
            "a_content" => $_GET['content'],
            "a_time" => date("Y-m-d H:i:s")
        );
        if(isset($_POST['submit'])) {
            $aId = $_GET['id'];
            $answer = new AnswerService();
            $result = $answer->modifyAnswer($aId, session('user')['user_id'], $data);
            if($result) {
                echo "<script>alert('修改答案成功！')</script>";
            }
            else {
                echo "<script>alert('修改答案失败！')</script>";
            }
        }
    }
}