(function(){
    app.controller('LibraryController', function($scope, $http, $location, API_URL, $sce){
        $scope.$sce = $sce;
        $scope.library = [];

        $http({
            method: 'GET',
            url: API_URL + 'library'
        }).then(function(success){
            $scope.library = success.data;
        }, function(error){

        });

        $http({
            method: 'GET',
            url: API_URL + 'intro-product'
        }).then(function(success){
            $scope.introProduct = success.data;
        }, function(error){

        });
    });
})();