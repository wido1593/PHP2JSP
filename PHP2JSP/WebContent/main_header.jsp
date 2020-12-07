<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
    <title>Welcome to vist AppleTour</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alex+Brush" rel="stylesheet">

    <link rel="stylesheet" href="my/usercss/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="my/usercss/animate.css">

   
    <link rel="stylesheet" href="my/usercss/owl.carousel.min.css">
    <link rel="stylesheet" href="my/usercss/owl.theme.default.min.css">
    <link rel="stylesheet" href="my/usercss/magnific-popup.css">

    <link rel="stylesheet" href="my/usercss/aos.css">

    <link rel="stylesheet" href="my/usercss/ionicons.min.css">

    <link rel="stylesheet" href="my/usercss/bootstrap-datepicker.css">
    <link rel="stylesheet" href="my/usercss/jquery.timepicker.css">

    
    <link rel="stylesheet" href="my/usercss/flaticon.css">
    <link rel="stylesheet" href="my/usercss/icomoon.css">
    <link rel="stylesheet" href="my/usercss/style.css?ver=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="icon" type="image/png" href="my/images/favicon_96x96.png" size="96x96">
	<link rel="icon" type="image/png" href="my/images/favicon_32x32.png" size="32x32">
	<link rel="icon" type="image/png" href="my/images/favicon_16x16.png" size="16x16">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>


  <script>

function active1(){
	var afterStr = location.pathname.split('/');
	alert(afterStr[2]);
	}
function bookmarksite(title,url) {
   // Internet Explorer

   if(document.all){
       window.external.AddFavorite(url, title);
   }
   // Google Chrome
   else if(window.chrome) {
      alert("Ctrl+D키를 누르시면 즐겨찾기에 추가하실 수 있습니다.(chrome한정)");
   }
   // Firefox
   else if (window.sidebar) {
       window.sidebar.addPanel(title, url, "");
   }
   // Opera
   else if(window.opera && window.print) {
      var elem = document.createElement('a');
      elem.setAttribute('href',url);
      elem.setAttribute('title',title);
      elem.setAttribute('rel','sidebar');
      elem.click();
   }
}

$(function(){
    
   $('ul li a').click(function(){
      var item=$(this).parent();

       item.addClass("active")
    });
       
});
</script>


<style type="text/css">
    body {
		font-family: 'Varela Round', sans-serif;
	}
	.modal-login {		
		color: #636363;
		width: 350px;
	}
	.modal-login .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
	}
	.modal-login .modal-header {
		border-bottom: none;   
        position: relative;
        justify-content: center;
	}
	.modal-login h4 {
		text-align: center;
		font-size: 26px;
		margin: 30px 0 -15px;
	}
	.modal-login .form-control:focus {
		border-color: #70c5c0;
	}
	.modal-login .form-control, .modal-login .btn {
		min-height: 40px;
		border-radius: 3px; 
	}
	.modal-login .close {
        position: absolute;
		top: -5px;
		right: -5px;
	}	
	.modal-login .modal-footer {
		background: #ecf0f1;
		border-color: #dee4e7;
		text-align: center;
        justify-content: center;
		margin: 0 -20px -20px;
		border-radius: 5px;
		font-size: 13px;
	}
	.modal-login .modal-footer a {
		color: #999;
	}		
	.modal-login .avatar {
		position: absolute;
		margin: 0 auto;
		left: 0;
		right: 0;
		top: -70px;
		width: 95px;
		height: 95px;
		border-radius: 50%;
		z-index: 9;
		background: #fff;
		padding: 15px;
		box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
	}
	.modal-login .avatar img {
		width: 100%;
	}
	.modal-login.modal-dialog {
		margin-top: 80px;
	}
    .modal-login .btn {
        color: #fff;
        border-radius: 4px;
		background: #f85959;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
        border: none;
    }
	.modal-login .btn:hover, .modal-login .btn:focus {
		background: #FFF;
		outline: none;
	}
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>


  <body>
  
   <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="../../main"><i class="fab fa-apple">&nbsp</i>AppleTour</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="../../main" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="../../about" class="nav-link">About</a></li>
		  <li class="nav-item"><a href="../../country" class="nav-link">Country</a></li>
					
		<li class="nav-item"><a href="product_list.do" class="nav-link">Package</a></li>
        <!--- <li class="nav-item"><a href="tour.html" class="nav-link">Tour</a></li> -->
          <li class="nav-item"><a href="FreeTravel" class="nav-link">Free Travel</a></li>
          <li class="nav-item"><a href="../../hotel" class="nav-link">Hotel</a></li>
	
<?

	if (!$this->session->userdata('id'))
		echo("<li class='nav-item'><a href='../../signup' class='nav-link'>Sign Up</a></li>
		<li class='nav-item'><a href='#exampleModal' data-toggle='modal' class='nav-link'>LogIn</a></li>

		");
	else
		if($this->session->userdata('rank')==1)
			echo("<li class='nav-item'><a href='../../mypage/view' class='nav-link'>Mypage</a><li class='nav-item'><a href='../../admin' class='nav-link'>Admin</a><li class='nav-item'><a href='../../login/logout' class='nav-link'>Logout</a>
			");
		else
			echo("<li class='nav-item'><a href='../../mypage/view' class='nav-link'>Mypage</a><li class='nav-item'><a href='../../login/logout' class='nav-link'>Logout</a>
			");

	
		
?> 

          <li class="nav-item cta"><a href="javascript:bookmarksite('AppleTour', 'http://gamejigix.induk.ac.kr../../main')"class="nav-link"><span>Bookmark</span></a></li>
        </ul>

      </div>
    </div>

  </nav>


    <!-- END nav -->