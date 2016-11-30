<?php

namespace Home\Controller;

use Think\Controller;
use Home\Service\IndexService;

require_once dirname(dirname(__FILE__)) . '/Service/IndexService.php';

class IndexController extends Controller {
    public function _initialize() {
        header("Content-Type: text/html; charset=utf-8");
        $this->getQuestionType();
    }
    public function index(){


        $title = array('最热提问','最新提问');
        $this->assign('title', $title);
        $this->assign('hotQuestion', $this->getHotQuestion());
        $this->assign('newQuestion', $this->getNewQuestion());
        $this->display();
    }
    public function getQuestionType(){
        $service = new IndexService();
        $questionType = $service->getQuestionType();
        $this->assign('type', $questionType);
    }
    public function searchQuestion(){

        if(!empty($_GET['key'])){
            $key = $_GET['key'];
        }else{
            $key = '';
        }
        $arr = array(
            'q_title' => $key,
            'q_content' => $key
        );

        $this->assign('title', '搜索结果');
        $service = new IndexService();


        //得到记录总条数
        $count = $service->getNum($arr);
        $num = 1;//定义每一页条数
        $pageArray = page($count,$num);
        //分页后的用户表
        $questionList = $service->getQuestionList($arr, $pageArray['perPage'], $pageArray['nextPage']);

        $this->assign('questions',$questionList);
        $this->assign('page', $pageArray['page']);
        $this->assign('keyword', $key);
        $this->display('questionList');

    }
    
    private function getHotQuestion(){
        $service = new IndexService();
        $hotQuestion = $service->getHotQuestion();
        return $hotQuestion;
    }

    private function getNewQuestion(){
        $service = new IndexService();
        $newQuestions = $service->getNewQuestion();
        return $newQuestions;
    }
    
    public function contact() {
        checkUserLogin();
        $this->display();
    }
}