authentication.factory('AuthService', function ($http) {
    return {
        login: function (data, succses, fail) {
            $http({
                url: '/login',
                method: "POST",
                data: data
            }).then(function (response) {
                succses(response);
            }, function (response) {
                fail(response);
            })
        },
        registration: function (data, succses, fail) {
            $http({
                url: '/register',
                method: "POST",
                data: data
            }).then(function (response) {
                succses(response);
            }, function (response) {
                fail(response);
            })

        }
    }
});