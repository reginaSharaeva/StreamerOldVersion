profile.factory('UserService', function ($http) {
    var service = {};

    service.getUserInfo = getUserInfo;
    service.updateUserInfo = updateUserInfo;

    return service;


    function getUserInfo() {
        return $http.get('/getUserInfo');
    }

    function updateUserInfo(data) {
        return $http.post('/updateUser', data);
    }


    function handleSuccess(res) {
        return res.data;
    }

    function handleError(error) {
        return function () {
            return {success: false, message: error};
        };
    }

});