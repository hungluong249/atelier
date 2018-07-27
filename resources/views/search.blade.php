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
                        Kết quả tìm kiếm
                    </h1>
                </div>
            </div>
        </section>

        <section id="list-search" ng-controller="SearchController">
            <div class="container">
                <div class="row">
                    <div class="item col-sm-4 col-xs-12" ng-repeat="item in searchResult">
                        <div class="inner">
                            <div ng-show="item.target == 99" >
                                <label>[Tin tức]</label>
                                <a href="http://localhost/atelier/tin-tuc/chi-tiet/<% item.slug %>" target="_self">
                                    <h2 class="post-heading dark"><% item.title %></h2>
                                </a>
                                <p class="description"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                        </div>

                        <div class="inner">
                            <div ng-show="item.target == 98" >
                                <label>[Xu hướng]</label>
                                <a href="http://localhost/atelier/xu-huong/chi-tiet/<% item.slug %>" target="_self">
                                    <h2 class="post-heading dark"><% item.title %></h2>
                                </a>
                                <p class="description"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                        </div>

                        <div class="inner">
                            <div ng-show="item.target == 97" >
                                <label>[Sản phẩm]</label>
                                <a href="http://localhost/atelier/san-pham/chi-tiet/<% item.slug %>" target="_self">
                                    <h2 class="post-heading dark"><% item.name %></h2>
                                </a>
                                <p class="description"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <script src="{{ asset ("public/frontend/app/controllers/search.js") }}"></script>
@endsection
