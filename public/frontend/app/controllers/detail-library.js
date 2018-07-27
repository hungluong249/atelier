(function(){
    app.controller('DetailLibraryController', function($scope, $http, $location, API_URL, $sce){
        $scope.$sce = $sce;
        $urlSplit = $location.path().split("/");
        var slug = $urlSplit[4];
            $scope.slug = slug;

        $http({
            method: 'GET',
            url: API_URL + 'library_detail',
            params: {
                slug: slug,
            }
        }).then(function(success){
            $scope.detail = success.data;
            console.log($scope.detail);
        }, function(error){

        });
    });
})();