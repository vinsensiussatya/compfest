myApp.constant('SERVICEURL', baseUrl);

myApp.controller('TodoCtrl', function ($scope, $http, SERVICEURL,toastr) {
    // for fetch all data
    $scope.init = function () {
        $http.get(SERVICEURL + '/admin/getdatamhs').success(function (data) {
            $scope.todos = data;
        })
    }

    // for create a task
  

    $scope.init();
})