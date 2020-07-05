<?php require_once('../Connections/conn92ID.php'); ?>
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

mysql_select_db($database_conn92ID, $conn92ID);
$query_rsUnidades = "SELECT * FROM tb_lojas WHERE LOJ_STATUS = 1";
$rsUnidades = mysql_query($query_rsUnidades, $conn92ID) or die(mysql_error());
$row_rsUnidades = mysql_fetch_assoc($rsUnidades);
$totalRows_rsUnidades = mysql_num_rows($rsUnidades);
?>
<!DOCTYPE html>
<html><!-- InstanceBegin template="/Templates/conteudo_interno.dwt" codeOutsideHTMLIsLocked="false" -->
<head>

<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<meta name="robots" content="index, follow">
<meta name="description" content="O melhor e mais completo serviços laboratoriais de Manaus.">
<meta name="keywords" content="laboratório, laboratórios, exames, médicos, clínicas, saúde, hospitais, medicina, manaus, amazonas">
<meta name="author" content="92dpi.ag">
<!-- InstanceBeginEditable name="doctitle" -->
<title>Unidades « CDL Laboratórios Santos e Vidal - Manaus / Amazonas</title>
<!-- InstanceEndEditable -->
<!-- Bootstrap -->
<link rel="stylesheet" href="../content/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css">

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800|Roboto:400,500,700" rel="stylesheet"> 

<!-- Plugins -->
<link rel="stylesheet" href="../content/assets/vendor/swiper/css/swiper.min.css">
<link rel="stylesheet" href="../content/assets/vendor/hamburgers/hamburgers.min.css" type="text/css">
<link rel="stylesheet" href="../content/assets/vendor/animate/animate.min.css" type="text/css">
<link rel="stylesheet" href="../content/assets/vendor/fancybox/css/jquery.fancybox.min.css">

<!-- Icons -->
<link rel="stylesheet" href="../content/assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/ionicons/css/ionicons.min.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/line-icons/line-icons.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/line-icons-pro/line-icons-pro.css" type="text/css">

<!-- Linea Icons -->
<link rel="stylesheet" href="../content/assets/fonts/linea/arrows/linea-icons.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/linea/basic/linea-icons.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/linea/ecommerce/linea-icons.css" type="text/css">
<link rel="stylesheet" href="../content/assets/fonts/linea/software/linea-icons.css" type="text/css">

<!-- Global style (main) -->
<link id="stylesheet" type="text/css" href="../content/assets/css/boomerang.min.css" rel="stylesheet" media="screen">

<!-- Custom style - Remove if not necessary -->
<link type="text/css" href="../content/assets/css/custom-style.css" rel="stylesheet">

<!-- Favicon -->
<link href="../content/assets/images/favicon.png" rel="icon" type="image/png">


<!-- Recaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-123351508-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-123351508-1');
</script>

<!-- WhatsHelp.io widget -->
<script type="text/javascript">
(function () {
var options = {
whatsapp: "+5592984158162", // WhatsApp number
call_to_action: "WhatsApp", // Call to action
position: "right", // Position may be 'right' or 'left'
};
var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
})();
</script>
<!-- /WhatsHelp.io widget --> 
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5cebe89ba667a0210d59a449/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- InstanceBeginEditable name="head" -->


<!-- InstanceEndEditable -->


</head>
<body>


<!-- MAIN WRAPPER -->
<div class="body-wrap" data-template-mode="cards">
    <div id="st-container" class="st-container">

        

        <div class="st-pusher">
            <div class="st-content">
              <div class="st-content-inner">
                <!-- Header -->
                <div class="header">
                  <!-- Top Bar -->
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
                  <nav class="navbar navbar-expand-lg navbar--bold  navbar-transparent navbar-inverse bg-dark  navbar--bb-1px">
                    <div class="container navbar-container">
                      <!-- Brand/Logo -->
                      <a class="navbar-brand" href="../index.php"> <img src="../content/assets/images/logo/logo-1-a.png" class="d-none d-lg-inline-block" alt="Boomerang"> <img src="../content/assets/images/logo/logo-1-a.png" class="d-lg-none" alt="Boomerang"></a>
                      <div class="d-inline-block">
                        <!-- Navbar toggler  -->
                        <button class="navbar-toggler hamburger hamburger-js hamburger--spring" type="button" data-toggle="collapse" data-target="#navbar_main" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation"> <span class="hamburger-box"> <span class="hamburger-inner"></span> </span> </button>
                      </div>
                      <div class="collapse navbar-collapse align-items-center justify-content-end" id="navbar_main">
                        <!-- Navbar search - For small resolutions -->
                        <div class="navbar-search-widget b-xs-bottom py-3 d-lg-none d-none">
                          <form class="" role="form">
                            <div class="input-group input-group-lg">
                              <input type="text" class="form-control" placeholder="Search for...">
                              <span class="input-group-btn">
                                <button class="btn btn-base-3" type="button">Go!</button>
                              </span> </div>
                          </form>
                        </div>


                        <!-- Navbar links -->
                        <ul class="navbar-nav">
                          <li class="nav-item dropdown megamenu"> <a class="nav-link" href="../index.php"> Home </a> </li>

                        <!-- dropdown -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Sobre
                            </a>

                            <div class="dropdown-menu dropdown-menu-xl py-0 px-0 overflow--hidden" aria-labelledby="navbar_1_dropdown_1">
                                <div class="list-group rounded">
                                    <a href="/sobre/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Nosso Propósito</div>
                                            <p class="text-sm mb-0">Conheça a trajetória do CDL</p>
                                        </div>
                                    </a>

                                    <a href="/estrutura/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Estrutura</div>
                                            <p class="text-sm mb-0">Navegue pela nossa estrutura</p>
                                        </div>
                                    </a>
                                    
                                </div>
                            </div>
                        </li>
                        <!-- /dropdown -->

                        <!-- dropdown -->
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Exames e Serviços
                            </a>

                            <div class="dropdown-menu dropdown-menu-xl py-0 px-0 overflow--hidden" aria-labelledby="navbar_1_dropdown_1">
                                <div class="list-group rounded">
                                    <a href="/exames/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Exames</div>
                                            <p class="text-sm mb-0">Dispomos de uma lista completa de exames.</p>
                                        </div>
                                    </a>

                                    <a href="/checkup/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Check-ups</div>
                                            <p class="text-sm mb-0">Conheça e agende seu chekup conosco.</p>
                                        </div>
                                    </a>

                                    <a href="/coleta-domiciliar/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Coleta Domiciliar</div>
                                            <p class="text-sm mb-0">Você faz diversos tipos de exames sem sair do conforto da sua casa.</p>
                                        </div>
                                    </a>


                                    <a href="/convenios/" class="list-group-item list-group-item-action d-flex align-items-center">
                                        <div class="list-group-content">
                                            <div class="list-group-heading heading heading-6 mb-1">Convênios</div>
                                            <p class="text-sm mb-0">Somos credenciados pelos principais planos de saúde e empresas de Manaus.</p>
                                        </div>
                                    </a>



                                    
                                </div>
                            </div>
                        </li>
                        <!-- /dropdown -->

                          
                          
                          <li class="nav-item dropdown megamenu"> <a class="nav-link" href="http://cdlaboratorio.dyndns.org:8081/" target="_blank"> Resultados </a> </li>
                          <li class="nav-item dropdown megamenu"> <a class="nav-link" href="/unidades/"> Unidades </a> </li>
                          <li class="nav-item dropdown megamenu"> <a class="nav-link" href="/blog/"> Blog </a> </li>
                          <li class="nav-item dropdown megamenu"> <a class="nav-link" href="/contato/"> Contato </a> </li>
                        </ul>
                        <!-- /Navbar links -->

                        <ul class="navbar-nav ml-lg-auto">
                          <!-- <li class="nav-item"> <a href="../content/documentation/getting-started/introduction.html" class="nav-link"> &Aacute;rea do Paciente </a> </li> -->
                        </ul>
                      </div>
                      <div class="pl-4 d-none d-lg-inline-block"> <a href="/contato/" class="btn btn-styled btn-sm btn-base-3 btn-circle" target="_blank"> Fale com o CDL </a> </div>
                    </div>
                  </nav>
                </div>
                <!-- conteudo_interno -->
                
                <!-- InstanceBeginEditable name="conteudo_interno" -->
                
                <section class="slice--offset-top parallax-section parallax-section-lg" style="background-image: url(../content/assets/images/backgrounds/slider/img-44.jpg); background-position: bottom center;"> <span class="mask mask-base-1--style-1"></span>
                  <div class="container">
                    <div class="row">
                      <div class="col-12">
                        <div class="py-5 text-center">
                          <h1 class="heading heading-1 c-white strong-400 text-normal"> Unidades CDL Manaus </h1>
                          <span class="clearfix"></span>
                          <div class="fluid-paragraph fluid-paragraph-sm c-gray-light strong-300 text-center c-white mt-3"> Hoje com sete unidades, emprega 55 profissionais diretos que trabalham a partir do propósito: “Amamos Cuidar de Você”. </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </section>
                

                


                <!-- item -->
                <?php do { ?>
                <section class="slice">
                    <div class="container">
                      <div class="row align-items-center cols-xs-space cols-sm-space cols-md-space">
                        
                        
                        <div class="col-lg-6">
                          <div class="block block-image-holder">
                            <div class="block-image has-solid-shadow-right">
                              <a href="#">
                                <img src="../images/content/lojas/<?php echo $row_rsUnidades['LOJ_COD']; ?>.jpg" class="img-fluid img-center">
                              </a>
                              </div>
                            </div>
                          </div>
                        
                        <div class="col-lg-5 ml-lg-auto">
                          <h3 class="heading heading-3 strong-300">
                            <?php echo $row_rsUnidades['LOJ_NOME']; ?>
                            
                            </h3>
                          
                          <p class="lead mt-4 mb-4">
                            E-mail: <a href="mailto:<?php echo $row_rsUnidades['LOJ_EMAIL']; ?>"><?php echo $row_rsUnidades['LOJ_EMAIL']; ?></a>
                            <br>
                            Telefone: <?php echo $row_rsUnidades['LOJ_TELEFONE']; ?><br>
                            Whatsapp: <?php echo $row_rsUnidades['LOJ_WHATS']; ?>
                            </p>
                          
                          <p class="">
                            <strong>Funcionamento</strong>: <?php echo $row_rsUnidades['LOJ_FUNCIONAMENTO']; ?>
                            </p>
                          <a href="<?php echo $row_rsUnidades['LOJ_URL']; ?>" class="link link-sm link--style-2 mt-3" target="_blank">
                            <i class="fa fa-long-arrow-right"></i> Veja no Google Maps
                            </a>
                          </div>
                        </div>
                      </div>
                    </section>
                  <?php } while ($row_rsUnidades = mysql_fetch_assoc($rsUnidades)); ?>
					<!-- /item -->

            
            <!-- InstanceEndEditable -->
            <!-- /conteudo_interno -->

                    <!-- FOOTER -->
                    <footer id="footer" class="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row cols-xs-space cols-sm-space cols-md-space">
                <div class="col-lg-5">
                    <div class="col">
                        <img src="../content/assets/images/logo/logo-1-c.png">
                        <span class="clearfix"></span>
                        
                        <p class="mt-3">
                            Uma história de pioneirismo, trabalho e dedicação iniciada por duas farmacêutica sem prol de oferecer à  população amazonense um laboratório de anà¡lises clà­nicas e citológicas que se destaca pela qualidade nos procedimentos e pelo atendimento humanizado e diferenciado.
                        </p>

                        <div class="copyright mt-4">
                            <p>
                                Copyright &copy; 2018                                <a href="#" target="_blank">
                                    <strong>CDL Laborat&oacute;rios Santos e Vidal</strong>
                                </a> -
                                Todos os direitos reservados.
                            </p>
                            <a href="http://www.92dpi.ag" target="_blank" title="92dpi | Agência Digital"><img src="http://www.92dpi.ag/images/webservices/92dpi-30px-w.png" alt="92dpi | Agência Digital" /></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="col">
                       <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                           Conhe&ccedil;a o CDL
                       </h4>

                       <ul class="footer-links">
                            <li><a href="../index.html" title="Help center">Home</a></li>
                            <li><a href="/sobre/" title="Nosso Propósito">Nosso Prop&oacute;sito</a></li>
                            <li><a href="/unidades/" title="Conheça nossas unidades em Manaus">Unidades CDL</a></li>
                            <li><a href="/blog/" title="Blog">Blog</a></li>
                            <li><a href="/contato/" title="Contato">Contato</a></li>
                        </ul>
                     </div>
                </div>

                <div class="col-lg-2">
                    <div class="col">
                        <h4 class="heading heading-xs strong-600 text-uppercase mb-1">
                            Exames & Servi&ccedil;os
                        </h4>

                        <ul class="footer-links">
                             <li>
                                 <a href="#" title="Lista de todos nossos exames">
                                     Exames
                                 </a>
                             </li>
                             <li>
                                 <a href="/checkups/" title="Checkups">
                                     Check Ups
                                 </a>
                             </li>
                             <li>
                                 <a href="/convenios/" title="Convênios">
                                     Conv&ecirc;nios
                                 </a>
                             </li>
                             <li>
                                 <a href="#" title="Coleta Domiciliar">
                                     Coleta Domiciliar
                                 </a>
                             </li>
                             <li>
                                 <a href="http://cdlaboratorio.dyndns.org:8081/" title="Resultados de Exames" target="_blank">
                                     Resultados de Exames
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
                                <a href="https://www.facebook.com/cdllaboratorio/" class="facebook" target="_blank" data-toggle="tooltip" data-original-title="Facebook">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/cdllab/" class="instagram" target="_blank" data-toggle="tooltip" data-original-title="Instagram">
                                    <i class="fa fa-instagram"></i>
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
<script src="../content/assets/vendor/jquery/jquery.min.js"></script>
<script src="../content/assets/vendor/popper/popper.min.js"></script>
<script src="../content/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../content/assets/js/slidebar/slidebar.js"></script>
<script src="../content/assets/js/classie.js"></script>

<!-- Bootstrap Extensions -->
<script src="../content/assets/vendor/bootstrap-notify/bootstrap-growl.min.js"></script>
<script src="../content/assets/vendor/scrollpos-styler/scrollpos-styler.js"></script>

<!-- Plugins: Sorted A-Z -->
<script src="../content/assets/vendor/adaptive-backgrounds/adaptive-backgrounds.js"></script>
<script src="../content/assets/vendor/countdown/js/jquery.countdown.min.js"></script>
<script src="../content/assets/vendor/dropzone/dropzone.min.js"></script>
<script src="../content/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="../content/assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>
<script src="../content/assets/vendor/flatpickr/flatpickr.min.js"></script>
<script src="../content/assets/vendor/flip/flip.min.js"></script>
<script src="../content/assets/vendor/footer-reveal/footer-reveal.min.js"></script>
<script src="../content/assets/vendor/gradientify/jquery.gradientify.min.js"></script>
<script src="../content/assets/vendor/headroom/headroom.min.js"></script>
<script src="../content/assets/vendor/headroom/jquery.headroom.min.js"></script>
<script src="../content/assets/vendor/input-mask/input-mask.min.js"></script>
<script src="../content/assets/vendor/instafeed/instafeed.js"></script>
<script src="../content/assets/vendor/milestone-counter/jquery.countTo.js"></script>
<script src="../content/assets/vendor/nouislider/js/nouislider.min.js"></script>
<script src="../content/assets/vendor/paraxify/paraxify.min.js"></script>
<script src="../content/assets/vendor/select2/js/select2.min.js"></script>
<script src="../content/assets/vendor/sticky-kit/sticky-kit.min.js"></script>
<script src="../content/assets/vendor/swiper/js/swiper.min.js"></script>
<script src="../content/assets/vendor/textarea-autosize/autosize.min.js"></script>
<script src="../content/assets/vendor/typeahead/typeahead.bundle.min.js"></script>
<script src="../content/assets/vendor/typed/typed.min.js"></script>
<script src="../content/assets/vendor/vide/vide.min.js"></script>
<script src="../content/assets/vendor/viewport-checker/viewportchecker.min.js"></script>
<script src="../content/assets/vendor/wow/wow.min.js"></script>

<!-- Isotope -->
<script src="../content/assets/vendor/isotope/isotope.min.js"></script>
<script src="../content/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>



<!-- Google maps -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCBuyKngB9VC3zgY_uEB-DKL9BKYMekbeY&callback=initMap" type="text/javascript"></script>
<script src="../content/assets/js/google-maps/google-maps-blue.js"></script>

<!-- App JS -->
<script src="../content/assets/js/boomerang.min.js"></script>

</body>
<!-- InstanceEnd --></html>
<?php
mysql_free_result($rsUnidades);
?>
