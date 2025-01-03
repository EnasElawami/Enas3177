
@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero section">

   <div class="container">
     <div class="row gy-4">
       <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
         <p>Build Your Dream Home<p>
         <h1>Us is all you need to be have Modern Design</h1>
         <p>You’re Way to Discover The Best
            Designs from Professional Engineers </p>
         {{-- <div class="d-flex">
           <a href="#about" class="btn-get-started">Get Started</a>
         </div> --}}
       </div>
         <!-- الصور -->
        <div class="col-lg-6 order-2 order-lg-2 hero-images" data-aos="zoom-out" data-aos-delay="200">
       <div class="image-container">
           <img src="{{ asset('assets/images/63e6a03d47341fafeda86e73189c5163.jpg') }}" alt="Main Image">
       </div>
   </div>
   </div>
   </div>

 </section>
 <!-- /Hero Section -->

 <!-- About Section -->
 <section id="about" class="about section">

   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
     <span>About Us<br></span>
     <h2>About</h2>
   </div><!-- End Section Title -->

   <div class="container">

     <div class="row gy-4">
       <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
         <img src="{{ asset('assets/images/5282654f3f82193b3a27ebc45bfc1b85.jpg') }}" class="img-fluid" alt="About Image">
       </div>
       <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
         <p class="fst-italic">
          We are an innovative and comprehensive platform dedicated to connecting clients with a wide range of professionals specializing in interior and exterior design, as well as engineers and suppliers across Libya. Our mission is to simplify every step of the design and architectural process by providing an advanced, user-friendly digital environment. Whether you’re based in Libya or living abroad, our platform offers you a unique opportunity to connect with top designers and engineers, collaborate on your projects, and explore a diverse collection of furniture and home accessories to meet your needs with the highest quality.         </p>
         <p>
          Whether you’re looking for innovative designs for your new home, enhancing existing spaces, or seeking professional consultations, our platform provides the tools and resources to bring your vision to life with ease and expertise. We ensure seamless and direct communication with professionals, starting from selecting the right designer or engineer, reviewing designs, and monitoring project progress step by step, to completing purchases for the necessary home accessories. Our vision is to offer an integrated experience that helps our clients achieve their dreams and turn their ideas into exceptional reality.       </div>
     </div>
   </div>
 </section><!-- /About Section -->

{{-- _____________________________________________________________ --}}
 <!-- Services Section -->
 <section id="services" class="services section light-background">

   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
     <span>Services</span>
     <h2>Our Services</h2>
   </div>
   <!-- End Section Title -->

   <div class="container">
     <div class="row gy-4">
       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
         <div class="service-item position-relative">
           <div class="icon">
             <i class="bi bi-activity"></i>
           </div>
           <a href="service-details.html" class="stretched-link">
             <h3>Professional Connectivity</h3>
           </a>
           <p>Facilitate seamless communication between clients and professional interior designers in Libya, enabling better project collaboration and understanding.
           </p>
         </div>
       </div>
       <!-- End Service Item -->

       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
         <div class="service-item position-relative">
           <div class="icon">
             <i class="bi bi-broadcast"></i>
           </div>
           <a href="service-details.html" class="stretched-link">
             <h3>Selecting the Ideal Designer</h3>
           </a>
           <p>Empowering clients to review designers’ portfolios and expertise to choose the most suitable one for their needs.</p>
         </div>
       </div>
       <!-- End Service Item -->

       <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
         <div class="service-item position-relative">
           <div class="icon">
             <i class="bi bi-easel"></i>
           </div>
           <a href="service-details.html" class="stretched-link">
             <h3>Home Accessories Store</h3>
           </a>
           <p>Offer an integrated marketplace for furniture and home accessories, allowing clients to browse, compare prices, and make direct purchases conveniently.
           </p>
         </div>
       </div>
       <!-- End Service Item -->
     </div>
   </div>

 </section>
 <!-- /Services Section -->

 {{-- ______________________________________________________________________ --}}
 <!--  Projects Section -->
 <section id="portfolio" class="portfolio section">

   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
     <span>Projects</span>
     <h2>Our Projects</h2>
   </div>
   <!-- End Section Title -->

   <div class="container">
       <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
         <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
           <img src= "{{ asset('assets/images/61932c7c936241d0e568bfe6c5e44af5.jpg') }}" class="img-fluid" alt="">
           <div class="portfolio-info">
             <h4>Contemporary Apartment Kitchen Design</h4>
             <p>A functional and stylish kitchen space with wooden details and modern touches that suit a modern lifestyle.</p>
             {{-- <a href="assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
             <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
           </div>
         </div><!-- End Portfolio Item -->

         <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
           <img src= "{{ asset('assets/images/a93f0ff511afb464331b6eaa46255b83.jpg') }}" class="img-fluid" alt="">

           <div class="portfolio-info">
             <h4>Modern Villa Living Space Design</h4>
             <p>A serene living corner with a contemporary design, neutral colors, and natural lighting that enhances the beauty of the space.</p>
             {{-- <a href="assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
             <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
           </div>
         </div><!-- End Portfolio Item -->

         <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
           <img src= "{{ asset('assets/images/cc231dc6a42e5298cc5ee00d1311671b.jpg') }}" class="img-fluid" alt="">
           <div class="portfolio-info">
             <h4>Elegant Villa Interior Design</h4>
             <p>A design that combines classic and modern styles, featuring warm colors and furniture that reflects sophistication and luxury.</p>
             {{-- <a href="assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
             <a href="portfolio-details.html" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a> --}}
           </div>
         </div><!-- End Portfolio Item -->

       </div><!-- End Portfolio Container -->

     </div>

   </div>

 </section>
 @endsection<!-- /Portfolio Section -->