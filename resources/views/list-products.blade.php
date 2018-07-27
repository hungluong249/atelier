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
                                    Chúng tôi tin rằng sự thành công lâu dài của doanh nghiệp được xây dựng dựa trên các chuẩn mực ĐẠO ĐỨC, điều này là nguyên tắc định hướng của Artelier 31.
                                </h4>
                            </div>

                            <div class="right col-sm-6 col-xs-12">
                                <p class="paragraph">Với tiêu chí SÁNG TẠO KHÔNG NGỪNG, Artelier 31 chủ động tìm kiếm các giải pháp cho khách hàng của mình, luôn luôn cố gắng cải tiến biện pháp thi công, đáp ứng nhu cầu của mọi khách hàng, của mọi công trình.</p>
                                <p class="paragraph">Bộ máy NHÂN SỰ TINH HOA, là một trong những năng lực cốt lõi làm nên sự khác biệt của doanh nghiệp, là nền tảng để giữ vững cam kết, mang lại chất lượng dịch vụ tốt nhất cho khách hàng. Artelier 31 là một môi trường làm việc “trong mơ” để cống hiến và hoàn thiện kỹ năng bản thân cho mỗi cá nhân trên thị trường lao động. Chúng tôi mang tới những cơ hội trải nghiệm và luôn khuyến khích đội ngũ cán bộ nhân viên chinh phục và làm chủ tiềm năng của họ.</p>
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