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

    <section id="detail-trend" ng-controller="TrendController">
        <section class="section-header">
            <div class="container-fluid">
                <div class="container header">
                    <h1 class="heading dark">
                        <% trendDetail.title %>
                    </h1>
                </div>
                <div class="introduce">
                    <div class="container">
                        <div class="row">
                            <div class="left col-sm-6 col-xs-12">
                                <h4 class="sub-heading">
                                    <% trendDetail.description %>
                                </h4>
                            </div>

                            <div class="right col-sm-6 col-xs-12">
                                <p class="paragraph" ng-bind-html="$sce.trustAsHtml(trendDetail.content)">

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <article>
                <!--
                <p class="paragraph" ng-bind-html="$sce.trustAsHtml(trendDetail.content)"></p>
                -->

                <div masonry load-images="true">
                    <div class="masonry-brick" ng-repeat="image in trendImages">
                        <img ng-src="{{ asset('storage/app/trends') }}<% '/' + trendDetail.slug + '/' + image %>" />
                    </div>
                </div>

            </article>
        </div>
    </section>

    <script src="{{ asset ("public/frontend/app/controllers/trend.js") }}"></script>

@endsection