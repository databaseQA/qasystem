<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\QuestionService;

require_once dirname(dirname(__FILE__)) . '/Service/QuestionService.php';

class QuestionController extends Controller {
    public function __initialize() {
        header("Content-Type: text/html; charset=utf-8");
    }
    
    public function index(){
        checkUserLogin();
    }
    
    public function askQuestion() {
        $data = array(
            "user_id" => session('user')['user_id'],
            "type_id" => $_GET['type'],
            "q_title" => $_GET['title'],
            "q_content" => $_GET['content'],
            "q_time" => date("Y-m-d H:i:s")
        );
        $question = new QuestionService();
        $question->askQuestion($data);
    }
    
    public function deleteQuestion() {
        $this->display();
        if(isset($_POST['yes'])) {
            $qId = $_GET['id'];
            $question = new QuestionService();
            $result = $question->deleteQuestion($qId, session('user')['user_id']);
            if($result) {
                echo "<script>alert('删除问题成功！')</script>";
            }
            else {
                echo "<script>alert('删除问题失败！')</script>";
            }
        }
    }
    
    public function modifyQuestion() {
        $data = array(
            "type_id" => $_GET['type'],
            "q_title" => $_GET['title'],
            "q_content" => $_GET['content'],
            "q_time" => date("Y-m-d H:i:s")
        );
        if(isset($_POST['submit'])) {
            $qId = $_GET['id'];
            $question = new QuestionService();
            $result = $question->modifyQuestion($qId, session('user')['user_id'], $data);
            if($result) {
                echo "<script>alert('修改问题成功！')</script>";
            }
            else {
                echo "<script>alert('修改问题失败！')</script>";
            }
        }
    }
}