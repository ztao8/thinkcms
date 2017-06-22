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
    <title>错误提示-管理系统</title>
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">
    <!-- Stylesheets -->
    <!-- Web fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400italic,600,700%7COpen+Sans:300,400,400italic,600,700">
    <!-- OneUI CSS framework -->
    <link rel="stylesheet" href="__STATIC__/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="__STATIC__/assets/css/core.css">
    <link rel="stylesheet" id="css-theme" href="__STATIC__/assets/css/themes/flat.min.css">
</head>
<body>
<main id="main-container" >
    <div class="content" style="max-width: 500px;">
        <div class="row">
            <div class="col-sm-12">
                <!-- Danger Alert -->
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h3 class="font-w300 push-15">{$msg|strip_tags}</h3>
                    <p class="jump">
                        页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
                    </p>
                </div>
                <!-- END Danger Alert -->
            </div>
        </div>
    </div>
</main>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>