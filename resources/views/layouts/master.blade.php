<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>FashNow</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!--Less styles -->
   <!-- Other Less css file //different less files has different color scheam
	<link rel="stylesheet/less" type="text/css" href="themes/less/simplex.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/classified.less">
	<link rel="stylesheet/less" type="text/css" href="themes/less/amelia.less">  MOVE DOWN TO activate
	-->
	<!--<link rel="stylesheet/less" type="text/css" href="themes/less/bootshop.less">
	<script src="themes/js/less.js" type="text/javascript"></script> -->

    <!-- Library Untuk menambahkan sebuah fungsi ajax -->
	<script src="/themes/js/jquery.js" type="text/javascript"></script>
    <script src="/themes/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="/js/jquery.twbsPagination.min.js"></script>
    <script src="/js/validator.min.js"></script>
    <script type="text/javascript" src="/js/toastr.min.js"></script>
    <link href="/css/toastr.min.css" rel="stylesheet">
    <script src="/themes/js/google-code-prettify/prettify.js"></script>
    

    <script type="text/javascript">
    	 var url = "http://127.0.0.1:8000";
        </script>

<!-- Bootstrap style -->
    <link id="callCss" rel="stylesheet" href="/themes/bootshop/bootstrap.min.css" media="screen"/>
    <link href="/themes/css/base.css" rel="stylesheet" media="screen"/>
<!-- Bootstrap style responsive -->
	<link href="/themes/css/bootstrap-responsive.min.css" rel="stylesheet"/>
	<link href="/themes/css/font-awesome.css" rel="stylesheet" type="text/css">
<!-- Google-code-prettify -->
	<link href="/themes/js/google-code-prettify/prettify.css" rel="stylesheet"/>
<!-- fav and touch icons -->
    <link rel="shortcut icon" href="/themes/images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/themes/images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/themes/images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/themes/images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="/themes/images/ico/apple-touch-icon-57-precomposed.png">
    <script src="/js/item-ajax.js"></script>
	<style type="text/css" id="enject"></style>
  </head>
<body>
<div id="header">
    @include('layouts.header')
</div>


<div id="mainBody">

	@yield('content')
</div>
<div id="header">
<div class="container">
</div>
<div id="logoArea" class="navbar">
    @include('layouts.footer')
</div>
<!-- Placed at the end of the document so the pages load faster ============================================= -->
    

    
    
    
    

	<script src="/themes/js/bootshop.js"></script>
    <script src="/themes/js/jquery.lightbox-0.5.js"></script>

	<!-- Themes switcher section ============================================================================================= -->
<div id="secectionBox">
    @include('layouts.themeswitch')
</div>
<span id="themesBtn"></span>
</body>
</html>
