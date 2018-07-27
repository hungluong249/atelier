(function(){
    app.controller('SearchController', function($scope, $http, $location, API_URL, $sce){
        $scope.$sce = $sce;
        $scope.searchResult = [];

    	var searchString = $location.search().search;
    	console.log(searchString);
        $http({
            method: 'GET',
            url: API_URL + 'search',
            params: {
                searchString: searchString
            }
        }).then(function(success){
            $scope.searchResult = success.data;
            console.log($scope.searchResult);
        }, function(error){

        });
    });
})();