(function(){
    app.controller('BlogController', function($scope, $http, $location, API_URL, listAdvisesFactory, listNewsFactory){
        $scope.blogs = [];
        $urlSplit = $location.path().split("/");
        slug = $urlSplit[4];
        if(!$urlSplit[4]){
            slug = '';
        }
        $scope.slug = slug;

        /**
         * Fetch blogs for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'fetch_all_blog',
        }).then(function(success){
            $scope.blogs = success.data;
            console.log($scope.blogs);
        }, function(error){

        });

    });
})();