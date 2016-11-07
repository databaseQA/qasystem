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

        $this->display();
    }
    public function getQuestionType(){
        $service = new IndexService();
        $questionType = $service->getQuestionType();
        $this->assign('type', $questionType);
    }
    public function searchQuestion(){
        $key = $_GET['key'];
        if(!empty($key)) {
            $this->assign('title', '搜索结果');
            $service = new IndexService();
            $questionList = $service->search($key);
            $this->assign('questions',$questionList);
        }


    }
}