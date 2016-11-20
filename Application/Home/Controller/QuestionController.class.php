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
        $this->display();
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
//    得到问题的详细内容
    public function getQuestion(){
        $id = $_GET['id'];
        if($id){
            $service = new QuestionService();
            $result = $service->getQuestion($id);

            $this->assign('question', $result['question']);

            $this->assign('answers', $result['answer']);
        }
        $this->display('question');
    }
    public function addLike(){
        $a_id = $_POST['id'];
        $service = new QuestionService();
        $service->addLike($a_id);
    }
    public function answerQuestion(){
        checkUserLogin();
        $data = array(
            'q_id' => $_POST['q_id'],
            'user_id' => session('user.user_id'),
            'a_content' => $_POST['answer'],
            'a_time' => date("Y-m-d H:i:s")
        );
        $service = new QuestionService();
        $re = $service->answerQuestion($data);
        if($re){
            $this->ajaxReturn(array('code' => 1, 'msg' => 'success'));
        }else{
            $this->ajaxReturn(array('code' => 0, 'msg' => 'fail'));
        }
    }
}