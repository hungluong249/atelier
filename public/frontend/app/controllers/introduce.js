(function(){
    app.controller('IntroduceController', function($scope, $http, $location, API_URL, $sce){
        $scope.$sce = $sce;
        $scope.introduces = [];

        $http({
            method: 'GET',
            url: API_URL + 'introduce'
        }).then(function(success){
            $scope.introduces = success.data;
            console.log($scope.introduces);
        }, function(error){

        });
    });
})();