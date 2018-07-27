(function(){
    app.controller('DetailBlogController', function($scope, $http, API_URL, $location, $sce){
        $scope.$sce = $sce;
        $scope.selected = [];
        var page = 1;
        $scope.count = 0;
        $urlSplit = $location.path().split("/");
        slug = $urlSplit[4];

        $http({
            method: 'GET',
            url: API_URL + 'detail_blog',
            params: {
                slug: slug
            }
        }).then(function(success){
            $scope.selected = success.data;
        }, function(error){

        }); 

    });
})();