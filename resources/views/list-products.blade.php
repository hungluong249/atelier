@extends('layouts.frontend-template')
@section('content')

    <style>
        header.header{
            position: static;
        }

        footer.footer{
            display: block !important;
        }
    </style>

    <section id="product" ng-controller="LibraryController">
        <section class="section-header">
            <div class="container-fluid">
                <div class="container header">
                    <h1 class="heading dark">
                        sản phẩm của chúng tôi
                    </h1>
                </div>
                <div class="introduce">
                    <div class="container">
                        <div class="row">
                            <div class="left col-sm-6 col-xs-12">
                                <h4 class="sub-heading">
                                    <% introProduct.sub_title %>
                                </h4>
                            </div>

                            <div class="right col-sm-6 col-xs-12">
                                <p class="paragraph"  ng-bind-html="$sce.trustAsHtml(introProduct.description)"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="list-product">
            <div class="container">
                <div masonry load-images="true">

                    <div class="masonry-brick <% $index%2==0 ? 'masonry-brick-height-2' : '' %>" ng-repeat="product in library">
                        <a href="{{ url('/san-pham/chi-tiet') }}<% '/' + product.slug  %>" target="_self">
                            <div class="inner">
                                <div class="mask">
                                    <img ng-src="{{ asset('storage/app/library') }}<% '/' + product.slug + '/' + product.image %>" alt="A masonry brick">

                                    <div class="content">
                                        <h2 class="post-heading dark"><% product.title %></h2>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </section>


    <script src="{{ asset ("public/frontend/app/controllers/library.js") }}"></script>

@endsection