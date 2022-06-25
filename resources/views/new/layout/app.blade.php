<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Health System</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link href='https://fonts.googleapis.com/css?family=Tajawal' rel='stylesheet'>
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('new/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />

    <link rel="stylesheet" href="{{asset('new/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('new/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('new/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Helpers -->
    <script src="{{asset('new/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('new/assets/js/config.js')}}"></script>
    <style>
        body {
            font-family: 'Tajawal';font-size: 22px;
            background-color: #8789ff;
        }
    </style>
    @yield('style')

  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('new.layout.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page" >
          <!-- Navbar -->
            @include('new.layout.navbar',['title' => $title,'subtitle'=>$subtitle])

          <!-- / Navbar -->
          <div class="container-xxl flex-grow-1 container-p-y text-end">
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

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset("new/assets/vendor/libs/jquery/jquery.js")}}"></script>
    <script src="{{asset("new/assets/vendor/libs/popper/popper.js")}}"></script>
    <script src="{{asset("new/assets/vendor/js/bootstrap.js")}}"></script>
    <script src="{{asset("new/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js")}}"></script>

    <script src="{{asset("new/assets/vendor/js/menu.js")}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset("new/assets/js/main.js")}}"></script>

    <!-- Page JS -->
    @yield('script')
    <script>
        //add confermation to delete
        $('.delete').on('click', function(e) {
               e.preventDefault();
               var form = $(this).parents('form');
               swal({
                   title: "هل أنت متأكد؟",
                   text: "سيتم حذف السجل بشكل دائم",
                   icon: "warning",
                   buttons: [
                       'الغاء',
                       'حذف'
                   ],
                   dangerMode: true,
               }).then(function(isConfirm) {
                   if (isConfirm) {
                       form.submit();
                   }
               });
           });
       </script>
    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
