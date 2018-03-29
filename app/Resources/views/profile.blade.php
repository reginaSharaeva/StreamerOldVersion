<!doctype html>
<html lang="ru" ng-app="profile">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Авторизация</title>
    <link rel="stylesheet" href="css/lib/bootstrap(3.3.7)/bootstrap.min.css">
    <link rel="stylesheet" href="css/lib/bootstrap(3.3.7)/theme/inspinia(2.7.0).css">
    <link rel="stylesheet" href="css/lib/animate(no-version)/animate.css">
    <link rel="stylesheet" href="css/lib/font-awesome(4.7.0)/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="css/authentication.css">


</head>
<body id="profile" class="pace-done body-small">
<div class="container-fluid" id="wrapper">
    <div class="row">


        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu" bs-active-link>
                    <li class="nav-header">
                        <img src="/images/web_camera_PNG7989.png" class="img-responsive">
                    </li>
                    <li>
                        <a href="#/profile"><i class="fa fa-user" aria-hidden="true"></i> <span
                                class="nav-label"></span>
                            <span class="nav-label ng-binding">Профиль</span></a>
                    </li>
                    <li>
                        <a href="#/cameras"><i class="fa fa-video-camera"></i> <span class="nav-label"></span>
                            <span class="nav-label ng-binding">Камеры</span></a>
                    </li>
                    <li>
                        <a href="#/videos"><i class="fa fa-file-video-o"></i> <span class="nav-label"></span>
                            <span class="nav-label ng-binding">Записи</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper" class="gray-bg dashbard-1">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
        <span minimaliza-sidebar="">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="" ng-click="minimalize()"><i
                    class="fa fa-bars"></i></a></span>
                </div>
            </nav>
            <div class="wrapper wrapper-content">
                <ui-view></ui-view>
            </div>
        </div>
    </div>
</div>

<!-- jQuery and Bootstrap -->
<script src="js/lib/jquery(3.1.1)/jquery.min.js"></script>
<script src="js/lib/jquery(3.1.1)/jquery-ui.min.js"></script>
<script src="js/lib/bootstrap(3.3.7)/bootstrap.min.js"></script>
<script src="js/lib/jquery(3.1.1)/jquery.metisMenu.js"></script>
<script src="js/lib/jquery(3.1.1)/jquery.slimscroll.min.js"></script>
<script src="js/lib/inspinia(2.7.0)/pace.min.js"></script>
<script src="js/lib/inspinia(2.7.0)/inspinia.js"></script>

<!-- Main Angular scripts-->
<script src="js/lib/angular(1.6.2)/angular.min.js"></script>
<script src="js/lib/angular(1.6.2)/angular-ocLazyLoad.min.js"></script>
<script src="js/lib/angular(1.6.2)/angular-sanitize.min.js"></script>
<script src="js/lib/angular(1.6.2)/angular-translate.min.js"></script>
<script src="js/lib/angular(1.6.2)/angular-ui-route.min.js"></script>
<script src="js/lib/bootstrap(3.3.7)/ui-bootstrap-tpls.min.js"></script>


<script type="application/javascript" src="js/modules/profile/module.js"></script>
<script type="application/javascript" src="js/modules/profile/controllers/ProfileController.js"></script>
<script type="application/javascript" src="js/modules/profile/controllers/CameraController.js"></script>
<script type="application/javascript" src="js/modules/profile/controllers/VideoController.js"></script>
<script type="application/javascript" src="js/modules/profile/services/UserService.js"></script>
<script type="application/javascript" src="js/modules/profile/services/CameraService.js"></script>
<script type="application/javascript" src="js/modules/profile/services/VideoService.js"></script>
<script src="js/lib/angular(1.6.2)/directive.js"></script>

</body>
</html>
