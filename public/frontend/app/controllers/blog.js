(function(){
    app.controller('BlogController', function($scope, $http, $location, API_URL, listAdvisesFactory, listNewsFactory){
        $scope.blogs = [];
        $urlSplit = $location.path().split("/");
        slug = $urlSplit[3];
        if(!$urlSplit[3]){
            slug = '';
        }
        $scope.slug = slug;

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