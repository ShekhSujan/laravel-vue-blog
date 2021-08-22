<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="MediaCenter, Template, eCommerce">
    <meta name="robots" content="all">

    <title>Blog</title>

    <link rel="stylesheet" href="{{asset('css/all.css')}}">

</head>

<body class="cnt-home">
    <div id="element">
        <!-- ============================================== HEADER ============================================== -->
        <header class="header-style-1">

            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
                            <!-- ============================================================= LOGO ============================================================= -->
                            <div class="logo">
                                <a href="home.html">

                                    <img src="{{asset('images/logo.png')}}" alt="">

                                </a>
                            </div><!-- /.logo -->
                            <!-- ============================================================= LOGO : END ============================================================= -->
                        </div><!-- /.logo-holder -->

                        <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                            <!-- /.contact-row -->
                            <!-- ============================================================= SEARCH AREA ============================================================= -->
                            <div class="search-area">
                                <form>
                                    <div class="control-group">

                                        <ul class="categories-filter animate-dropdown">
                                            <li class="dropdown">

                                                <a class="dropdown-toggle" data-toggle="dropdown"
                                                    href="category.html">Categories <b class="caret"></b></a>

                                                <ul class="dropdown-menu" role="menu">
                                                    <li class="menu-header">Computer</li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                            href="category.html">- Clothing</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                            href="category.html">- Electronics</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                            href="category.html">- Shoes</a></li>
                                                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                                            href="category.html">- Watches</a></li>

                                                </ul>
                                            </li>
                                        </ul>

                                        <input class="search-field" placeholder="Search here..." />

                                        <a class="search-button" href="#"></a>

                                    </div>
                                </form>
                            </div><!-- /.search-area -->
                            <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                        </div><!-- /.top-search-holder -->


                    </div><!-- /.row -->

                </div><!-- /.container -->

            </div><!-- /.main-header -->

            <!-- ============================================== NAVBAR ============================================== -->
            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="yamm navbar navbar-default" role="navigation">
                        <div class="navbar-header">
                            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                                class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="nav-bg-class">
                            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                                <div class="nav-outer">
                                    <ul class="nav navbar-nav">
                                        <li class="active dropdown yamm-fw">
                                            <a href="home.html" data-hover="dropdown" class="dropdown-toggle"
                                                data-toggle="dropdown">Home</a>

                                        </li>
                                    </ul><!-- /.navbar-nav -->
                                    <div class="clearfix"></div>
                                </div><!-- /.nav-outer -->
                            </div><!-- /.navbar-collapse -->


                        </div><!-- /.nav-bg-class -->
                    </div><!-- /.navbar-default -->
                </div><!-- /.container-class -->

            </div><!-- /.header-nav -->
            <!-- ============================================== NAVBAR : END ============================================== -->

        </header>

        <!-- ============================================== HEADER : END ============================================== -->
        <div class="breadcrumb">
            <div class="container">
                <div class="breadcrumb-inner">
                    <ul class="list-inline list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li class='active'>Blog</li>
                    </ul>
                </div><!-- /.breadcrumb-inner -->
            </div><!-- /.container -->
        </div><!-- /.breadcrumb -->

        <div class="body-content">
            <div class="container">
                <div class="row">
                    <div class="blog-page">
                        <div class="col-md-9">
                            <router-link to="/">Home</router-link>
                            <router-link to="/about">About</router-link>
                            <router-view></router-view>
                        </div>


                        <div class="col-md-3 sidebar">
                            <div class="sidebar-module-container">
                                <!-- ==============================================CATEGORY============================================== -->
                                <div class="sidebar-widget outer-bottom-xs wow fadeInUp">
                                    <h3 class="section-title">Category</h3>
                                    <div class="sidebar-widget-body m-t-10">
                                        <div class="accordion">
                                            <div class="accordion-group">
                                                <div class="accordion-heading">
                                                    <a href="#collapseOne">
                                                        Camera
                                                    </a>
                                                </div><!-- /.accordion-heading -->
                                            </div><!-- /.accordion-group -->
                                        </div><!-- /.accordion -->
                                    </div><!-- /.sidebar-widget-body -->
                                </div><!-- /.sidebar-widget -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================= FOOTER ============================================================= -->
        <footer id="footer" class="footer color-bg">


            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Contact Us</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class="toggle-footer" style="">
                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p>ThemesGround, 789 Main rd, Anytown, CA 12345 USA</p>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-mobile fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <p>+(888) 123-4567<br>+(888) 456-7890</p>
                                        </div>
                                    </li>

                                    <li class="media">
                                        <div class="pull-left">
                                            <span class="icon fa-stack fa-lg">
                                                <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                            </span>
                                        </div>
                                        <div class="media-body">
                                            <span><a href="#">flipmart@themesground.com</a></span>
                                        </div>
                                    </li>

                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Customer Service</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a href="#" title="Contact us">My Account</a></li>
                                    <li><a href="#" title="About us">Order History</a></li>
                                    <li><a href="#" title="faq">FAQ</a></li>
                                    <li><a href="#" title="Popular Searches">Specials</a></li>
                                    <li class="last"><a href="#" title="Where is my order?">Help Center</a></li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Corporation</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a title="Your Account" href="#">About us</a></li>
                                    <li><a title="Information" href="#">Customer Service</a></li>
                                    <li><a title="Addresses" href="#">Company</a></li>
                                    <li><a title="Addresses" href="#">Investor Relations</a></li>
                                    <li class="last"><a title="Orders History" href="#">Advanced Search</a></li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div><!-- /.col -->

                        <div class="col-xs-12 col-sm-6 col-md-3">
                            <div class="module-heading">
                                <h4 class="module-title">Why Choose Us</h4>
                            </div><!-- /.module-heading -->

                            <div class="module-body">
                                <ul class='list-unstyled'>
                                    <li class="first"><a href="#" title="About us">Shopping Guide</a></li>
                                    <li><a href="#" title="Blog">Blog</a></li>
                                    <li><a href="#" title="Company">Company</a></li>
                                    <li><a href="#" title="Investor Relations">Investor Relations</a></li>
                                    <li class=" last"><a href="contact-us.html" title="Suppliers">Contact Us</a>
                                    </li>
                                </ul>
                            </div><!-- /.module-body -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="copyright-bar">
                <div class="container">
                    <div class="col-xs-12 col-sm-6 no-padding social">
                        <ul class="link">
                            <li class="fb pull-left"><a target="_blank" rel="nofollow" href="#" title="Facebook"></a>
                            </li>
                            <li class="tw pull-left"><a target="_blank" rel="nofollow" href="#" title="Twitter"></a>
                            </li>
                            <li class="googleplus pull-left"><a target="_blank" rel="nofollow" href="#"
                                    title="GooglePlus"></a></li>
                            <li class="rss pull-left"><a target="_blank" rel="nofollow" href="#" title="RSS"></a>
                            </li>
                            <li class="pintrest pull-left"><a target="_blank" rel="nofollow" href="#"
                                    title="PInterest"></a>
                            </li>
                            <li class="linkedin pull-left"><a target="_blank" rel="nofollow" href="#"
                                    title="Linkedin"></a>
                            </li>
                            <li class="youtube pull-left"><a target="_blank" rel="nofollow" href="#"
                                    title="Youtube"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 no-padding">
                        <div class="clearfix payment-methods">
                            <ul>
                                <li><img src="assets/images/payments/1.png" alt=""></li>
                                <li><img src="assets/images/payments/2.png" alt=""></li>
                                <li><img src="assets/images/payments/3.png" alt=""></li>
                                <li><img src="assets/images/payments/4.png" alt=""></li>
                                <li><img src="assets/images/payments/5.png" alt=""></li>
                            </ul>
                        </div><!-- /.payment-methods -->
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script src="{{asset('js/app2.js')}}"></script>
    <script src="{{asset('js/all.js')}}"></script>
</body>

</html>