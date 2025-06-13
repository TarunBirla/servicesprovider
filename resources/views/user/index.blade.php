  
 
 
 @extends('user.layout.main')
    @section('content')
     <main class="main">

    <!-- Hero Section -->

   
    

    <section id="features" class="features section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-lg-3" >
         <img src="https://sewamitra.up.gov.in/images/SewaMitra.png" class="img-fluid" alt="">
        </div>
        <div class="col-lg-6 mt-5 text-center" >
         <h1>Services Provider</h1>
        </div>
        <div class="col-lg-3" >
         <img src="https://sewamitra.up.gov.in/images/SewaMitra.png" class="img-fluid" alt="">
         
        </div>
        </div>
      </div>
      <div class=" mt-5">

      
<section id="hero" class="hero section dark-background">
        <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

          <div class="tab-pane fade active show" id="features-tab-1">
               <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">

        <!-- Slide 1 -->
       <div class="d-flex align-items-center justify-content-center" style="min-height: 60vh;">
            <div class="container text-center">
              <h2 class="mb-4">
                Search Home & Office Services
              </h2>

              <div class="row justify-content-center">
                <div class="col-12 col-md-4 mb-3">
                  <select class="form-control" style="height: 50px;">
                    <option>Select District</option>
                    <option>Indore</option>
                    <option>Bhopal</option>
                    <option>Harda</option>
                    <option>Gwalior</option>
                  </select>
                </div>
                <div class="col-12 col-md-4 mb-3">
                  <select class="form-control" style="height: 50px;">
                    <option>Select Category</option>
                    <option>Technologist</option>
                    <option>Electrician</option>
                    <option>Plumber</option>
                    <option>Carpenter</option>
                  </select>
                </div>
                <div class="col-12 col-md-2 mb-3">
                  <button class="btn btn-light w-100" style="height: 50px;">Search</button>
                </div>
              </div>
                </div>
              </div>


       

      </div>

      <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
          <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
        </defs>
        <g class="wave1">
          <use xlink:href="#wave-path" x="50" y="3"></use>
        </g>
        <g class="wave2">
          <use xlink:href="#wave-path" x="50" y="0"></use>
        </g>
        <g class="wave3">
          <use xlink:href="#wave-path" x="50" y="9"></use>
        </g>
      </svg>
</section>
      </div><!-- End Tab Content Item -->
  </main>
    @endsection
