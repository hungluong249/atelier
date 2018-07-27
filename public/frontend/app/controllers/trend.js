(function(){
    app.controller('TrendController', function($scope, $http, $location, API_URL, $sce){
        $scope.$sce = $sce;
        $scope.trends = [];
        $scope.trendDetail = [];
        $scope.trendImages = [];
        $urlSplit = $location.path().split("/");
        slug = $urlSplit[3];
        slugDetail = $urlSplit[4];
        if(!$urlSplit[3]){
            slug = '';
        }
        $scope.slug = slug;
        

        /**
         * Fetch trends for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'trend',
            params: {
                    slug: slug
                }
        }).then(function(success){
            
            $scope.trends = success.data;
        }, function(error){

        });

        /**
         * Fetch detail category trend for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'detail-trend-category',
            params: {
                    slug: slug
                }
        }).then(function(success){
            
            $scope.detailCategorytrend = success.data;
            console.log($scope.detailCategorytrend);
        }, function(error){

        });

        /**
         * Fetch trends for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'trend-detail',
            params: {
                slugDetail: slugDetail
            }
        }).then(function(success){

            $scope.trendDetail = success.data;
            $scope.trendImages = JSON.parse($scope.trendDetail.image);
        }, function(error){

        });

    });
})();