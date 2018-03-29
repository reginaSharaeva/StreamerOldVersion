profile.factory('CameraService', function ($http) {
    var service = {};

    service.addNewCamera = addNewCamera;
    service.getCameras = getCameras;
    service.updateCamera = updateCamera;
    service.deleteCamera = deleteCamera;

    return service;

    function addNewCamera(data) {
        return $http.post('/addNewCamera', data);
    }

    function getCameras() {
        return $http.get('/getCameras');
    }

    function updateCamera(data) {
        return $http.post('/updateCamera', data);
    }

    function deleteCamera(id) {
        return $http.get('/deleteCamera/' + id);
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