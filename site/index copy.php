<?php require_once('Connections/conn92ID.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_rsEquipe = 3;
$pageNum_rsEquipe = 0;
if (isset($_GET['pageNum_rsEquipe'])) {
  $pageNum_rsEquipe = $_GET['pageNum_rsEquipe'];
}
$startRow_rsEquipe = $pageNum_rsEquipe * $maxRows_rsEquipe;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsEquipe = "SELECT * FROM tb_equipe WHERE EQP_STATUS = 1";
$query_limit_rsEquipe = sprintf("%s LIMIT %d, %d", $query_rsEquipe, $startRow_rsEquipe, $maxRows_rsEquipe);
$rsEquipe = mysql_query($query_limit_rsEquipe, $conn92ID) or die(mysql_error());
$row_rsEquipe = mysql_fetch_assoc($rsEquipe);

if (isset($_GET['totalRows_rsEquipe'])) {
  $totalRows_rsEquipe = $_GET['totalRows_rsEquipe'];
} else {
  $all_rsEquipe = mysql_query($query_rsEquipe);
  $totalRows_rsEquipe = mysql_num_rows($all_rsEquipe);
}
$totalPages_rsEquipe = ceil($totalRows_rsEquipe/$maxRows_rsEquipe)-1;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsConvenios = "SELECT * FROM tb_convenios WHERE CONV_STATUS = 1";
$rsConvenios = mysql_query($query_rsConvenios, $conn92ID) or die(mysql_error());
$row_rsConvenios = mysql_fetch_assoc($rsConvenios);
$totalRows_rsConvenios = mysql_num_rows($rsConvenios);

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsUnidades = "SELECT * FROM tb_lojas WHERE LOJ_STATUS = 1";
$rsUnidades = mysql_query($query_rsUnidades, $conn92ID) or die(mysql_error());
$row_rsUnidades = mysql_fetch_assoc($rsUnidades);
$totalRows_rsUnidades = mysql_num_rows($rsUnidades);

$maxRows_rsDepomeimentos = 10;
$pageNum_rsDepomeimentos = 0;
if (isset($_GET['pageNum_rsDepomeimentos'])) {
  $pageNum_rsDepomeimentos = $_GET['pageNum_rsDepomeimentos'];
}
$startRow_rsDepomeimentos = $pageNum_rsDepomeimentos * $maxRows_rsDepomeimentos;

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsDepomeimentos = "SELECT * FROM tb_depoimentos WHERE DEP_STATUS = 1";
$query_limit_rsDepomeimentos = sprintf("%s LIMIT %d, %d", $query_rsDepomeimentos, $startRow_rsDepomeimentos, $maxRows_rsDepomeimentos);
$rsDepomeimentos = mysql_query($query_limit_rsDepomeimentos, $conn92ID) or die(mysql_error());
$row_rsDepomeimentos = mysql_fetch_assoc($rsDepomeimentos);

if (isset($_GET['totalRows_rsDepomeimentos'])) {
  $totalRows_rsDepomeimentos = $_GET['totalRows_rsDepomeimentos'];
} else {
  $all_rsDepomeimentos = mysql_query($query_rsDepomeimentos);
  $totalRows_rsDepomeimentos = mysql_num_rows($all_rsDepomeimentos);
}
$totalPages_rsDepomeimentos = ceil($totalRows_rsDepomeimentos/$maxRows_rsDepomeimentos)-1;
?>
<!DOCTYPE html>
<html>
<head>

<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="robots" content="index, follow">
<meta name="description" content="O melhor e mais completo servi‡ßos laboratoriais de Manaus.">
<meta name="keywords" content="laboratÛrio, laboratÛrios, exames, m‡©dicos, cl‡≠nicas, sa‡∫de, hospitais, medicina, manaus, amazonas">
<meta name="author" content="92dpi.ag">

<title>CDL LaboratÛrios Santos e Vidal - Manaus / Amazonas</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="content/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet"> 

<!-- Plugins -->
<link rel="stylesheet" href="content/assets/vendor/swiper/css/swiper.min.css">
<link rel="stylesheet" href="content/assets/vendor/hamburgers/hamburgers.min.css" type="text/css">
<link rel="stylesheet" href="content/assets/vendor/animate/animate.min.css" type="text/css">
<link rel="stylesheet" href="content/assets/vendor/fancybox/css/jquery.fancybox.min.css">

<!-- Icons -->
<link rel="stylesheet" href="content/assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/ionicons/css/ionicons.min.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/line-icons/line-icons.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/line-icons-pro/line-icons-pro.css" type="text/css">

<!-- Linea Icons -->
<link rel="stylesheet" href="content/assets/fonts/linea/arrows/linea-icons.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/linea/basic/linea-icons.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/linea/ecommerce/linea-icons.css" type="text/css">
<link rel="stylesheet" href="content/assets/fonts/linea/software/linea-icons.css" type="text/css">

<!-- Global style (main) -->
<link id="stylesheet" type="text/css" href="content/assets/css/boomerang.min.css" rel="stylesheet" media="screen">

<!-- Custom style - Remove if not necessary -->
<link type="text/css" href="content/assets/css/custom-style.css" rel="stylesheet">

<!-- Favicon -->
<link href="content/assets/images/favicon.png" rel="icon" type="image/png">


</head>
<body>


<!-- MAIN WRAPPER -->
<div class="body-wrap">
    <div id="st-container" class="st-container">

        <nav class="st-menu st-effect-1" id="menu-1">
    <div class="st-profile">
        <div class="st-profile-user-wrapper">
            <div class="profile-user-image">
                <img src="content/assets/images/prv/people/person-1.jpg" class="img-circle" />
            </div>
            <div class="profile-user-info">
                <span class="profile-user-name">Bertram Ozzie</span>
                <span class="profile-user-email">username@example.com</span>
            </div>
        </div>
    </div>

    <div class="st-menu-list mt-2">
        <ul>
            <li>
                <a href="#">
                    <i class="ion-ios-bookmarks-outline"></i> Theme documentation
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ion-ios-cart-outline"></i> Purchase Tribus
                </a>
            </li>
        </ul>
    </div>

    <h3 class="st-menu-title">Account</h3>
    <div class="st-menu-list">
        <ul>
            <li>
                <a href="#">
                    <i class="ion-ios-person-outline"></i> User profile
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ion-ios-location-outline"></i> My addresses
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ion-card"></i> My cards
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ion-ios-unlocked-outline"></i> Password update
                </a>
            </li>
        </ul>
    </div>

    <h3 class="st-menu-title">Support center</h3>
    <div class="st-menu-list">
        <ul>
            <li>
                <a href="#">
                    <i class="ion-ios-information-outline"></i> About Tribus
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="ion-ios-email-outline"></i> Contact &amp; support
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-camera"></i> Getting started
                </a>
            </li>
        </ul>
    </div>
</nav>

        <div class="st-pusher">
            <div class="st-content">
                <div class="st-content-inner">
                    <!-- Header -->
                    <div class="header">
    <!-- Top Bar -->
    <div class="top-navbar">
	<div class="container">
        <div class="row">
            <div class="col-md-6">
            	<span class="aux-text d-none d-md-inline-block">
                    <ul class="inline-links inline-links--style-1">
                        <li class="d-none d-lg-inline-block">
							CDL - LaboratÛrio Santos e Vidal                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:sac@cdl.med.br">sac@cdl.med.br</a>
                        </li>
                    </ul>
                </span>
			</div>

			<div class="col-md-6">
            	<nav class="top-navbar-menu">
                    <ul class="top-menu">
                        <li><a href="#">Sign in</a></li>
                        <li><a href="#">Create account</a></li>
						<li><a href="#" data-toggle="global-search"><i class="fa fa-search"></i></a></li>
						<li class="dropdown">
							<a href="#">
								<i class="fa fa-shopping-cart"></i>
							</a>
							<ul class="sub-menu">
								<li>
									<div class="dropdown-cart px-0">
    <div class="dc-header">
        <h3 class="heading heading-6 strong-600">Cart</h3>
    </div>
    <div class="dc-item">
        <div class="d-flex align-items-center">
            <div class="dc-image">
                <a href="#">
                    <img src="content/assets/images/prv/shop/accessories/img-1a.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="dc-content">
                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                    <a href="#">
                        Wood phone case
                    </a>
                </span>

                <span class="dc-quantity">x2</span>
                <span class="dc-price">$50.00</span>
            </div>
            <div class="dc-actions">
                <button>
                    <i class="ion-close"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="dc-item">
        <div class="d-flex align-items-center">
            <div class="dc-image">
                <a href="#">
                    <img src="content/assets/images/prv/shop/accessories/img-2a.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="dc-content">
                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                    <a href="#">
                        Leather bag
                    </a>
                </span>

                <span class="dc-quantity">x1</span>
                <span class="dc-price">$250.00</span>
            </div>
            <div class="dc-actions">
                <button>
                    <i class="ion-close"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="dc-item">
        <div class="d-flex align-items-center">
            <div class="dc-image">
                <a href="#">
                    <img src="content/assets/images/prv/shop/accessories/img-3a.png" class="img-fluid" alt="">
                </a>
            </div>
            <div class="dc-content">
                <span class="d-block dc-product-name text-capitalize strong-600 mb-1">
                    <a href="#">
                        Brown leather wallet
                    </a>
                </span>

                <span class="dc-quantity">x1</span>
                <span class="dc-price">$99.00</span>
            </div>
            <div class="dc-actions">
                <button>
                    <i class="ion-close"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="dc-item py-4">
        <span class="subtotal-text">Subtotal</span>
        <span class="subtotal-amount">$450.00</span>
    </div>
    <div class="py-4 text-center">
        <ul class="inline-links inline-links--style-3">
            <li class="pr-3">
                <a href="#" class="link link--style-2 text-capitalize">
                    <i class="ion-person"></i> My account
                </a>
            </li>
            <li class="pr-3">
                <a href="#" class="link link--style-1 text-capitalize">
                    <i class="ion-bag"></i> View cart
                </a>
            </li>
            <li>
                <a href="#" class="link link--style-1 text-capitalize">
                    <i class="ion-forward"></i> Checkout
                </a>
            </li>
        </ul>
    </div>
</div>
								</li>
							</ul>
						</li>
                        <li class="aux-languages dropdown">
                            <a href="#">
                                <img src="content/assets/images/icons/flags/ro.png">
                            </a>
                            <ul id="auxLanguages" class="sub-menu">
                                <li>
                                    <a href="#"><span class="language">German</span></a>
                                </li>
                                <li>
                                    <span class="language language-active">English</span>
                                </li>
                                <li>
                                    <a href="#"><span class="language">Greek</span></a>
                                </li>
                                <li>
                                    <a href="#"><span class="language">Spanish</span></a>
                                </li>
                            </ul>
                        </li>
						<li><a href="#" class="btn-st-trigger" data-effect="st-effect-1"><i class="fa fa-ellipsis-h"></i></a></li>
                    </ul>
				</nav>
            </div>
        </div>
    </div>
</div>

    <!-- Global Search -->
    <section id="sctGlobalSearch" class="global-search global-search-overlay">
    <div class="container">
        <div class="global-search-backdrop mask-dark--style-2"></div>

        <!-- Search form -->
        <form class="form-horizontal form-global-search z-depth-2-top" role="form">
            <div class="px-4">
                <div class="row">
                    <div class="col-12">
                        <input type="text" class="search-input" placeholder="Type and hit enter ...">
                    </div>
                </div>
            </div>
            <a href="#" class="close-search" data-toggle="global-search" title="Close search bar"></a>
        </form>
    </div>
</section>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar--bold navbar-light bg-default ">
        <div class="container navbar-container">
            <!-- Brand/Logo -->
                        <a class="navbar-brand" href="content/index.html">
                <img src="content/assets/images/logo/logo-1-b.png" class="" alt="Boomerang">
                            </a>
            
            <div class="d-inline-block">
                <!-- Navbar toggler  -->
                <button class="navbar-toggler hamburger hamburger-js hamburger--spring" type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>

            <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">
    <!-- Navbar search - For small resolutions -->
    <div class="navbar-search-widget b-xs-bottom py-3 d-lg-none d-none">
        <form class="" role="form">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                <button class="btn btn-base-3" type="button">Go!</button>
                </span>
            </div>
        </form>
    </div>

    <!-- Navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="#">
                Home
            </a>
        </li>

        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="/sobre/">
                Nosso PropÛsito
            </a>
        </li>

        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="/exames/">
                Exames
            </a>
        </li>

        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="/resultados/">
                Resultados
            </a>
        </li>

        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="/blog/">
                Blog
            </a>
        </li>

        <li class="nav-item dropdown megamenu">
            <a class="nav-link" href="/contato/">
                Contato
            </a>
        </li>
        
    </ul>

    <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item">
            <a href="/paciente/" class="nav-link">
               ‡Årea do Paciente
            </a>
        </li>
    </ul>
</div>


<div class="pl-4 d-none d-lg-inline-block">
    <a href="/contato/" class="btn btn-styled btn-sm btn-base-1 text-uppercase btn-circle" target="_blank">
        Fale com o CDL
            </a>
</div>
        </div>
    </nav>
</div>

                    <!-- Slider -->
                    <section class="swiper-js-container background-image-holder" data-holder-type="fullscreen" data-holder-offset=".navbar">
    <div class="swiper-container" data-swiper-autoplay="true" data-swiper-effect="slide" data-swiper-items="1" data-swiper-space-between="0">
        <div class="swiper-wrapper">
            

            <!-- slide -->
            <div class="swiper-slide" data-swiper-autoplay="8000">
                <div class="slice holder-item holder-item-light has-bg-cover bg-size-cover" style="background-image: url(images/content/publicidade/1.jpg); background-position: bottom center;">
                    <span class="mask mask-dark--style-2"></span>
                    <div class="container d-flex align-items-center">
                        <div class="col">
                            <div class="row text-center">
                                <div class="col-12">
                                    <h2 class="heading heading-xl strong-400 text-uppercase animated" data-animation-in="fadeInDownBig" data-animation-delay="200">
                                        Bem-vindo ao <strong>CDL</strong>
                                    </h2>
                                    <p class="lead animated" data-animation-in="fadeInUpBig" data-animation-delay="200">
                                        Uma histÛria de pioneirismo, trabalho e dedicaÁ„o iniciada por duas farmacÍuticas
                                    </p>

                                    <a href="/sobre/" class="btn btn-lg btn-white btn-circle btn-outline mt-5 animated" data-animation-in="fadeInUpBig" data-animation-delay="1000">
                                        Saiba mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /slide -->


            <!-- slide -->
            <div class="swiper-slide" data-swiper-autoplay="8000">
                <div class="slice holder-item holder-item-light has-bg-cover bg-size-cover" style="background-image: url(images/content/publicidade/2.jpg); background-position: bottom center;">
                    <span class="mask mask-dark--style-2"></span>
                    <div class="container d-flex align-items-center">
                        <div class="col">
                            <div class="row text-center">
                                <div class="col-12">
                                    <h2 class="heading heading-xl strong-400 text-uppercase animated" data-animation-in="fadeInDownBig" data-animation-delay="200">
                                        Nossa <strong>Estrutura</strong>
                                    </h2>
                                    <p class="lead animated" data-animation-in="fadeInUpBig" data-animation-delay="200">
                                        O LaboratÛrio garante aos clientes qualidade na prestaÁ„o de servi‡ßos.
                                    </p>

                                    <a href="/estrutura/" class="btn btn-lg btn-white btn-circle btn-outline mt-5 animated" data-animation-in="fadeInUpBig" data-animation-delay="1000">
                                        Saiba mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /slide -->

            <!-- slide -->
            <div class="swiper-slide" data-swiper-autoplay="8000">
                <div class="slice holder-item holder-item-light has-bg-cover bg-size-cover" style="background-image: url(images/content/publicidade/3.jpg); background-position: bottom center;">
                    <span class="mask mask-dark--style-2"></span>
                    <div class="container d-flex align-items-center">
                        <div class="col">
                            <div class="row text-center">
                                <div class="col-12">
                                    <h2 class="heading heading-xl strong-400 text-uppercase animated" data-animation-in="fadeInDownBig" data-animation-delay="200">
                                        Nossos <strong>Exames</strong>
                                    </h2>
                                    <p class="lead animated" data-animation-in="fadeInUpBig" data-animation-delay="200">
                                        Dispomos de +3000 exames ‡† sua disposiÁ„o.
                                    </p>

                                    <a href="/exames/" class="btn btn-lg btn-white btn-circle btn-outline mt-5 animated" data-animation-in="fadeInUpBig" data-animation-delay="1000">
                                        Saiba mais
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /slide -->



        </div>

        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>

        <!-- Add Arrows -->
        <div class="swiper-button swiper-button-next"></div>
        <div class="swiper-button swiper-button-prev"></div>
    </div>
</section>
                    

                    
                    <!-- cat_header -->
                    <section class="slice-lg sct-color-3">
                        <div class="container">
                            <div class="row cols-xs-space cols-md-space cols-sm-space">
                                <div class="col-lg-4">
                                    <div class="icon-block icon-block--style-2-v1 text-center">
                                        <div class="block-icon circle bg-base-2">
                                            <i class="ion-tshirt-outline"></i>
                                        </div>
                                        <h2 class="heading heading-4 strong-500 c-white">ConvÍnios</h2>
                                        <p class="px-4 c-white">
                                            Veja se sua empresa ‡© conveniada ao CDL.
                                        </p>
                                        <a href="/convenios/" class="btn btn-styled btn-xs btn-base-3">Lista completa</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="icon-block icon-block--style-2-v1 text-center">
                                        <div class="block-icon circle bg-base-2">
                                            <i class="ion-settings"></i>
                                        </div>
                                        <h2 class="heading heading-4 strong-500 c-white">Exames</h2>
                                        <p class="px-4 c-white">
                                            Lista completa de exames.
                                        </p>
                                        <a href="/exames/" class="btn btn-styled btn-xs btn-base-3">Lista completa</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="icon-block icon-block--style-2-v1 text-center">
                                        <div class="block-icon circle bg-base-2">
                                            <i class="ion-ios-chatboxes-outline"></i>
                                        </div>
                                        <h2 class="heading heading-4 strong-500 c-white">Resultados de Exames</h2>
                                        <p class="px-4 c-white">
                                            Verifique o resultado do seus exames.
                                        </p>
                                        <a href="http://cdlaboratorio.dyndns.org:8081/" target="_blank" class="btn btn-styled btn-xs btn-base-3">Acesse aqui</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                   
                    <!-- sobre -->
                    <section class="slice sct-color-1" id="scrollToSection">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-6 d-none d-lg-block">
                                    <div class="row">
                                        <div class="col-md-6 animate-on-scroll fadeInDown" data-wow-delay="0.3s">
                                            <img src="/images/estatico/sobre-img-slice-1a.jpg" class="img-fluid">
                                        </div>

                                        <div class="col-md-6 mt-100 animate-on-scroll fadeInUp" data-wow-delay="0.3s">
                                            <img src="/images/estatico/sobre-img-slice-1b.jpg" class="img-fluid">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-5 ml-lg-auto">
                                    <div class="animate-on-scroll fadeIn" data-wow-delay="1s">
                                        <h4 class="heading heading-xs text-uppercase strong-600 mb-0">
                                            Quem Somos
                                        </h4>
                                        
                                        
                                        <?php echo $row_rsEquipe['EQP_COD']; ?><?php echo $row_rsUnidades['LOJ_COD']; ?><?php echo $row_rsConvenios['CONV_COD']; ?>
                                        <?php echo $row_rsDepomeimentos['DEP_COD']; ?>
                                        
                                        <h3 class="heading heading-3 text-uppercase strong-600 mt-3">
                                            Com 21 anos, o CDL cresceu e passou por grandes desafios
                                        </h3>

                                        <p class="mt-4">
                                            Uma histÛria de pioneirismo, trabalho e dedicaÁ„o iniciada por duas farmacÍutica sem prol de oferecer ‡† populaÁ„o amazonense um laboratÛrio de an‡°lises cl‡≠nicas e citolÛgicas que se destaca pela qualidade nos procedimentos e pelo atendimento humanizado e diferenciado.
                                        </p>

                                        <a href="/sobre/" class="btn btn-styled btn-base-3 btn-outline mt-4">Saiba mais</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- motivos -->
                    <section class="slice sct-color-4">
                        <div class="sct-inner container">
                            <div class="section-title section-title--style-1 text-center mb-2">
                                <h3 class="section-title-inner">
                                    <span>Porque escolher o CDL?</span>
                                </h3>
                                <span class="section-title-delimiter clearfix d-none"></span>
                            </div>

                            <div class="row cols-xs-space cols-sm-space align-items-center">
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="icon-block--style-1-v1 block-icon-right">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-speedometer-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">Atendimento Humanizado.</h3>
                                            <p class="mt-3">
                                                O CDL LaboratÛrio Santos e Vidal proporciona aos clientes um atendimento humanizado e personalizado atrav‡©s da realizaÁ„o de exames com qualidade, confiabilidade e rapidez nos laudos.
                                            </p>
                                        </div>
                                    </div>

                                    <span class="space-xs-md space-sm-xl"></span>

                                    <div class="icon-block--style-1-v1 block-icon-right">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-box-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">TradiÁ„o</h3>
                                            <p class="mt-3">
                                                Com 21 anos, o CDL cresceu e passou por grandes desafios.
                                            </p>
                                        </div>
                                    </div>

                                    <span class="space-xs-md space-sm-xl"></span>

                                    <div class="icon-block--style-1-v1 block-icon-right">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-color-filter-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">06 Unidados.</h3>
                                            <p class="mt-3">
                                               Hoje com sete unidades, emprega 55 profissionais diretos que trabalham a partir do propÛsito: ‚ÄúAmamos Cuidar de VocÍ‚Äù.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-12 hidden-md-down">
                                    <img src="/images/estatico/motivos-cdl-1.png" class="img-center img-responsive">
                                </div>

                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="icon-block--style-1-v1">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-cog-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">Coleta domiciliar.</h3>
                                            <p class="mt-3">
                                                No CDL LaboratÛrio, vocÍ faz diversos tipos de exames, como coleta de sangue e teste do pezinho, sem sair do conforto da sua casa.
                                            </p>
                                        </div>
                                    </div>

                                    <span class="space-xs-md space-sm-xl"></span>

                                    <div class="icon-block--style-1-v1">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-download-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">Coleta dos domingos.</h3>
                                            <p class="mt-3">
                                               N‡£o importa se ‡© fim de semana, estamos sempre ‡† sua disposiÁ„o.
                                            </p>
                                        </div>
                                    </div>

                                    <span class="space-xs-md space-sm-xl"></span>

                                    <div class="icon-block--style-1-v1">
                                        <div class="block-icon">
                                            <i class="icon ion-ios-chatboxes-outline"></i>
                                        </div>
                                        <div class="block-content">
                                            <h3 class="heading heading-5 strong-600">Qualidade Certificada PNCQ / CONTROLLAB.</h3>
                                            <p class="mt-3">
                                                O PNCQ, com o objetivo de auxiliar os laboratÛrios participantes, na implantaÁ„o e execuÁ„o do Controle Interno da Qualidade.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /motivos -->

                    <hr />
                    <!-- nosso time -->
                    <section class="slice-lg sct-color-1">
                        <div class="container">
                            <div class="section-title section-title--style-1 text-center mb-2">
                                <h3 class="section-title-inner">
                                    <span>Our creative team</span>
                                </h3>
                                <span class="section-title-delimiter clearfix d-none"></span>
                            </div>

                            <span class="clearfix"></span>

                            <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
                                <p class="text-lg line-height-1_8">
                                    Start building fast, beautiful and modern looking websites in no time using our theme.
                                </p>
                            </div>

                            <?php do { ?>
                              <span class="space-xs-xl"></span>
                              <?php } while ($row_rsEquipe = mysql_fetch_assoc($rsEquipe)); ?>

                            <div class="row cols-xs-space cols-sm-space cols-md-space">
                                <div class="col-lg-4">
                                    <div class="block block--style-3">
                                        <div class="block block-image">
                                            <div class="view view-second">
                                                <img src="content/assets/images/prv/team/business/img-b-1.jpg">
                                                <div class="mask mask-base-1--style-2">
                                                    <div class="view-buttons">
                                                        <div class="view-buttons-inner text-center">
                                                            <a href="#" class="c-white" data-toggle="tooltip" data-original-title="View profile" date-placement="top">
                                                                <i class="icon ion-ios-paper-outline"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-body">
                                            <h4 class="heading heading-xs strong-400 text-uppercase letter-spacing-2 c-gray-light">Graphic designer</h4>
                                            <h3 class="heading heading-5 strong-500">David Wally</h3>
                                            <p class="mt-1">
                                                Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.
                                            </p>
                                        </div>
                                        <div class="block-footer border-top">
                                            <ul class="social-media social-media--style-1-v4">
                                                <li>
                                                    <a href="#" class="facebook" target="_blank" title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="instagram" target="_blank">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-dribbble"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-github"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="block block--style-3">
                                        <div class="block block-image">
                                            <div class="view view-second">
                                                <img src="content/assets/images/prv/team/business/img-b-2.jpg">
                                                <div class="mask mask-base-1--style-2">
                                                    <div class="view-buttons">
                                                        <div class="view-buttons-inner text-center">
                                                            <a href="#" class="c-white" data-toggle="tooltip" data-original-title="View profile" date-placement="top">
                                                                <i class="icon ion-ios-paper-outline"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-body">
                                            <h4 class="heading heading-xs strong-400 text-uppercase letter-spacing-2 c-gray-light">Graphic designer</h4>
                                            <h3 class="heading heading-5 strong-500">Bertram Ozzie</h3>
                                            <p class="mt-1">
                                                Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.
                                            </p>
                                        </div>
                                        <div class="block-footer border-top">
                                            <ul class="social-media social-media--style-1-v4">
                                                <li>
                                                    <a href="#" class="facebook" target="_blank" title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="instagram" target="_blank">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-dribbble"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-github"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="block block--style-3">
                                        <div class="block block-image">
                                            <div class="view view-second">
                                                <img src="content/assets/images/prv/team/business/img-b-3.jpg">
                                                <div class="mask mask-base-1--style-2">
                                                    <div class="view-buttons">
                                                        <div class="view-buttons-inner text-center">
                                                            <a href="#" class="c-white" data-toggle="tooltip" data-original-title="View profile" date-placement="top">
                                                                <i class="icon ion-ios-paper-outline"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-body">
                                            <h4 class="heading heading-xs strong-400 text-uppercase letter-spacing-2 c-gray-light">Graphic designer</h4>
                                            <h3 class="heading heading-5 strong-500">Desiree Jinny</h3>
                                            <p class="mt-1">
                                                Lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor.
                                            </p>
                                        </div>
                                        <div class="block-footer border-top">
                                            <ul class="social-media social-media--style-1-v4">
                                                <li>
                                                    <a href="#" class="facebook" target="_blank" title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="instagram" target="_blank">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-dribbble"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#" class="dribbble" target="_blank">
                                                        <i class="fa fa-github"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>





                    
                    <!-- coleta_domiciliar -->
                    <section class="bg-base-1">
                        <div class="sct-inner">
                            <div class="row row-no-padding align-items-center">
                                <div class="col-lg-6 order-lg-2">
                                    <img src="content/assets/images/prv/other/img-8-1000x900.jpg" class="img-fluid img-center">
                                </div>

                                <div class="col-lg-6 order-lg-1">
                                    <div class="col-wrapper--spaced-x py-5 text-center text-lg-left">
                                        <h3 class="heading heading-2 c-base-text-1 strong-500">
                                            Coleta Domicilar
                                        </h3>
                                        <footer class="blockquote-footer c-base-text-1">
                                            <cite title="Source Title">Don Draper</cite>
                                        </footer>
                                        <p class="lead mt-4">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.
                                        </p>
                                        <a href="#" class="btn btn-styled btn-white btn-circle btn-outline mt-4">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- depoimentos -->
                    <section class="slice-lg sct-color-1 border-top">
                        <div class="container">
                            <div class="section-title section-title--style-1 text-center mb-2">
                                <h3 class="section-title-inner text-normal strong-300">
                                    Aceitamos cerca de <span class="c-base-1">500</span> convÍnios
                                </h3>
                                <span class="section-title-delimiter clearfix d-none"></span>
                            </div>

                            <div class="fluid-paragraph fluid-paragraph-sm text-center">
                                <p class="lead strong-300">
                                    Start building fast, beautiful and modern looking websites in no time using our theme.
                                </p>
                            </div>
                            <span class="space-xs-xl"></span>
                            <div class="swiper-js-container">
                                <div class="swiper-container" data-swiper-items="6" data-swiper-space-between="20" data-swiper-md-items="4" data-swiper-sm-space-between="20" data-swiper-sm-items="2" data-swiper-sm-space-between="20" data-swiper-xs-items="2" data-swiper-sm-space-between="20">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <?php do { ?>
                                              <div class="client-logo client-logo--style-3"> <img src="content/assets/images/prv/clients/brands/adobe-258x116.png" class="img-responsive" /></div>
                                              <?php } while ($row_rsConvenios = mysql_fetch_assoc($rsConvenios)); ?>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/jquery-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/sass-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/github-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/google-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/esquire-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="client-logo client-logo--style-3">
                                                <img src="content/assets/images/prv/clients/brands/wordpress-258x116.png" class="img-responsive" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </section>



                    <section class="slice sct-color-2 border-top border-bottom">
                        <div class="container text-center">
                            <div class="section-title section-title--style-1 text-center mb-2">
                                <h3 class="section-title-inner">
                                    <span>Nossas Unidades</span>
                                </h3>
                                <span class="section-title-delimiter clearfix d-none"></span>
                            </div>

                            <span class="clearfix"></span>

                            <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center">
                                Start building fast, beautiful and modern looking websites in no time using our theme.
                            </div>

                            <span class="space-xs-xl"></span>

                            <!-- PORTFOLIO -->
                            <div class="masonry">
                                <div class="row">
                                    <div class="masonry-item col-sm-6 col-lg-4 design">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <?php do { ?>
                                                  <div class="block-image"> <img src="content/assets/images/prv/work/agency/img-1.jpg"></div>
                                                  <?php } while ($row_rsUnidades = mysql_fetch_assoc($rsUnidades)); ?>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                Beware the mountain                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Web Design
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="masonry-item col-sm-6 col-lg-4 branding">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <div class="block-image">
                                                    <img src="content/assets/images/prv/work/agency/img-2.jpg">
                                                </div>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                Beware the mountain                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Branding
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="masonry-item col-sm-6 col-lg-4 identity">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <div class="block-image">
                                                    <img src="content/assets/images/prv/work/agency/img-3.jpg">
                                                </div>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                Rules not to follow                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Identity
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="masonry-item col-sm-6 col-lg-4 graphics">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <div class="block-image">
                                                    <img src="content/assets/images/prv/work/agency/img-4.jpg">
                                                </div>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                The secret of life                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Graphics
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="masonry-item col-sm-6 col-lg-4 identity">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <div class="block-image">
                                                    <img src="content/assets/images/prv/work/agency/img-5.jpg">
                                                </div>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                Remarkable web design                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Identity
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="masonry-item col-sm-6 col-lg-4 graphics">
                                        <a href="#">
                                            <div class="block block--style-5 mb-0">
                                                <div class="block-image">
                                                    <img src="content/assets/images/prv/work/agency/img-6.jpg">
                                                </div>
                                                <div class="block-mask-caption--over flex flex-items-xs-top">
                                                    <div class="flex-wrap-item">
                                                        <div class="text-xs-left">
                                                            <h3 class="heading heading-3 strong-500 c-white">
                                                                Time to go back to basics                                                            </h3>
                                                            <h4 class="heading heading-xs strong-300 text-uppercase c-white">
                                                                Graphics
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="delimiter--style-1">
                                <div class="delimiter-title-wrapper">
                                    <div class="delimiter-title">
                                        <h3 class="heading heading-xs mb-0 text-uppercase strong-600">N‡∫meros do CDL</h3>
                                    </div>
                                </div>
                            </div>
                            <span class="space-xs-xl"></span>

                            <div class="row">
                                <div class="col-md-3 col-sm-6">
                                    <div class="milestone-counter text-center">
                                        <div class="milestone-count c-gray-dark strong-400" data-from="0" data-to="5518" data-speed="3000" data-refresh-interval="100"></div>
                                        <h4 class="milestone-info heading-6 c-gray-light text-normal">Clients</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="milestone-counter text-center">
                                        <div class="milestone-count c-gray-dark strong-400" data-from="0" data-to="154" data-speed="5000" data-refresh-interval="50"></div>
                                        <h4 class="milestone-info heading-6 c-gray-light text-normal">Successful projects</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="milestone-counter text-center">
                                        <div class="milestone-count c-gray-dark strong-400" data-from="0" data-to="33" data-speed="5000" data-refresh-interval="80"></div>
                                        <h4 class="milestone-info heading-6 c-gray-light text-normal">Awards</h4>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-6">
                                    <div class="milestone-counter text-center">
                                        <div class="milestone-count c-gray-dark strong-400" data-from="0" data-to="1230" data-speed="5000" data-refresh-interval="80"></div>
                                        <h4 class="milestone-info heading-6 c-gray-light text-normal">Great ideas</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- depoimentos -->
                    <section class="slice sct-color-2 border-top border-bottom">
                        <div class="container">
                            <div class="section-title section-title--style-1 text-center mb-4">
                                <?php do { ?>
                                <h3 class="section-title-inner">
                                    <span>Testimonials</span>
                                  </h3>
                                  <?php } while ($row_rsDepomeimentos = mysql_fetch_assoc($rsDepomeimentos)); ?>
<span class="section-title-delimiter clearfix d-none"></span>
                            </div>

                            <div class="swiper-js-container">
                                <div class="swiper-container" data-swiper-items="1" data-swiper-space-between="0" data-swiper-sm-items="1"  data-swiper-sm-space-between="0" data-swiper-xs-items="1"  data-swiper-xs-space-between="0">
                                    <div class="swiper-wrapper">
                                        <!-- Testimonial 1 -->
                                        <div class="swiper-slide">
                                            <div class="fluid-paragraph fluid-paragraph-md paragraph-lg strong-300 relative">
                                                <div class="text-center">
                                                    <p class="lead line-height-1_8 c-gray-light strong-300">
                                                        "Viam sumi mo id erit objectioni mo de necessario crediderim imo terra vox alios aut lor quasi. Vim quaero aut videri pendam plures duo extat neque arcte re ad etiam ego infiniti reperero mutuatur formalem sed scribere nec vel profecto."
                                                    </p>
                                                    <div class="text-center mt-5">
                                                        <h3 class="heading heading-4 strong-600 mb-0">
                                                            Bettie Mavis                                                        </h3>
                                                        <span class="heading heading-xs strong-400 text-normal">
                                                            IT Specialist
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="swiper-slide">
                                            <div class="fluid-paragraph fluid-paragraph-md paragraph-lg strong-300 relative">
                                                <div class="text-center">
                                                    <p class="lead line-height-1_8 c-gray-light strong-300">
                                                        "Consectetur velit a suscipit quisque adipiscing lobortis aptent cras et justo himenaeos a convallis per donec dis vestibulum habitasse ullamcorper ultrices."
                                                    </p>
                                                    <div class="text-center mt-5">
                                                        <h3 class="heading heading-4 strong-600 mb-0">
                                                            Elisabeth Alanna                                                        </h3>
                                                        <span class="heading heading-xs strong-400 text-normal">
                                                           Web Designer
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add Arrows -->
                                    <div class="swiper-button swiper-button-next"></div>
                                    <div class="swiper-button swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- FOOTER -->
                    <footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-5">
                    <div class="col">
                        <img src="content/assets/images/logo/logo-1-c.png">
                        <span class="clearfix"></span>
                        <span class="heading heading-sm c-gray-light strong-400">One template. Infinite solutions.</span>
                        <p class="mt-3">
                            All the components included in Boomerang are built to the same level of quality as Bootstrap and highlighted with several example pages.
                        </p>

                        <div class="copyright mt-4">
                            <p>
                                Copyright &copy; 2018                                <a href="https://webpixels.io" target="_blank">
                                    <strong>Webpixels</strong>
                                </a> -
                                All rights reserved
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="col">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                           Support
                       </h4>

                       <ul class="footer-links">
                            <li><a href="#" title="Help center">Help center</a></li>
                            <li><a href="#" title="Discussions">Discussions</a></li>
                            <li><a href="#" title="Contact support">Contact</a></li>
                            <li><a href="#" title="Blog">Blog</a></li>
                            <li><a href="#" title="Jobs">FAQ</a></li>
                        </ul>
                     </div>
                </div>

                <div class="col-lg-2">
                    <div class="col">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                            Company
                        </h4>

                        <ul class="footer-links">
                             <li>
                                 <a href="#" title="Home">
                                     Home
                                 </a>
                             </li>
                             <li>
                                 <a href="#" title="About us">
                                     About us
                                 </a>
                             </li>
                             <li>
                                 <a href="#" title="Services">
                                     Services
                                 </a>
                             </li>
                             <li>
                                 <a href="#" title="Blog">
                                     Blog
                                 </a>
                             </li>
                             <li>
                                 <a href="#" title="Contact">
                                     Contact
                                 </a>
                             </li>
                         </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="col">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                            Get in touch
                        </h4>

                        <ul class="social-media social-media--style-1-v4">
                            <li>
                                <a href="#" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dribbble" target="_blank" data-toggle="tooltip" data-original-title="Dribbble">
                                    <i class="fa fa-dribbble"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="dribbble" target="_blank" data-toggle="tooltip" data-original-title="Github">
                                    <i class="fa fa-github"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
                </div>
            </div>
        </div><!-- END: st-pusher -->
    </div><!-- END: st-container -->
</div><!-- END: body-wrap -->

<!-- SCRIPTS -->
<a href="#" class="back-to-top btn-back-to-top"></a>

<!-- Core -->
<script src="content/assets/vendor/jquery/jquery.min.js"></script>
<script src="content/assets/vendor/popper/popper.min.js"></script>
<script src="content/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="content/assets/js/slidebar/slidebar.js"></script>
<script src="content/assets/js/classie.js"></script>

<!-- Bootstrap Extensions -->
<script src="content/assets/vendor/bootstrap-notify/bootstrap-growl.min.js"></script>
<script src="content/assets/vendor/scrollpos-styler/scrollpos-styler.js"></script>

<!-- Plugins: Sorted A-Z -->
<script src="content/assets/vendor/adaptive-backgrounds/adaptive-backgrounds.js"></script>
<script src="content/assets/vendor/countdown/js/jquery.countdown.min.js"></script>
<script src="content/assets/vendor/dropzone/dropzone.min.js"></script>
<script src="content/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="content/assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
<script src="content/assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="content/assets/vendor/flip/flip.min.js"></script>
<script src="content/assets/vendor/footer-reveal/footer-reveal.min.js"></script>
<script src="content/assets/vendor/gradientify/jquery.gradientify.min.js"></script>
<script src="content/assets/vendor/headroom/headroom.min.js"></script>
<script src="content/assets/vendor/headroom/jquery.headroom.min.js"></script>
<script src="content/assets/vendor/input-mask/input-mask.min.js"></script>
<script src="content/assets/vendor/instafeed/instafeed.js"></script>
<script src="content/assets/vendor/milestone-counter/jquery.countTo.js"></script>
<script src="content/assets/vendor/nouislider/js/nouislider.min.js"></script>
<script src="content/assets/vendor/paraxify/paraxify.min.js"></script>
<script src="content/assets/vendor/select2/js/select2.min.js"></script>
<script src="content/assets/vendor/sticky-kit/sticky-kit.min.js"></script>
<script src="content/assets/vendor/swiper/js/swiper.min.js"></script>
<script src="content/assets/vendor/textarea-autosize/autosize.min.js"></script>
<script src="content/assets/vendor/typeahead/typeahead.bundle.min.js"></script>
<script src="content/assets/vendor/typed/typed.min.js"></script>
<script src="content/assets/vendor/vide/vide.min.js"></script>
<script src="content/assets/vendor/viewport-checker/viewportchecker.min.js"></script>
<script src="content/assets/vendor/wow/wow.min.js"></script>

<!-- Isotope -->
<script src="content/assets/vendor/isotope/isotope.min.js"></script>
<script src="content/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>



<!-- App JS -->
<script src="content/assets/js/boomerang.min.js"></script>

</body>
</html>
<?php
mysql_free_result($rsEquipe);

mysql_free_result($rsConvenios);

mysql_free_result($rsUnidades);

mysql_free_result($rsDepomeimentos);
?>
