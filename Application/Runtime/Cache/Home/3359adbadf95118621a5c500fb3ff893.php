<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
	<head>
    	<title>KnowledgeBase</title>
    	<!-- META TAGS -->
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="shortcut icon" href="/qasystem/Public/images/favicon.png" />
        
        <!-- Style Sheet-->
        <link rel='stylesheet' id='login-css-css'  href='/qasystem/Public/css/login.css' type='text/css' media='all' />
        <link rel='stylesheet' id='bootstrap-css-css'  href='/qasystem/Public/css/bootstrap5152.css?ver=1.0' type='text/css' media='all' />
        <link rel='stylesheet' id='responsive-css-css'  href='/qasystem/Public/css/responsive5152.css?ver=1.0' type='text/css' media='all' />
        <link rel='stylesheet' id='pretty-photo-css-css'  href='/qasystem/Public/js/prettyphoto/prettyPhotoaeb9.css?ver=3.1.4' type='text/css' media='all' />
        <link rel='stylesheet' id='main-css-css'  href='/qasystem/Public/css/main5152.css?ver=1.0' type='text/css' media='all' />
        <!--<link rel='stylesheet' id='custom-css-css'  href='/qasystem/Public/css/custom5152.html?ver=1.0' type='text/css' media='all' />-->
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
        <div id="main-wrapper">
        		<!-- start of page content -->
                <div id="page-content">
                    <a href="/qasystem/index.php/Home"><img src="/qasystem/Public/images/logo.png" /></a>
                    <div class="link">
                    	<a href="<?php echo U('User/login');?>">登录</a>
                    	<a href="<?php echo U('User/register');?>" class="active">注册</a>
                    </div>
                    <form class="login-form" action="/qasystem/index.php/Home/User/doRegister" method="post">
                    	<div>
                        	<input type="text" name="username" id="username" placeholder="用户名" />
                        </div>
                        <div>
                        	<input type="password" name="password" id="password" placeholder="密码" />
                        </div>
                        <div>
                        	<input type="submit" name="submit" value="注册" class="btn btn-inverse" />
                        </div>
                    </form>
                </div>
                <!-- end of page content -->
        </div>
        <!-- End of Page Container -->

                <!--<a href="#top" id="scroll-top"></a>

                 script 
                <script type='text/javascript' src='/qasystem/Public/js/jquery-1.8.3.min.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.easing.1.34e44.js?ver=1.3'></script>
                <script type='text/javascript' src='/qasystem/Public/js/prettyphoto/jquery.prettyPhotoaeb9.js?ver=3.1.4'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.liveSearchd5f7.js?ver=2.0'></script>
				<script type='text/javascript' src='/qasystem/Public/js/jflickrfeed.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.formd471.js?ver=3.18'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.validate.minfc6b.js?ver=1.10.0'></script>
                <script type='text/javascript' src='/qasystem/Public/js/custom5152.js?ver=1.0'></script>-->

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
                
        </body>
</html>