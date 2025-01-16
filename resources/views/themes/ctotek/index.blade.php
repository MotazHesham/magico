
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="{{ get_setting('meta_keywords') }}" />
    <meta name="description" content="{{ get_setting('meta_description') }}" />
    <meta name="author" content="" />
    <!-- Title  -->
    <title>{{ get_setting('meta_title') }}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ settingAsset(get_setting('icon')) }}" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,600,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:400,500,700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Mono:400,700&amp;display=swap" rel="stylesheet">

    <style> 
        :root  {
            --first-color: {{ get_setting('first_color','#FF9000') }};  
        } 
    </style>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/bootstrap.css" />
    <!-- Animate Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/animate.css" />
    <!-- FontAwesome Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/all.css" />
    <!-- ioicons Css -->
    <!-- <link rel="stylesheet" href="themes/ctotek/css/plugins/ionicons.css" /> -->
    <!-- Magnific Popup Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/magnific-popup.css" />
    <!-- Slick Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/slick.css" />
    <link rel="stylesheet" href="themes/ctotek/css/plugins/slick-theme.css" />
    <!-- Swiper Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/swiper.css" />
    <!-- Helper Css -->
    <link rel="stylesheet" href="themes/ctotek/css/plugins/helper.css" />
    <!-- Main Style Css -->
    <link rel="stylesheet" href="themes/ctotek/css/style.css" />
    <!-- Responsive Style Css -->
    <link rel="stylesheet" href="themes/ctotek/css/responsive.css" />
    <style>
        .quote-block {
            background: url('{{settingAsset(get_setting('contactusimage'))}}') center fixed;
            background-size: cover;
            position: relative;
        } 
        .svg-icon {
            width: 24px;
            height: 24px;
            vertical-align: middle;
            fill: currentColor;
            transition: transform 0.3s;
        }
    </style>
</head>
<body class="light">
    <!-- Start Preloader -->
    <div id="preloader">
        <div class="loading-text"></div>
    </div>
    <!-- End Preloader -->
    <!-- Start Scroll Top -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- End Scroll Top -->
    <!-- Start Header -->
    <div id="nav-bar" class="top-navbar">
        <div class="container-fluid">
            <div class="logo">
                <a href="#"><img src="{{ settingAsset(get_setting('logo')) }}" alt=""></a>
            </div>
            <div class="menu-icon">
                <span class="icon">
                    <i></i>
                    <i></i>
                    <i></i>
                </span>
                <span class="text">Menu</span>
            </div>
        </div>
    </div>
    <!-- End Header -->
    <!-- Start Navbar -->
    <div class="menu-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="menu-links">
                        <ul class="main-menu list-unstyled">
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#home" class="link"><span class="nm">01.</span>Home</a>
                                </div>
                            </li>
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#about" class="link"><span class="nm">02.</span>About Us</a>
                                </div>
                            </li>
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#portfolio" class="link"><span class="nm">03.</span>Portfolio</a>
                                </div>
                            </li>
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#services" class="link"><span class="nm">04.</span>Services</a>
                                </div>
                            </li>
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#testimonial" class="link"><span class="nm">05.</span>Testimonial</a>
                                </div>
                            </li>
                            <li>
                                <div class="overflow-hidden">
                                    <a href="#contact" class="link"><span class="nm">06.</span>Contact</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Navbar -->
    <!-- Start Wrapper -->
    <div class="wrapper">

        <!-- Start Slider -->
        <section class="slider fixed-slider slide-controls" id="home">
            <div class="swiper-container parallax-slider">
                <div class="swiper-wrapper">
                    @foreach($sliders as $slider)
                        <div class="swiper-slide">
                            <div class="bg-img v-align-center" data-background="{{ $slider->image ? $slider->image->getUrl() : '' }}" data-overlay-dark="3">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-10 offset-lg-1">
                                            <div class="caption">
                                                <h2>
                                                    <a href="{{ $slider->link }}">
                                                        {{ $slider->headline_1 }}
                                                        <br> {{ $slider->headline_2 }}
                                                    </a>
                                                </h2>
                                                <a href="#" class="dis">{{ $slider->description }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
                <!-- slider setting -->
                <div class="swiper-button-next swiper-nav-ctrl next-ctrl">
                    <i class="fas fa-caret-right"></i>
                </div>
                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl">
                    <i class="fas fa-caret-left"></i>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>
        <!-- End Slider -->

        <div class="main-content">
            <!-- Start Company -->
            <section class="company section" id="about">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="content">
                                <div class="section-head">
                                    <h6 class="wow">{{ get_setting('about_us_1') }}</h6>
                                    <h3 class="wow">{!! nl2br(get_setting('about_us_2')) !!}</h3>
                                </div>
                                <h1 class="wow seo-title">{{ get_setting('about_us_3') }}</h1>
                                <p class="wow fadeIn" data-wow-delay=".2s">
                                    {!! nl2br(get_setting('about_us_4')) !!}
                                </p> 
                                {!! nl2br(get_setting('about_us_5')) !!} 
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="img d-flex position-relative">
                                <div class="imgone wow fadeInDown" data-wow-delay=".8s">
                                    <img class="thumparallax-down" src="{{ settingAsset(get_setting('about_us_image_1')) }}" alt="">
                                </div>
                                <div class="imgtwo wow fadeInUp" data-wow-delay=".6s">
                                    <img class="thumparallax" src="{{ settingAsset(get_setting('about_us_image_2')) }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Company -->

            <!-- Start Work -->
            <section class="work-slider section bg-light" id="portfolio">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-head">
                                <h6 class="wow">أعمال رائعة</h6>
                                <h3 class="wow">أعمالنا الإبداعية.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row no-gutters mt-4">
                        <div class="col-lg-12">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach($creativeWorks as $creativeWork)
                                        <div class="swiper-slide">
                                            <div class="content position-relative">
                                                <div class="img position-relative">
                                                    <span class="img-container">
                                                        <span class="wow img-loader" data-delay="300"></span>
                                                        <img src="{{ $creativeWork->image ? $creativeWork->image->getUrl() : '' }}" class="w-100" alt="">
                                                    </span>
                                                </div>
                                                <div class="img-content">
                                                    <h6><a href="#">{{ $creativeWork->title_1 }}</a></h6>
                                                    <h4><a href="#">{{ $creativeWork->title_2 }}</a></h4>
                                                </div>
                                                <a href="{{ $creativeWork->image ? $creativeWork->image->getUrl() : '' }}" class="js-zoom-gallery d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </div> 
                                    @endforeach
                                </div>
                                <!-- slider setting -->
                                <div class="swiper-button-next swiper-nav-ctrl next-ctrl"> 
                                    <ion-icon name="arrow-forward"></ion-icon>
                                </div>
                                <div class="swiper-button-prev swiper-nav-ctrl prev-ctrl"> 
                                    <ion-icon name="arrow-back"></ion-icon>
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Work -->

            <!-- Start Services -->
            <section class="services-section section" id="services">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-head">
                                <h6 class="wow">تعرف علينا بشكل أفضل</h6>
                                <h3 class="wow">أفضل خدماتنا</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <p class="wow fadeIn mt-4" data-wow-delay=".1s">
                                {!! get_setting('services_text') !!}
                            </p>
                        </div>
                        @foreach($services as $service)
                            <div class="col-md-4">
                                <div class="w-100 box-hover position-relative items">
                                    <div class="steps-hover-thumb bg-img" data-background="{{ $service->image ? $service->image->getUrl() : '' }}"></div>
                                    <div class="item wow z-index-2 fadeIn" data-wow-delay=".3s">
                                        <span class="icon d-flex align-items-center justify-content-center">
                                            <i class="fas {{ $service->icon }}"></i>
                                        </span>
                                        <h5 class="text-white wow">{{ $service->name }}</h5>
                                        <p class="text-white">
                                            {!! $service->description !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach 
                    </div>
                </div>
            </section>
            <!-- End Services -->

            <!-- Start Testimonials -->
            <section class="testimonials section bg-light" id="testimonial">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-head">
                                <h6 class="wow">شهاداتنا</h6>
                                <h3 class="wow">ماذا يقول عملاؤنا</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row no-gutters mt-4">
                        <div class="col-lg-12">
                            <div class="quote position-relative">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper ">
                                        @foreach($testimonials as $testimonial)
                                            <div class="swiper-slide p-5">
                                                <h4>{{ $testimonial->title }}</h4>
                                                <p class="my-3">{!! $testimonial->comment !!}</p>
                                                <div class="author-info text-right w-100">
                                                    <h5>{{ $testimonial->name }}</h5>
                                                    <h6>{{ $testimonial->job }} </h6>
                                                </div>
                                            </div> 
                                        @endforeach
                                    </div>
                                    <!-- slider setting -->
                                    <div class="swiper-pagination position-relative"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Testimonial -->
            <!-- Start Quote -->
            <section class="quote-block section" data-overlay-dark="5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-8 col-lg-9">
                            <div class="content sm-mb30">
                                <h6 class="wow">دعونا نتحدث</h6>
                                <h2 class="wow">
                                    {!! get_setting('contact_us_text') !!}
                                </h2>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-3 v-align-center">
                            <a href="#contact" class="btn-main btn-lit"><span>تواصل معنا</span></a>
                        </div>

                    </div>
                </div>
            </section>
            <!-- End Quote -->
            <!-- Start Contact -->
            <section id="contact" class="contact-area section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-head">
                                <h6 class="wow">هل تحتاج إلى مساعدة!</h6>
                                <h3 class="wow">اتصل بنا الآن.</h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="contact-information wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="1.5s">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="contact-details">
                                            <i class="fas fa-phone"></i>
                                            <p>اتصل بنا</p>
                                            <h6>
                                                <a href="tel:{{get_setting('phone')}}">{{ get_setting('phone') }}</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="contact-details">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>تفضل بزيارة موقعنا</p>
                                            <h6>{{ get_setting('address') }}</h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="contact-details">
                                            <i class="fas fa-paper-plane"></i>
                                            <p>البريد الالكتروني</p>
                                            <h6>
                                                <a href="mailto:{{ get_setting('email') }}">
                                                    {{ get_setting('email') }}
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="contact-details">
                                            <i class="fas fa-share-alt"></i>
                                            <p>وسائل التواصل الاجتماعي</p>
                                            <ul class="social-icons mb-0 list-unstyled d-flex align-items-center">
                                                @if(get_setting('facebook'))
                                                    <li class="mr-2"><a href="{{ get_setting('facebook') }}" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                                                @endif
                                                @if(get_setting('twitter'))
                                                    <li class="mr-2"><a href="{{ get_setting('twitter') }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                                @endif
                                                @if(get_setting('linkedin'))
                                                    <li class="mr-2"><a href="{{ get_setting('linkedin') }}" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                                                @endif
                                                @if(get_setting('tiktok'))
                                                    <li class="mr-2">
                                                        <a href="{{get_setting('tiktok')}}" target="_blank">
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-icon" style="width: 24px; height: 24px; fill: currentColor;">
                                                                <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                                                            </svg>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if(get_setting('snapchat'))
                                                    <li class="mr-2"><a href="{{ get_setting('snapchat') }}" target="_blank"><i class="fab fa-snapchat"></i></a></li>
                                                @endif
                                                @if(get_setting('instagram'))
                                                    <li class="mr-2"><a href="{{ get_setting('instagram') }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <form class="contact-form form wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="1.5s" method="POST" action="{{ route('frontend.send_contract_us') }}">
                                @csrf
                                <div class="controls">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group has-error has-danger">
                                                <input id="form_name" type="text" name="name" placeholder="الاسم بالكامل" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group has-error has-danger">
                                                <input id="form_name" type="text" name="phone" placeholder="رقم الهاتف" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group has-error has-danger">
                                                <input id="form_email" type="email" name="email" placeholder="البريد الإلكتروني" required="required">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="form-group has-error has-danger">
                                                <input id="form_subject" type="text" name="subject" placeholder="الموضوع" required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea id="form_message" name="message" placeholder="الرسالة" rows="4" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="submit" class="btn-main"><span>SEND MESSAGE</span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Contact-->
            <!-- Start Footer -->
            <footer class="footer theme-bg overflow-hidden">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer-top">
                                <div class="foot_logo d-flex align-items-center justify-content-center">
                                    <img src="{{ settingAsset(get_setting('logo')) }}" class="img-fluid d-block" alt="">
                                </div>
                                <p class="ftr-about mx-auto">{{ get_setting('footer_text') }}</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <ul class="footer_menu_list list-unstyled mb-0 d-flex justify-content-center">
                                @if(get_setting('important_links'))
                                    @foreach(json_decode(get_setting('important_links'), true) as $key => $link)  
                                        <li>
                                            <a href="{{ $link['link'] }}" target="_blank">  
                                                {{ $link['name'] }} 
                                            </a>
                                        </li>  
                                    @endforeach 
                                @endif 
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <div class="copyrights">
                                <p class="mb-0 text-center">{{ get_setting('copy_right') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->
        </div>
    </div>
    <!-- End Wrapper -->
    <!-- Start Cursor -->
    <div class="circle"></div>
    <div class="circle-follow"></div>
    <!-- End Cursor -->
    
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

    <!-- jQuery -->
    <script src="themes/ctotek/js/jquery.js"></script>
    <!-- plugins -->
    <script src="themes/ctotek/js/pace.js"></script>
    <script src="themes/ctotek/js/gsap.js"></script>
    <script src="themes/ctotek/js/TweenMax.js"></script>
    <script src="themes/ctotek/js/splitting.js"></script>
    <script src="themes/ctotek/js/simpleParallax.js"></script>
    <script src="themes/ctotek/js/swiper.js"></script>
    <script src="themes/ctotek/js/wow.js"></script>
    <script src="themes/ctotek/js/jquery.magnific-popup.js"></script>
    <!-- custom scripts -->
    <script src="themes/ctotek/js/main.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>