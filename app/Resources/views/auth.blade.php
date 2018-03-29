<!doctype html>
<html lang="ru" ng-app="authentication">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/lib/bootstrap(3.3.7)/bootstrap.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap(3.3.7)/theme/inspinia(2.7.0).css">
    <link rel="stylesheet" href="css/lib/animate(no-version)/animate.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/authentication.css">

    <script type="application/javascript" src="js/lib/jquery(3.1.1)/jquery.min.js"></script>
    <script type="application/javascript" src="js/lib/bootstrap(3.3.7)/bootstrap.min.js"></script>
    <script type="application/javascript" src="js/lib/angular(1.6.2)/angular.min.js"></script>
    <script type="application/javascript" src="js/lib/angular(1.6.2)/angular-route.min.js"></script>
    <script type="application/javascript" src="js/lib/bootstrap(3.3.7)/directive.min.js"></script>

</head>
<body id="authentication">
<ng-view></ng-view>
<script type="application/javascript" src="js/modules/authentication/module.js"></script>
<script type="application/javascript" src="js/modules/authentication/services/AuthService.js"></script>
<script type="application/javascript" src="js/modules/authentication/controllers/AuthController.js"></script>
<script type="application/javascript" src="js/modules/authentication/controllers/RegisterController.js"></script>
</body>
</html>
