<?php

namespace Admin\Controller;
use Think\Controller;
use Admin\Service\QuestionService;
require_once dirname(dirname(__FILE__)) . '/Service/QuestionService.php';
class QuestionController extends Controller {
    public function __initialize(){
        header("Content-Type: text/html; charset=utf-8");
    }

    //显示user列表
    public function index(){
        checkAdminLogin();
        $service = new QuestionService();
        //筛选的信息
        $arr = array();
        if(isset($_POST['data'])){
            $data = $_POST['data'];
            foreach($data as $key => $value){
                if(!empty($value)){
                    $arr[$key] = $value;
                }
            }
        }

        //得到记录总条数
        $count = $service->getNum($arr);

        $num = 20;//定义每一页条数
        $pageArray = page($count,$num);

        //分页后的用户表
        $questionList = $service->getQuestionList($arr, $pageArray['perPage'], $pageArray['nextPage']);
    }
    public function deleteQuestion(){
        $service = new QuestionService();
        if(IS_POST){
            $id = $_POST['q_id'];
            $re = $service->deleteQuestion($id);
            if($re){
                echo "删除问题成功";
            }
        }
    }
    public function showQuestion(){
        $questionId = $_GET['id'];
        if($questionId){
            $service = new QuestionService();
            $service->showQuestion($questionId);
        }

    }
}