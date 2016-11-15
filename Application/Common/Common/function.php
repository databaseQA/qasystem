<?php

function sendEmail($email ,$yzm){
    vendor('phpmailer.class#phpmailer');
    try {
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码
        $mail->SMTPAuth   = true;                  //开启认证
        $mail->Port       = 25;
        $mail->Host       = "smtp.126.com";
        $mail->Username   = "weixinyizhan";
        $mail->Password   = "wxyz2015";
        //$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could  not execute: /var/qmail/bin/sendmail ”的错误提示
        $mail->AddReplyTo("weixinyizhan@126.com","mckee");//回复地址
        $mail->From       = "weixinyizhan@126.com";
        $mail->FromName   = "去吧二货";
        $to = $email;
        $mail->AddAddress($to);
        $mail->Subject  = "二货注册验证码";
        $mail->Body = "欢迎使用二货二手交易网站，验证码是:".$yzm;
        $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
        $mail->WordWrap   = 80; // 设置每行字符串的长度
        //$mail->AddAttachment("f:/test.png");  //可以添加附件
        $mail->IsHTML(true);
        $mail->Send();
        echo '邮件已发送';
    } catch (phpmailerException $e) {
        echo "邮件发送失败：".$e->errorMessage();
    }
}
function page($count,$num){
    $Page = new  \Think\Page($count, $num);// 实例化分页类 传入总记录数
    $Page->lastSuffix=false;//最后一页是否显示总记录条数
//    $Page->setConfig('header','<li class="rows">共<b>%TOTAL_ROW%</b>条记录  每页<b>'.$num.'</b>条  第<b>%NOW_PAGE%</b>页/共<b>%TOTAL_PAGE%</b>页</li>');
    $Page->setConfig('prev','上一页');
    $Page->setConfig('next','下一页');
    $Page->setConfig('last','末页');
    $Page->setConfig('first','首页');
    $Page->setConfig('theme','%FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
    $show = $Page->show();
    $array = array(
        "page" => $show,
        "perPage" => $Page->firstRow,
        "nextPage" => $Page->listRows,
    );
    return $array;
}
function checkAdminLogin(){
    if(session('admin')['admin_name'] == null){
        $this->redirect('Index/index');
    }
}
function checkUserLogin() {
    if(session('user')['user_name'] == NULL) {
        echo "<script>alert('请先登录！')</script>";
        redirect('../User/login');
    }
}
//把搜索筛选的信息封装
function searchLike($arr){
    $map = array();
    foreach($arr as $key => $value){
        $map[$key] = array('like','%'.$value.'%');
    }
    return $map;
}
