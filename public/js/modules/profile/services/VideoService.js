profile.factory('VideoService', function ($http) {
    var service = {};

    service.getCameras = getCameras;

    return service;


    function getCameras() {
        return $http.get('/getCamerasWithVideo');
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