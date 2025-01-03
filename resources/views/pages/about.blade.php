@extends('layouts.app')

@section('content')
   <!-- Section Title -->
   <div class="container section-title" data-aos="fade-up">
    <span>About Us<br></span>
    <h2>About</h2>
    {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> --}}
  </div><!-- End Section Title -->

  <div class="container">

    <div class="row gy-4">
      <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
        <img src="assets/img/About.jpg" class="img-fluid" alt="">
      </div>
      <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
        <p class="fst-italic">
          We are a platform dedicated to connecting clients with professional interior designers, engineers, and suppliers in Libya. Our goal is to simplify the architectural and design process by providing a user-friendly space where clients can easily find the right experts, collaborate on their projects, and access a wide range of home furnishings directly.
        </p>
        <p>
          Whether you're living abroad, busy with daily responsibilities, or looking for professional assistance locally, our platform ensures seamless communication and efficient project management. We facilitate the entire process, from selecting a designer to reviewing designs and purchasing home accessories.         
        </p>
      </div>
    </div>
   
  </div>
</section>
@endsection
<!-- /About Section -->