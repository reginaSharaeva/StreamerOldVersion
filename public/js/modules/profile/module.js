var profile = angular.module('profile', [,
    'ui.bootstrap',
    'ui.router',
    'oc.lazyLoad',
    'ui.bootstrap',
    'pascalprecht.translate',
    'ngSanitize'
]).config(function ($stateProvider, $urlRouterProvider, $ocLazyLoadProvider) {
    $urlRouterProvider.otherwise("/");
    $stateProvider
        .state('profile', {
            url: "/",
            templateUrl: "/js/modules/profile/views/profile.tpl.html",
            controller: "ProfileController",
            controllerAs: 'vm'
        })
        .state('videos', {
            url: "/videos",
            templateUrl: "/js/modules/profile/views/video.tpl.html",
            controller: "VideoController",
            controllerAs: 'vm'
        })
        .state('camera',{
            url: "/cameras",
            templateUrl: "/js/modules/profile/views/camera.tpl.html",
            controller: "CameraController",
            controllerAs: 'vm',
            resolve: {
                loadPlugin: function ($ocLazyLoad) {
                    return $ocLazyLoad.load([
                        {
                            serie: true,
                            files: [
                                '/js/lib/datatables(1.2.3)/datatables.min.js',
                                '/css/lib/datatables(1.2.3)/datatables.min.css'
                            ]
                        },
                        {
                            serie: true,
                            name: 'datatables',
                            files: [
                                '/js/lib/angular(1.6.2)/angular-datatables.min.js'
                            ]
                        },
                        {
                            serie: true,
                            name: 'datatables.buttons',
                            files: [
                                '/js/lib/angular(1.6.2)/angular-datatables.buttons.min.js'
                            ]
                        }
                    ])
                }
            }
        })
}).run(function ($rootScope, $location, $state, UserService, $window) {
    $rootScope.goTo = function (url) {
        $location.path(url);
    };
    $rootScope.logout = function () {
        UserService.logout(function () {
            $window.location = "/";
        });
    }
    $rootScope.$state = $state;
}).directive('bsActiveLink', ['$location', function ($location) {
    return {
        restrict: 'A', //use as attribute
        replace: false,
        link: function (scope, elem) {
            //after the route has changed
            scope.$on("$routeChangeSuccess", function () {
                var hrefs = ['/#' + $location.path(),
                    '#' + $location.path(), //html5: false
                    $location.path()]; //html5: true
                angular.forEach(elem.find('a'), function (a) {
                    a = angular.element(a);
                    if (-1 !== hrefs.indexOf(a.attr('href'))) {
                        a.parent().addClass('active');
                    } else {
                        a.parent().removeClass('active');
                    };
                });
            });
        }
    }
}]);;



