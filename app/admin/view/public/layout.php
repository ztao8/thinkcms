<!DOCTYPE html>
<!--[if IE 9]>         
<html class="ie9 no-focus"> 
<![endif]-->
<!--[if gt IE 9]>
<!--> 
<html class="no-focus"> 
<!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>{block name="title"}控制面板{/block}-管理系统</title>
        <meta name="robots" content="noindex, nofollow">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
        <!-- Stylesheets -->
        <!-- Web fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
        <!-- OneUI CSS framework -->
		<link rel="stylesheet" href="__STATIC__/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="__STATIC__/assets/css/core.css">
		<link rel="stylesheet" id="css-theme" href="__STATIC__/assets/css/themes/flat.min.css">
        {block name="css"}{/block}
        <!-- END Stylesheets -->
    </head>
    <body>
        <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">

            {include file="public:sidebar" /}

            <!-- Main Container -->
            <main id="main-container">
                {block name="container"}{/block}
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                <div class="pull-right">
                    <a class="font-w600" href="javascript:void(0)" target="_blank">{$Think.config.site_name}</a> &copy; {:date('Y')}
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        {include file="public:app_modal" /}

        <script src="__STATIC__/assets/js/core/jquery.min.js"></script>
        <script src="__STATIC__/assets/js/core/bootstrap.min.js"></script>
        <script src="__STATIC__/assets/js/core/jquery.slimscroll.min.js"></script>
        <script src="__STATIC__/assets/js/core/jquery.scrollLock.min.js"></script>
        <script src="__STATIC__/assets/js/core/jquery.appear.min.js"></script>
        <script src="__STATIC__/assets/js/core/jquery.countTo.min.js"></script>
        <script src="__STATIC__/assets/js/core/jquery.placeholder.min.js"></script>
        <script src="__STATIC__/assets/js/core/js.cookie.min.js"></script>
        <script src="__STATIC__/assets/js/app.js"></script>
        <script src="__STATIC__/assets/plugins/ajaxForm.js"></script>
        <script src="__STATIC__/assets/plugins/layer/layer.js"></script>
        <script src="__STATIC__/assets/plugins/common.js"></script>
        {block name="js"}{/block}
    </body>
</html>