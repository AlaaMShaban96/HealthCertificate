<!DOCTYPE html>
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
<!-- BEGIN: Head-->
<meta name="csrf-token" content="{{ csrf_token() }}" />

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
  <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
  <meta name="author" content="PIXINVENT">
  <title>Dashboard ecommerce - Vuexy - Bootstrap HTML admin template</title>
  <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/ico/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/vendors-rtl.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/charts/apexcharts.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/toastr.min.css') }}">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/bootstrap-extended.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/colors.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/components.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/dark-layout.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/bordered-layout.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/themes/semi-dark-layout.css') }}">

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/pages/dashboard-ecommerce.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/charts/chart-apex.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/plugins/extensions/ext-component-toastr.css') }}">
  <!-- END: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/extensions/sweetalert2.min.css') }}">

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css-rtl/custom-rtl.css') }}">
  {{-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style-rtl.css') }}"> --}}
  <!-- END: Custom CSS-->
  <style>
    /* body {
        font-family: 'Tajawal';font-size: 22px;
        background-color: #8789ff;
    } */
</style>
</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
  @include('new2.layout.navbar',['title' => $title,'subtitle'=>$subtitle])

  @include('new2.layout.menu')

   <!-- BEGIN: Content-->
 <div class="app-content content ">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper container-xxl p-0">
      <div class="content-header row">
      </div>
      <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{  $error}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endforeach
        @endif
        @if(Session::has('message'))

            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
    </div>
    @yield('contenter')
    </div>
  </div>
  <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page" >
          <!-- Navbar -->

          <!-- / Navbar -->
          {{-- <div class="container-xxl flex-grow-1 container-p-y text-end">
           
          </div> --}}
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <div class="buy-now">
      <a
        href="https://www.facebook.com/AlaaMShaban96/"
        title="Alaa M Shaban account"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Alaa Mohammed Shaban</a
      >
    </div>

     <!-- BEGIN: Vendor JS-->
     <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}"></script>
     <script src="{{ asset('app-assets/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
      {{-- <script src="{{ asset('app-assets/vendors/js/charts/apexcharts.min.js') }}"></script> --}}
     <script src="{{ asset('app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
     <script src="{{ asset('/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>

     {{-- <script src="../../../app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script> --}}
     <script src="{{ asset('app-assets/js/core/app-menu.js') }}"></script>
     <script src="{{ asset('app-assets/js/core/app.js') }}"></script>
 
      {{-- <script src="{{ asset('app-assets/js/scripts/pages/dashboard-ecommerce.js') }}"></script> --}}
     <!-- END: Page JS-->
 
     <script>
         $(window).on('load', function() {
             if (feather) {
                 feather.replace({
                     width: 14,
                     height: 14
                 });
             }
         })
     </script>

    <!-- Page JS -->
    @yield('script')
    <script>
        //add confermation to delete
        $('.delete').on('click', function(e) {
               e.preventDefault();
               var form = $('#deleteForm'+$(this).data('id'));
              // new swal({
              //      title: "هل أنت متأكد؟",
              //      text: "سيتم حذف السجل بشكل دائم",
              //      icon: "warning",
              //      buttons: [
              //          'الغاء',
              //          'حذف'
              //      ],
              //      dangerMode: true,
              //  }).then(function(isConfirm) {
              //      if (isConfirm) {
              //          form.submit();
              //      }
              //  });


               Swal.fire({
                      title: "هل أنت متأكد؟",
                      text: "سيتم حذف السجل بشكل دائم",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'نعم , سيتم الحدف',
                      cancelButtonText: 'الغاء'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        Swal.fire(
                          'Deleted!',
                          'Your file has been deleted.',
                          'success'
                        )
                        form.submit();

                      }
                    });
           });
       </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
