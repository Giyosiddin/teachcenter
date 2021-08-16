<!doctype html>
<html lang="en">
<head>
   
    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!--====== Title ======-->
    <title>Edubin - LMS Education HTML Template</title>
    
    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="/front/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/animate.css')}}">
    
    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/nice-select.css')}}">
    
    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    
    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.min.css')}}">
    
    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/default.css')}}">
    
    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    
    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    
    <!--====== Custom css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/custom.css')}}">
  
  
</head>

<body>
   
    <!--====== PRELOADER PART START ======-->
    
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>
    
    <!--====== PRELOADER PART START ======-->
    
    <!--====== HEADER PART START ======-->
    
    <header id="header-part">
       
        <!--  <div class="header-top d-none d-lg-block">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="header-contact text-lg-left text-center">
                                <ul>
                                    <li><img src="images/all-icon/map.png" alt="icon"><span>127/5 Mark street, New york</span></li>
                                    <li><img src="images/all-icon/email.png" alt="icon"><span>info@yourmail.com</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="header-opening-time text-lg-right text-center">
                                <p>Opening Hours : Monday to Saturay - 8 Am to 5 Pm</p>
                            </div>
                        </div>
                 </div  -->
         
         <div class="header-logo-support pt-30 pb-30">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-4 col-md-4">
                         <div class="logo">
                             <a href="index-2.html">
                                 <img src="{{asset('front/images/logo.png')}}" alt="Logo">
                             </a>
                         </div>
                     </div>
                     <div class="col-lg-8 col-md-8">
                         <div class="support-button float-right d-none d-md-block">
                             <div class="support float-left">
                                 <div class="icon">
                                     <img src="{{asset('front/images/all-icon/support.png')}}" alt="icon">
                                 </div>
                                 <div class="cont">
                                     <p>Qo'shimcha ma'lumotlar uchun bog'laning</p>
                                     <span>90 353 44 35</span>
                                 </div>
                             </div>
                             <div class="button float-left">
                                 <a href="{{route('register')}}" class="main-btn">Registratsiya</a>
                             </div>
                         </div>
                     </div>
                 </div> <!-- row -->
             </div> <!-- container -->
         </div> <!-- header logo support --> 
         
         <div class="navigation">
             <div class="container">
                 <div class="row">
                     <div class="col-lg-10 col-md-10 col-sm-9 col-8">
                         <nav class="navbar navbar-expand-lg">
                             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                                 <span class="icon-bar"></span>
                             </button>
 
                             <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                 <ul class="navbar-nav mr-auto">
                                     <li class="nav-item">
                                         <a class="active" href="index-2.html">Asosiy sahifa</a>
                                                                            </li>
                                     <li class="nav-item">
                                         <a href="about.html">Biz haqimizda</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="about.html">Yangiliklar</a>
                                     </li>
                                     <li class="nav-item">
                                         <a href="courses.html">Xizmatlar</a>
                                         <ul class="sub-menu">
                                             <li><a href="courses.html">Konsalting</a></li>
                                             <li><a href="courses-singel.html">O'quv kurslari</a></li>
                                         </ul>
                                     </li>
                                     <li class="nav-item">
                                         <a href="events.html">Online darslar</a>
                                         <!-- <ul class="sub-menu">
                                             <li><a href="events.html">Events</a></li>
                                             <li><a href="events-singel.html">Event Singel</a></li>
                                         </ul> -->
                                     </li>
                                     
                                     <li class="nav-item">
                                         <a href="contact.html">Bog'lanish</a>
                                         
                                     </li>
                                 </ul>
                             </div>
                         </nav> <!-- nav -->
                     </div>
                     <div class="col-lg-2 col-md-2 col-sm-3 col-4">
                         <div class="right-icon text-right">
                             <ul>
                                 <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                
                             </ul>
                         </div> <!-- right icon -->
                     </div>
                    
                 </div> <!-- row -->
             </div> <!-- container -->
         </div>
         
    </header>
     
     <!--====== HEADER PART ENDS ======-->
    
     <!--====== SEARCH BOX PART START ======-->
     
    <div class="search-box">
        <div class="serach-form">
            <div class="closebtn">
                <span></span>
                <span></span>
            </div>
            <form action="#">
                <input type="text" placeholder="Search by keyword">
                <button><i class="fa fa-search"></i></button>
            </form>
        </div> <!-- serach form -->
    </div>
     
    
    <!--====== SEARCH BOX PART ENDS ======-->
        

        @yield('content')


    <!--====== FOOTER PART START ======-->
    
    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="{{asset('front/images/logo2.png')}}" alt="Logo"></a>
                            </div>
                            <p>Ushbu web sayt orqali konsalting va o'quv fanlaridan o'zingizga kerakli ma'lumotlarni olasiz.</p>
                            <ul class="mt-20">
                                <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div> <!-- footer about -->
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Menyu</h6>
                            </div>
                            <ul>
                                <li><a href="index-2.html"><i class="fa fa-angle-right"></i>Asosiy sahifa</a></li>
                                <li><a href="about.html"><i class="fa fa-angle-right"></i>Biz haqimizda</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>Yangiliklar</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>Konsalting</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>O'quv kurslari</a></li>
                            </ul>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Online darslae</a></li>
                                <li><a href="shop.html"><i class="fa fa-angle-right"></i>Bog'lanish</a></li>
                                
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Yordam</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>FAQS</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Privacy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Policy</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Support</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Documentation</a></li>
                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Bog'lanish</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Toshkent sh. Yunusobod t. Amir Temur 18-uy</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>90 353 44 35</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@classedu.uz</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->
        
        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright text-md-center text-center pt-15">
                            <p><a>Barcha huquqlar himoyalangan © {{date('Y')}}</a> </p>
                        </div>
                    </div>
                   
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>
    
    <!--====== FOOTER PART ENDS ======-->
   
    <!--====== BACK TO TP PART START ======-->
    
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    
    <!--====== BACK TO TP PART ENDS ======-->
   
    
    
    
    
    
    
    
    <!--====== jquery js ======-->
    <script src="{{asset('/front/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <script src="{{asset('/front/js/vendor/jquery-1.12.4.min.js')}}"></script>

    <!--====== Bootstrap js ======-->
    <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
    
    <!--====== Slick js ======-->
    <script src="{{asset('/front/js/slick.min.js')}}"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="{{asset('/front/js/jquery.magnific-popup.min.js')}}"></script>
    
    <!--====== Counter Up js ======-->
    <script src="{{asset('/front/js/waypoints.min.js')}}"></script>
    <script src="{{asset('/front/js/jquery.counterup.min.js')}}"></script>
    
    <!--====== Nice Select js ======-->
    <script src="{{asset('/front/js/jquery.nice-select.min.js')}}"></script>
    
    <!--====== Nice Number js ======-->
    <script src="{{asset('/front/js/jquery.nice-number.min.js')}}"></script>
    
    <!--====== Count Down js ======-->
    <script src="{{asset('/front/js/jquery.countdown.min.js')}}"></script>
    
    <!--====== Validator js ======-->
    <script src="{{asset('/front/js/validator.min.js')}}"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="{{asset('/front/js/ajax-contact.js')}}"></script>
    
    <!--====== Main js ======-->
    <script src="{{asset('/front/js/main.js')}}"></script>
    
    <!--====== Map js ======-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="{{asset('/front/js/map-script.js')}}"></script>

</body>
</html>
