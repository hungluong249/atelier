(function(){
    app.controller('BlogController', function($scope, $http, $location, API_URL, listAdvisesFactory, listNewsFactory){
        $scope.blogs = [];
        $scope.categories = [];
        $urlSplit = $location.path().split("/");
        slug = $urlSplit[3];
        if(!$urlSplit[3]){
            slug = '';
        }
        $scope.slug = slug;

        /**
         * Fetch categories for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'fetch_all_categories',
        }).then(function(success){
            $scope.categories = success.data;
        }, function(error){

        });

        /**
         * Fetch blogs for each type
         */
        $http({
            method: 'GET',
            url: API_URL + 'fetch_all_blog',
            params: {
                    slug: slug
                }
        }).then(function(success){
            $scope.blogs = success.data;
        }, function(error){

        });

    });
})();