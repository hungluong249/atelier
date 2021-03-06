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

    <section id="news">
        <section class="section-header">
            <div class="container-fluid">
                <div class="container header">
                    <h1 class="heading dark">
                        Tin tức
                    </h1>
                </div>
            </div>
        </section>

        <section id="list-news" class="list-blogs" ng-controller="BlogController">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">

                        <div class="left col-sm-9 col-xs-12">
                            <div class="row">
                                <div class="item col-sm-6 col-xs-12" ng-repeat="blog in blogs">
                                    <div class="inner">
                                        <a href="#">
                                            <div class="mask">
                                                <img src="{{ asset('storage/app/') }}/<% blog.image %>" alt="image news">
                                            </div>
                                        </a>

                                        <a href="#">
                                            <h2 class="post-heading dark"><% blog.title %></h2>
                                        </a>
                                        <p class="description"><% blog.description %></p>
                                        <a href="{{ url('tin-tuc/chi-tiet/') }}/<% blog.slug %>" class="btn btn-outline" role="button"  target="_self">
                                            Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="right col-sm-3 col-xs-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Category
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item" ng-class="{active : category.slug === slug}" ng-repeat="category in categories">
                                        <a href="{{ url('tin-tuc/') }}<% '/' + category.slug %>" target=_self>
                                            <% category.title %>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

    </section>

    <script src="{{ asset ("public/frontend/app/controllers/blog.js") }}"></script>
@endsection