<!DOCTYPE html>
<!--
  This is a starter template page. Use this page to start your new project from
  scratch. This page gets rid of all links and provides the needed markup only.
  -->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atelier 31</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link href="{{ asset("public/frontend/lib/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome -->
    <link href="{{ asset("public/frontend/lib/fontAwesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- STYLE -->
    <link href="{{ asset("public/frontend/scss/style.css") }}" rel="stylesheet">

    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/frontend/img/favicon.png') }}"/>


    <script src="{{ asset ("public/frontend/lib/jquery/jquery.min.js") }}"></script>
    <script src="{{ asset ("public/frontend/lib/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/lib/angular-1.6.6/angular.min.js") }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-animate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.5/angular-aria.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-material/1.1.5/angular-material.min.js"></script>
    <script src="{{ asset ("public/frontend/app/lib/angular-1.6.6/angular-route.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/lib/angular-1.6.6/angular-resource.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/lib/angular-1.6.6/angular-cookies.js") }}"></script>

    <script src="{{ asset ("public/frontend/js/lib/ui-bootstrap-tpls-2.5.0.min.js") }}"></script>
    <script src="{{ asset ("public/frontend/js/script.js") }}"></script>
    <script src="{{ asset ("public/frontend/js/nav_responsive.js") }}"></script>
    <script src="{{ asset ("public/frontend/js/lib/js.cookie.js") }}"></script>
    <!-- Angularjs -->
    <link rel="stylesheet" href="{{ asset ("public/frontend/rating/jk-rating-stars.min.css") }}" />
    <script src="{{ asset ("public/frontend/rating/jk-rating-stars.min.js") }}"></script>

    <!-- Angular Mansonry -->

    <script src="{{ asset('bower_components') }}/jquery-bridget/jquery-bridget.js"></script>
    <script src="{{ asset('bower_components') }}/ev-emitter/ev-emitter.js"></script>
    <script src="{{ asset('bower_components') }}/desandro-matches-selector/matches-selector.js"></script>
    <script src="{{ asset('bower_components') }}/fizzy-ui-utils/utils.js"></script>
    <script src="{{ asset('bower_components') }}/get-size/get-size.js"></script>
    <script src="{{ asset('bower_components') }}/outlayer/item.js"></script>
    <script src="{{ asset('bower_components') }}/outlayer/outlayer.js"></script>
    <script src="{{ asset('bower_components') }}/masonry/masonry.js"></script>

    <!-- optional -->
    <script src="{{ asset('bower_components') }}/imagesloaded/imagesloaded.js"></script>
    <!-- /optional -->

    <script src="{{ asset('bower_components') }}/angular-masonry/angular-masonry.js"></script>

    <script src="{{ asset ("public/frontend/app/app.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/main.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/subscribe.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/quotation.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/library.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/search.js") }}"></script>
    <script src="{{ asset ("public/frontend/app/controllers/likeproduct.js") }}"></script>



    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <style type="text/css">
        /* Styles go here */

        .my-custom-stars .button .material-icons {
          font-size: 50px; 
        }

        .my-custom-stars .star-button.star-on .material-icons {
          color: #003399; 
        }

        .my-custom-stars .star-button.star-off .material-icons {
          color: #99ccff; 
        }
    </style>
</head>

<body ng-app="atelierApp" ng-controller="MainController">
<!-- Main Header -->
@include('layouts.header')
@yield('content')
<!-- /.content-wrapper -->
<!-- Footer -->
@include('layouts.footer')


<div id="before-send" style="display: none;">
    <div class="modal fade" role="dialog" style="display: block; opacity: .5; background-color: rgba(0,0,0,.65);">
        <div class="modal-dialog" style="color:#fff; text-align:center; padding-top:300px;">
            <i class="fa fa-2x fa-spinner fa-spin" aria-hidden="true"></i>
        </div>
    </div>
</div>

<script>
        $('#birthday').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });
</script>
</body>
</html>