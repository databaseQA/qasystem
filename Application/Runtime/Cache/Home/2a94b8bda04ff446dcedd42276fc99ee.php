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
                <script src="/qasystem/Public/js/html5.js"></script>
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

                <!-- Start of Search Wrapper -->
    <div class="search-area-wrapper">
        <div class="search-area container">
            <h3 class="search-header">我有疑问！</h3>
            <p class="search-tag-line">有疑问？先搜索一下再提问吧！</p>

            <form id="search-form" class="search-form clearfix" method="get" action="/qasystem/index.php/Home/Index/searchQuestion" autocomplete="off">
                <input class="search-term" type="text" id="s" name="key" placeholder="请在这里输入你的问题" />
                <input class="search-btn" type="submit" value="搜索" />
                <div id="search-error-container"></div>
            </form>
        </div>
    </div>
    <!-- End of Search Wrapper -->
                
                <!-- Start of Page Container -->
                <div class="page-container">
                        <div class="container">
                                <div class="row">
                                        <!-- start of page content -->
                                        <div class="span8 page-content">

                                                <!-- Basic Home Page Template -->
                                                <div class="row separator">
                                                        <section class="span4 articles-list">
                                                                <h3>
                                                                    <?php echo ($title[0]); ?>
                                                                </h3>
                                                                <ul class="articles">
                                                                        <?php if(is_array($hotQuestion)): $i = 0; $__LIST__ = $hotQuestion;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$question): $mod = ($i % 2 );++$i;?><li class="article-entry standard">
                                                                                        <h4><a href="/qasystem/index.php/Home/Question/getQuestion?id=<?php echo ($question["q_id"]); ?>"><?php echo ($question["q_id"]); ?></a></h4>
                                                                                        <span class="article-meta"><?php echo ($question["q_time"]); ?> By <?php echo ($question["user_name"]); ?></span>
                                                                                        <span class="like-count"><?php echo ($question["a_num"]); ?></span>
                                                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                                                        <!--<li class="article-entry standard">-->
                                                                                <!--<h4><a href="single.html">WordPress Site Maintenance</a></h4>-->
                                                                                <!--<span class="article-meta">24 Feb, 2013 in <a href="#" title="View all posts in Website Dev">Website Dev</a></span>-->
                                                                                <!--<span class="like-count">15</span>-->
                                                                        <!--</li>-->

                                                                </ul>
                                                        </section>


                                                        <section class="span4 articles-list">
                                                                <h3><?php echo ($title[1]); ?></h3>
                                                                <ul class="articles">
                                                                        <?php if(is_array($newQuestion)): $i = 0; $__LIST__ = $newQuestion;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$question): $mod = ($i % 2 );++$i;?><li class="article-entry standard">
                                                                                        <h4><a href="/qasystem/index.php/Home/Question/getQuestion?id=<?php echo ($question["q_id"]); ?>"><?php echo ($question["q_id"]); ?></a></h4>
                                                                                        <span class="article-meta"><?php echo ($question["q_time"]); ?> By <?php echo ($question["user_name"]); ?></span>
                                                                                        <span class="like-count"><?php echo ($question["a_num"]); ?></span>
                                                                                </li><?php endforeach; endif; else: echo "" ;endif; ?>

                                                                </ul>
                                                        </section>
                                                </div>
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
                <script type='text/javascript' src='/qasystem/Public/js/jquery.easing.1.3.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/prettyphoto/jquery.prettyPhoto.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jflickrfeed.js'></script>
				<script type='text/javascript' src='/qasystem/Public/js/jquery.liveSearch.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.form.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/jquery.validate.min.js'></script>
                <script type='text/javascript' src='/qasystem/Public/js/custom.js'></script>

        </body>
</html>