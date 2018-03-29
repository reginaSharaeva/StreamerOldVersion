var authentication = angular.module('authentication', ['ui.bootstrap', "ngRoute"]).config(function ($routeProvider) {
    $routeProvider.when('/',
        {
            templateUrl: 'js/modules/authentication/views/authentication.tpl.html',
            controller: 'AuthController'
        }).when('/registration',
        {
            templateUrl: 'js/modules/authentication/views/registration.tpl.html',
            controller: 'RegisterController'
        }
    );
});
authentication.run(function ($rootScope, $location) {
    $rootScope.goTo = function (url) {
        $location.path(url);
    }
});