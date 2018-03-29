profile.controller('CameraController', function ($uibModal, $scope, CameraService, DTOptionsBuilder, $timeout) {

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withDOM('<"html5buttons"B>lTfgitp')
        .withButtons([
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]);

    var vm = this;
    vm.cameras = [];

    vm.createNewCam = function () {
        $uibModal.open({
            templateUrl: 'js/modules/profile/views/error.tpl.html',
            windowTemplateUrl: 'js/modules/profile/views/modal.tpl.html',
            controller: 'ModalInstanceCtrl',
            resolve: {
                data: function () {
                    return {
                        title: "Новая камера",
                    }
                }
            }
        });
    }
    vm.getCameras = function () {
        CameraService.getCameras().success(function (data) {
            vm.cameras = data;
        });
    };
    vm.deleteCamera = function (id) {
        CameraService.deleteCamera(id).success(function () {
            vm.getCameras();
        });
    };
    vm.editCamera = function (camera) {
        $uibModal.open({
            templateUrl: 'js/modules/profile/views/camera.modal.tpl.html',
            windowTemplateUrl: 'js/modules/profile/views/modal.tpl.html',
            controller: 'ModalCameraInstanceCtrl',
            resolve: {
                data: function () {
                    return {
                        title: "Новая камера",
                        camera: camera
                    }
                }
            }
        });
    };
    vm.successAddCamera = false;

    $scope.$on("modalClosing", function (event, value) {

        CameraService.addNewCamera(value).success(function (data) {
            vm.cameras.push(data);
        });

        $timeout(function () {
            vm.getCameras();
        }, 500);
    });
    $scope.$on("modalEditCameraClosing", function (event, value) {

        CameraService.updateCamera(value).success(function () {

        });

        $timeout(function () {
            vm.getCameras();
        }, 500);
    });

    vm.getCameras();
});
profile.controller('ModalInstanceCtrl', function ($scope, data, $uibModalInstance, $rootScope) {
    $scope.title = data.title;
    $scope.data = data.data;
    $scope.name = null;
    $scope.link = null;
    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.save = function () {
        $rootScope.$broadcast("modalClosing", {name: $scope.name, link: $scope.link});
        $uibModalInstance.dismiss();
    };
});
profile.controller('ModalCameraInstanceCtrl', function ($scope, data, $uibModalInstance, $rootScope) {
    $scope.title = data.title;
    $scope.camera = data.camera;
    $scope.close = function () {
        $uibModalInstance.dismiss('cancel');
    };
    $scope.save = function () {
        $rootScope.$broadcast("modalEditCameraClosing", $scope.camera);
        $uibModalInstance.dismiss();
    };
});
