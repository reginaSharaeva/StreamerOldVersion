profile.controller('VideoController', function (CameraService, UserService) {

    var vm = this;

    UserService.getUserInfo().success(function (data) {
        vm.user = data;
        vm.max = data.memory;
        vm.dynamic = data.uses_memory;

    });

    CameraService.getCameras().success(function (data) {
        vm.cameras = data;
    });


});
