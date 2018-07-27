(function() {
    app.controller('HomepageController', function ($scope, $http, API_URL, $uibModal, $mdDialog, menuProductFactory, productsFactory, listNewsFactory, listAdvisesFactory, blogFactory, companyFactory, $sce) {
        $scope.$sce = $sce;
        $scope.libraries = [];
        $scope.categoryTrendForHomePage = [];
        
        $scope.products = [];
        $scope.discounts = [];
        $scope.menuProduct = [];
        $scope.latestAdvises = [];
        $scope.news = [];
        $scope.blog = [];
        $scope.company = [];
    
        $scope.owlOptions = {
            nav: true,
            pagination: false,
            rewindNav : true,
            responsiveClass: true,
            responsive: {
                0:{
                    items: 1
                },
                768:{
                    items: 2
                }
            }
        }
        
        $scope.$sce = $sce;
        var alert;
        // Fetch all products
        productsFactory.products()
            .then(function (success) {
                $scope.products = success.data;
            }, function (error) {
            
            });
        
        // Fetch discount products
        // $http({
        //     method: 'GET',
        //     url: API_URL + 'discount_product'
        // }).then(function(success){
        //     $scope.discounts = success.data;
        //     $http({
        //                 method: 'GET',
        //                 url: API_URL + 'get_all_product',
        //             }).then(function(response){
        //                 $scope.addToLikeProduct = function(product_id){
        //                     $http({
        //                         method: 'GET',
        //                         url: API_URL + 'user_like_product',
        //                         params: {
        //                             product_id: product_id
        //                         }
        //                     }).then(function(response){
        //                         for(i = 0; i<$scope.discounts.length ; i++){
        //                             if($scope.discounts[i].id == product_id){
        //                                 if($scope.discounts[i].like == "bỏ yêu thích"){
        //                                     $scope.discounts[i].like = "lưu yêu thích";
        //                                 }else{
        //                                     $scope.discounts[i].like = "bỏ yêu thích";
        //                                 }
        //                                 break;
        //                             }
        //                         }
        //                     }, function(error){
        //                         console.log(error);
        //                     });
        //                 };
        //                 angular.forEach($scope.discounts, function(value, key){
        //                     for(i = 0; i<response.data.result.length ; i++){
        //                       if(value.id == response.data.result[i].product_id && response.data.result[i].user_id == document.getElementById("user_id").innerHTML){
        //                          $scope.discounts[key].like = "bỏ yêu thích";
        //                          break;
        //                       }else{
        //                          $scope.discounts[key].like = "lưu yêu thích";
        //                       }
        //                     }
        //                 });     
        //             }, function(error){
        
        //             });
        // }, function(error){
        
        // });
        
        // Fetch library
        $http({
            method: 'GET',
            url: API_URL + 'library'
        }).then(function (success) {
            $scope.libraries = success.data;
        }, function (error) {
        
        });
        
        
        // Fetch trend
        $http({
            method: 'GET',
            url: API_URL + 'trend-category-for-homepage'
        }).then(function (success) {
            $scope.categoryTrendForHomePage = success.data;
        }, function (error) {
        
        });
        
        // Fetch introduce
        $http({
            method: 'GET',
            url: API_URL + 'introduce'
        }).then(function (success) {
            $scope.introduce = success.data;
        }, function (error) {
        
        });
        
        // Build menu product
        menuProductFactory.menuProduct()
            .then(function (success) {
                $scope.menuProduct = success.data;
            }, function (error) {
            
            });
        
        // Build blog
        blogFactory.blog()
            .then(function (success) {
                $scope.blog = success.data;
                
            }, function (error) {
            
            });

        $scope.open = function (item) {
            $scope.selected = item;
            $uibModal.open({
                animation: true,
                templateUrl: 'san-pham/detail-product-modal',
                controller: 'ModalController',
                resolve: {
                    items: function () {
                        return $scope.selected;
                    }
                },
                size: 'lg'
            }).result.then(function () {
            }, function (res) {
            });
        };
        
    })
        
    .directive("owlCarousel", function () {
        return {
            restrict: 'E',
            transclude: false,
            link: function (scope) {
                scope.initCarousel = function (element) {
                    // provide any default options you want
                    var defaultOptions = {
                    };
                    var customOptions = scope.$eval($(element).attr('data-options'));
                    // combine the two options objects
                    for (var key in customOptions) {
                        defaultOptions[key] = customOptions[key];
                    }
                    // init carousel
                    $(element).owlCarousel(defaultOptions);
                };
            }
        };
    })
    
    .directive('owlCarouselItem', [function () {
        return {
            restrict: 'A',
            transclude: false,
            link: function (scope, element) {
                // wait for the last item in the ng-repeat then call init
                if (scope.$last) {
                    scope.initCarousel(element.parent());
                }
            }
        };
    }]);
})();