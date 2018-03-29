authentication.controller('RegisterController',
    function ($scope, $uibModal, AuthService, $window, $location) {

        $scope.user = {
            email: null,
            password: null,
            name: null
        };

        $scope.register = function (data) {

            AuthService.registration(data, function (response) {

                $scope.goTo("/");

                $uibModal.open({
                    templateUrl: '/js/modules/authentication/views/error.tpl.html',
                    windowTemplateUrl: '/js/modules/authentication/views/modal.tpl.html',
                    controller: 'ModalInstanceCtrl',
                    resolve: {
                        data: function () {
                            return {
                                title: "Регистрация прошла успешно",
                                data: "Зайдите под своим логином и паролем в систему"
                            }
                        }
                    }
                });

            }, function (response) {

                $uibModal.open({
                    templateUrl: '/js/modules/authentication/views/error.tpl.html',
                    windowTemplateUrl: '/js/modules/authentication/views/modal.tpl.html',
                    controller: 'ModalInstanceCtrl',
                    resolve: {
                        data: function () {
                            return {
                                title: "Ошибка при Регистрации",
                                data: "Пользователь с таким именем уже зарегистрирован"
                            }
                        }
                    }
                });

            })
        };

    });

