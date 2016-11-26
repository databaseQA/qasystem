<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
        <!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
        <!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
        <!--[if IE 8]>    <html class="lt-ie9" lang="en-US"> <![endif]-->
        <!--[if gt IE 8]><!--> <html lang="en-US"> <!--<![endif]-->
        <head>
                <!-- META TAGS -->
                <meta charset="UTF-8" />
                <meta name="viewport" content="width=device-width, initial-scale=1.0">

                <title>KnowledgeBase</title>

                <link rel="shortcut icon" href="/qasystem/Public/images/favicon.png" />
                
                <!-- Style Sheet-->
                <link rel='stylesheet' id='bootstrap-css-css'  href='/qasystem/Public/css/bootstrap5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='responsive-css-css'  href='/qasystem/Public/css/responsive5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='pretty-photo-css-css'  href='/qasystem/Public/js/prettyphoto/prettyPhotoaeb9.css?ver=3.1.4' type='text/css' media='all' />
                <link rel='stylesheet' id='main-css-css'  href='/qasystem/Public/css/main5152.css?ver=1.0' type='text/css' media='all' />
                <link rel='stylesheet' id='custom-css-css'  href='/qasystem/Public/css/custom5152.html?ver=1.0' type='text/css' media='all' />


                <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
                <!--[if lt IE 9]>
                <script src="js/html5.js"></script></script>
                <![endif]-->

        </head>

        <body>
            <!-- Start of Header -->
<div class="header-wrapper">
    <header>
        <div class="container">
            <div class="logo-container">
                <!-- Website Logo -->
                <a href="/qasystem/index.php/Home/Index"  title="KnowledgeBase">
                    <img src="/qasystem/Public/images/logo.png" alt="KnowledgeBase">
                </a>
                <!--<span class="tag-line">Premium WordPress Theme</span>-->
            </div>
            
            <!-- Start of Main Navigation -->
            <nav class="main-nav">
                <div class="menu-top-menu-container">
                    <ul id="menu-top-menu" class="clearfix">
                        <li class="current-menu-item"><a href="<?php echo U('Index/index');?>">主页</a></li>
                        <!--<li><a href="home-categories-articles.html">Home 3</a></li>-->
                        <!--<li><a href="articles-list.html">Articles List</a></li>-->
                        <!--<li><a href="faq.html">FAQs</a></li>-->
                        <li><a href="<?php echo U('Question/index');?>">提问</a>
                            <ul class="sub-menu">
                                <?php if(is_array($type)): $i = 0; $__LIST__ = $type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$questionType): $mod = ($i % 2 );++$i;?><li><a href="/qasystem/index.php/Home/Question?type=<?php echo ($questionType["type_id"]); ?>"><?php echo ($questionType["type_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                                
                                <!--<li><a href="green-skin.html">Green Skin</a></li>-->
                                <!--<li><a href="red-skin.html">Red Skin</a></li>-->
                                <!--<li><a href="index-2.html">Default Skin</a></li>-->
                                
                            </ul>
                        </li>
                        
                        <!--<li><a href="#">More</a>-->
                        <!--<ul class="sub-menu">-->
                        <!--<li><a href="full-width.html">Full Width</a></li>-->
                        <!--<li><a href="elements.html">Elements</a></li>-->
                        <!--<li><a href="page.html">Sample Page</a></li>-->
                        <!--</ul>-->
                        <!--</li>-->
                        
                        <li><a href="<?php echo U('Index/contact');?>">联系我们</a></li>
                    </ul>
                </div>
            </nav>

            <div class="login">
                <?php if(session('user.user_name') != ''): ?><a href="/qasystem/index.php/Home/User/index"><?php echo session('user.user_name');?></a>
                    |
                    <a href="/qasystem/index.php/Home/User/logout">退出登录</a>
                <?php else: ?>
                    <a href="<?php echo U('User/login');?>">登录</a>
                    |
                    <a href="<?php echo U('User/register');?>">注册</a><?php endif; ?>



            </div>
            <!-- End of Main Navigation -->

        </div>
    </header>
</div>
<!-- End of Header -->

                <!-- Start of Page Container -->
                <div class="page-container">
                        <div class="container">
                                <div class="row">

                                        <!-- start of page content -->
                                        <div class="span8 page-content">

                                                <article class="type-page hentry clearfix">
                                                        <h1 class="post-title">
                                                                我的个人信息
                                                        </h1>
                                                        <hr>
                                                </article>


                                                <form id="contact-form" class="row" action="" method="post">

                                                        <div class="span2">
                                                                <label for="name">用户名</label>
                                                        </div>
                                                        <div class="span6" style="height:40px">
                                                                <?php echo session('user.user_name');?>
                                                        </div>
                                                        
                                                        <div class="span2">
                                                                <label for="name">昵称</label>
                                                        </div>
                                                        <div class="span6" style="height:40px">
                                                                <?php echo ($data["user_nickname"]); ?>
                                                        </div>
                                                    
                                                        <div class="span2">
                                                                <label for="name">性别</label>
                                                        </div>
                                                        <div class="span6" style="height:40px">
                                                                <?php echo ($data["user_gender"]); ?>
                                                                <input type="radio" name="gender" id="gender" class="required input-xlarge" value="M" title="" style="height:40px; margin-top:-0px; margin-bottom:5px">
                                                                <font style="margin-right:120px">男</font>
                                                                <input type="radio" name="gender" id="gender" class="required input-xlarge" value="F" title="" style="height:40px; margin-top:-0px; margin-bottom:5px">
                                                                <font style="margin-right:120px">女</font>
                                                        </div>
                                                    
                                                        <div class="span2">
                                                                <label for="name">邮箱</label>
                                                        </div>
                                                        <div class="span6" style="height:40px">
                                                                <?php echo ($data["user_email"]); ?>
                                                        </div>

                                                        <div class="span2">
                                                                <label for="message">个人简介</label>
                                                        </div>
                                                        <div class="span6" style="height:40px">
                                                                <?php echo ($data["user_intro"]); ?>
                                                        </div>

                                                        <div class="span6 offset2 bm30">
                                                                <input type="button" onClick="javascrtpt:window.location.href='/qasystem/index.php/Home/User/modify'" name="modify" value="修改个人信息" class="btn btn-inverse">
                                                                <input type="button" onClick="javascrtpt:window.location.href='/qasystem/index.php/Home/User/modifyPwd'" name="modify" value="修改密码" class="btn btn-inverse">
                                                        </div>

                                                        <div class="span6 offset2 error-container"></div>
                                                        <div class="span8 offset2" id="message-sent"></div>

                                                </form>
                                        </div>
                                        <!-- end of page content -->


                                        <!-- start of sidebar -->
<aside class="span4 page-sidebar">
    <section class="widget">
        <div class="support-widget">
            <h3 class="title">Support</h3>
            <p class="intro">Need more support? If you did not found an answer, contact us for further help.</p>
        </div>
    </section>
    <section class="widget">
        <div class="quick-links-widget">
            <h3 class="title">快速导航</h3>
            <ul id="menu-quick-links" class="menu clearfix">
                <li><a href="<?php echo U('Index/index');?>">主页</a></li>
                <li><a href="<?php echo U('Question/index');?>">提问</a></li>
                <li><a href="<?php echo U('Answer/answerQuestion');?>">回答</a></li>
                <li><a href="<?php echo U('Index/contact');?>">联系我们</a></li>
            </ul>
        </div>
    </section>
    <section class="widget">
        <h3 class="title">Tags</h3>
        <div class="tagcloud">
            <a href="#" class="btn btn-mini">basic</a>
            <a href="#" class="btn btn-mini">beginner</a>
            <a href="#" class="btn btn-mini">blogging</a>
            <a href="#" class="btn btn-mini">colour</a>
            <a href="#" class="btn btn-mini">css</a>
            <a href="#" class="btn btn-mini">date</a>
            <a href="#" class="btn btn-mini">design</a>
            <a href="#" class="btn btn-mini">files</a>
            <a href="#" class="btn btn-mini">format</a>
            <a href="#" class="btn btn-mini">header</a>
            <a href="#" class="btn btn-mini">images</a>
            <a href="#" class="btn btn-mini">plugins</a>
            <a href="#" class="btn btn-mini">setting</a>
            <a href="#" class="btn btn-mini">templates</a>
            <a href="#" class="btn btn-mini">theme</a>
            <a href="#" class="btn btn-mini">time</a>
            <a href="#" class="btn btn-mini">videos</a>
            <a href="#" class="btn btn-mini">website</a>
            <a href="#" class="btn btn-mini">wordpress</a>
        </div>
    </section>
</aside>
<!-- end of sidebar -->
                                </div>
                        </div>
                </div>
                <!-- End of Page Container -->

                <!-- Start of Footer -->
<footer id="footer-wrapper">
    <!-- Footer Bottom -->
    <div id="footer-bottom-wrapper">
        <div id="footer-bottom" class="container">
            <div class="row">
                <div class="span6">
                    <p class="copyright">
                        Copyright © 2016. All Rights Reserved by ali & Rainie.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Footer Bottom -->
</footer>
<!-- End of Footer -->

                <a href="#top" id="scroll-top"></a>

                <!-- script -->
                <script type='text/javascript' src='/qasystem/Public/js/jquery-1.8.3.min.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.easing.1.34e44.js?ver=1.3'></script>
                <script type='text/javascript' src='/qasystem/Public/js/prettyphoto/jquery.prettyPhotoaeb9.js?ver=3.1.4'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.liveSearchd5f7.js?ver=2.0'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jflickrfeed.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.formd471.js?ver=3.18'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.validate.minfc6b.js?ver=1.10.0'></script>
                <script type='text/javascript' src='/qasystem/Public/js/custom5152.js?ver=1.0'></script>

        </body>
</html>