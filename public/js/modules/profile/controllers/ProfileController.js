profile.controller('ProfileController', function ($scope, UserService) {
    var vm = this;
    vm.show = false;
    vm.user = {
        id: null,
        firstname: null,
        lastname: null,
        email: null
    };
    UserService.getUserInfo().success(function (data) {
        vm.user = data;
    });
    vm.user = {
        firstname: "Vladislav",
        lastname: "Ulyanov",
        email: "etovladislove@gmail.com"
    };
    vm.updateUser = function () {
        UserService.updateUserInfo(vm.user).success(function () {
            vm.show = true;
        });
    }
});