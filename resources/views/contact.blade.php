@extends('layouts.app') 

@section('content')
<div>
    <div>
     <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- main header -->
         <header class="main-header menu-absolute">
            <!--Header-Upper-->
            <div class="header-upper">
    <div class="container container-1620 clearfix">

        <div class="header-inner rel d-flex align-items-center">
            <div class="logo-outer">
                <div class="logo">
                    <a href="{{ url('/') }}">
                       <h2>Portfolio</h2>
                    </a>
                </div>
            </div>

            <div class="nav-outer clearfix mx-auto">
                <!-- Main Menu -->
                <nav class="main-menu navbar-expand-lg">
                    <div class="navbar-header">
                        <div class="mobile-logo my-15">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo" title="Logo">
                            </a>
                        </div>
                        
                        <!-- Toggle Button -->
                        <button type="button" class="navbar-toggle me-4" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                            <li class="dropdown"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="{{ url('about') }}">about</a></li>
                            <li><a href="{{ url('services') }}">services</a></li>
                            <li><a href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </div>

                </nav>
                <!-- Main Menu End-->
            </div>
            
            <!-- Menu Button -->
            <div class="menu-btns">
                <!-- menu sidbar -->
                <div class="menu-sidebar">
                    <button>
                        <img src="{{ asset('assets/images/shape/sidebar-tottler.svg') }}" alt="Toggler">
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

            <!--End Header Upper-->
        </header>
       
       
        <!--Form Back Drop-->
        <div class="form-back-drop"></div>
        
        <!-- Hidden Sidebar -->
        <section class="hidden-bar">
            <div class="inner-box text-center">
                <div class="cross-icon"><span class="fa fa-times"></span></div>
                <div class="title">
                    <h4>Get Appointment</h4>
                </div>

                <!--Appointment Form-->
                <div class="appointment-form">
                    <form method="post" action="{{ route('send.appointment') }}">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" value="" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" value="" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Message" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="theme-btn">Submit now</button>
                        </div>
                    </form>
                </div>

                <!--Social Icons-->
                <div class="social-style-one">
                    <a href="https://www.linkedin.com/in/ammar-khalid-15883b247" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </section>
        <!--End Hidden Sidebar -->
       
        
        <!-- Page Banner Start -->
        <section class="page-banner-area pt-200 rpt-140 pb-100 rpb-60 rel z-1 text-center">
            <div class="container">
                <div class="banner-inner text-white">
                    <h1 class="page-title wow fadeInUp delay-0-2s">Reach Out </h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center wow fadeInUp delay-0-4s">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="bg-lines">
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
            </div>
        </section>
        <!-- Page Banner End -->
        
        
        <!-- Contact Page Area start -->
        <section class="contact-page pt-40 pb-130 rpb-100 rel z-1">
            <div class="container">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="row align-items-center">
                    <div class="col-lg-4">
                        <div class="contact-page-content rmb-55 wow fadeInUp delay-0-2s">
                            <div class="section-title mb-30">
                                <span class="sub-title mb-15">Get In Touch</span>
                                <h2>Let’s Talk For your <span>Next Projects</span></h2>
                               
                            </div>
                            <h6>Main Office</h6>
                            <div class="widget_contact_info mb-35">
                                <ul>
                                    <li><i class="far fa-map-marker-alt"></i> Abbottabad<br> Pakistan</li>
                                    <li><i class="far fa-envelope"></i> <a href="mailto:ammarmalik046@gmail.com">ammarmalik046@gmail.com</a></li>
                                    <li><i class="far fa-phone"></i> <a href="tel:+923345865096">+923345865096</a></li>
                                </ul>
                            </div>
                            <h5>Follow Me</h5>
                            <div class="social-style-one mt-10">
                                <a href="https://www.linkedin.com/in/ammar-khalid-15883b247" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="contact-page-form contact-form form-style-one wow fadeInUp delay-0-2s">
                            <form id="contactForm" class="contactForm" name="contactForm" action="{{ route('send.contact') }}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Full Name</label>
                                            <input type="text" id="name" name="name" class="form-control" value="" placeholder="Your Full Name" required data-error="Please enter your Name">
                                            <label for="name" class="for-icon"><i class="far fa-user"></i></label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" id="email" name="email" class="form-control" value="" placeholder="yourname@gmail.com" required data-error="Please enter your Email">
                                            <label for="email" class="for-icon"><i class="far fa-envelope"></i></label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" id="phone_number" name="phone_number" class="form-control" value="" placeholder="+923345865096" required data-error="Please enter your Phone Number">
                                            <label for="phone_number" class="for-icon"><i class="far fa-phone"></i></label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="subject">Subject</label>
                                            <input type="text" id="subject" name="subject" class="form-control" value="" placeholder="Subject" required data-error="Please enter your Subject">
                                            <label for="subject" class="for-icon"><i class="far fa-text"></i></label>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea name="message" id="message" class="form-control" rows="4" placeholder="Write message" required data-error="Please enter your Message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-0">
                                            <button type="submit" class="theme-btn">Send a Message <i class="far fa-angle-right"></i></button>
                                            <div id="msgSubmit" class="hidden"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-lines">
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
               <span></span><span></span>
            </div>
        </section>
        <!-- Contact Page Area end -->
        
        
        <!-- footer area start -->
        <footer class="main-footer rel z-1">
            <div class="footer-top-wrap bgc-black pt-100 pb-75">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2 col-md-12">
                            <div class="footer-widget widget_logo wow fadeInUp delay-0-2s">
                                <h2>Portfolio</h2>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="footer-widget widget_newsletter wow fadeInUp delay-0-4s">
                                <form action="#">
                                    <label for="email-address"><i class="far fa-envelope"></i></label>
                                    <input id="email-address" type="email" placeholder="Email Address" required>
                                    <button>Sign Up <i class="far fa-angle-right"></i></button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-5">
                            <div class="footer-widget widget_contact_info wow fadeInUp delay-0-6s">
                                <h6 class="footer-title">Address</h6>
                                <ul>
                                    <li><i class="far fa-map-marker-alt"></i> Pakistan</li>
                                    <li><i class="far fa-envelope"></i> <a href="mailto:ammarmalik046@gmail.com">ammarmalik046@gmail.com</a></li>
                                    <li><i class="far fa-phone"></i> <a href="tel:+923345865096">+923345865096</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom pt-20 pb-5 rpt-25">
                <div class="container">
                   <div class="row">
                       <div class="col-lg-6">
                            <div class="copyright-text">
                                <p>Copyright @2025, <a href="{{ url('/') }}">Ammar Portfolio</a> All Rights Reserved</p>
                            </div>
                       </div>
                       <div class="col-lg-6 text-lg-end">
                           <ul class="footer-bottom-nav">
                               <li><a href="https://www.linkedin.com/in/ammar-khalid-15883b247" target="_blank">LinkedIn</a></li>
                           </ul>
                       </div>
                   </div>
                   <!-- Scroll Top Button -->
                    <button class="scroll-top scroll-to-target" data-target="html"><span class="fas fa-angle-double-up"></span></button>
                </div>
                <div class="bg-lines">
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                   <span></span><span></span>
                </div>
            </div>
        </footer>
        <!-- footer area end -->

    </div>
</div>
</div>
@endsection