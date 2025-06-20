<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Service Provider</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="assets/user/img/favicon.png" rel="icon">
  <link href="assets/user/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  

  <!-- Vendor CSS Files -->
  <link href="assets/user/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/user/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/user/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/user/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/user/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/user/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <!-- <linl href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css" rel="stylesheet"> -->
  <!-- <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap5.min.css" rel="stylesheet"> -->
  <!-- <link href="https://cdn.datatables.net/select/1.6.0/css/select.dataTables.min.css" rel="stylesheet"> -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/2.3.2/css/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Main CSS File -->
  <link href="assets/user/css/main.css" rel="stylesheet">
  <!-- =======================================================
  * Template Name: Selecao
  * Template URL: https://bootstrapmade.com/selecao-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
    @include('user.layout.navbar')
    @yield('content')
    @include('user.layout.footer')

<a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>
    <script src="assets/user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/user/vendor/php-email-form/validate.js"></script>
  <script src="assets/user/vendor/aos/aos.js"></script>
  <script src="assets/user/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/user/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/user/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/user/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/user/js/main.js"></script>
  <script>
    new DataTable('#example');
    $('#example').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": true
            });
        
    
  </script>
  <!-- https://code.jquery.com/jquery-3.7.1.js
https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js
https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js
https://cdn.datatables.net/2.3.2/js/dataTables.js
https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap4.js -->
<script  src="https://code.jquery.com/jquery-3.7.1.js"   integrity="sha256-eKhayi8LEQwp4NKj8Xzj1scN9yblvjVM/3VSNIWpA4k="   crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.bootstrap4.js"></script>

</body>
</html>