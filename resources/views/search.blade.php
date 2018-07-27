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

        <section id="list-news" class="list-blogs" ng-controller="SearchController">
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="item col-sm-4 col-xs-12" ng-repeat="item in searchResult">
                            <div ng-show="item.target == 99" >
                                <a href="http://localhost/atelier/tin-tuc/chi-tiet/<% item.slug %>" target="_self">[Tin tức] <% item.title %></a>
                                <p class="paragraph"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                            <div ng-show="item.target == 98" >
                                <a href="http://localhost/atelier/xu-huong/chi-tiet/<% item.slug %>" target="_self">[Xu hướng] <% item.title %></a>
                                <p class="paragraph"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                            <div ng-show="item.target == 97" >
                                <a href="http://localhost/atelier/san-pham/chi-tiet/<% item.slug %>" target="_self">[Sản phẩm] <% item.name %></a>
                                <p class="paragraph"  ng-bind-html="$sce.trustAsHtml(item.description)"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </section>
    <script src="{{ asset ("public/frontend/app/controllers/search.js") }}"></script>
@endsection
