authentication.controller('AuthController',
    function ($scope, AuthService, $uibModal, $window) {

        $scope.user = {
            email: null,
            password: null
        };

        $scope.login = function () {

            AuthService.login($scope.user, function (data) {
                $window.location.href = '/profile';
            }, function (data) {
                $uibModal.open({
                    templateUrl: '/js/modules/authentication/views/error.tpl.html',
                    windowTemplateUrl: '/js/modules/authentication/views/modal.tpl.html',
                    controller: 'ModalInstanceCtrl',
                    resolve: {
                        data: function () {
                            return {
                                title: "Ошибка при авторизации",
                                data: "Логин или пароль не верны"
                            }
                        }
                    }
                });
            });
        };
    });

authentication.controller('ModalInstanceCtrl', function ($scope, data, $uibModalInstance) {
    $scope.title = data.title;
    $scope.data = data.data;
    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };
});

