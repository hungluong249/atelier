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

    <section id="detail-product" ng-controller="DetailLibraryController">
        <section class="section-header">
            <div class="container-fluid">
                <div class="container header">
                    <h1 class="heading dark">
                        <% detail.title %>
                    </h1>
                </div>
                <div class="introduce">
                    <div class="container">
                        <div class="row">
                            <div class="left col-sm-6 col-xs-12">
                                <h4 class="sub-heading">
                                    <% detail.description %>
                                </h4>
                            </div>

                            <div class="right col-sm-6 col-xs-12">
                                <p class="paragraph" ng-bind-html="$sce.trustAsHtml(detail.content)">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <div class="container">
            <article>
                <div masonry load-images="true">
                    <div class="masonry-brick" ng-repeat="product in detail.image">
                        <img ng-src="{{ asset('storage/app/library') }}<% '/' + detail.slug + '/' + product.image %>" alt="A masonry brick">
                    </div>
                </div>
            </article>
        </div>


    </section>

    <script src="{{ asset ("public/frontend/app/controllers/detail-library.js") }}"></script>

@endsection