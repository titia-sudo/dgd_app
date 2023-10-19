<aside class="sidenav bg-white  navbar navbar-vertical navbar-expand-xs border-1 shadow-xl  border-radius-xl my-4 fixed-start ms-4 " id="sidenav-main">


    <!----partie du code concernant le logo--->
    <div class="class row">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>

        <img src="/../../../../img/logo-dgd.png" width="450" height="300" alt="main_logo">
    </div>
    <hr class="horizontal " style="height:3px;border-width:1;color:#04AA6D;background-color:#04AA6D">


    <!---partie du code concernant le menu ----->
    <div class="sidebar">
        <div class="nav">
            <div class="menu">
                <ul>
                    <li>
                        <a href="{{route('homeAdmin') }}">
                            <i class="fa fa-home"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide">
                            <i class="fa fa-user"></i>
                            <span>Gestion des utilisateurs</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu open">
                            <li class="open">
                                <a href="{{route('users.create') }}" class="slide-item">
                                    <i class="fas fa-user-plus ms-1"></i>
                                    <span class="  nav-link-text  ">creation de compte</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index')  }}" class="slide-item">
                                    <i class="fas fa-users   ms-1">_</i>
                                    <span class="nav-link-text">Liste des utilisateurs</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide">
                            <i class="fa fa-folder"></i>
                            <span class="nav-link-text">Gestion des dossiers</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('admin.dossiers.index') }} " class="slide-item">
                                    <i class="fa fa-folder-open-o ms-2">_</i>
                                    <span class="nav-link-text">Liste des dossiers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide">
                            <i class="fa fa-gear"></i>
                            <span class="nav-link-text ">Parametrage</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('uniteTempsTraitements.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Unité temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tempsTraitements.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('niveauTraitements.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Niveau traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('directions.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Directions douanes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Services douanes</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('roles.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('typeDossiers.index') }}" class="slide-item">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Type de dossiers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard-config-flux') }}" class="slide-item">
                                    <i class="fa fa-code-fork ms-2"></i>
                                    <span class="nav-link-text ">configuration de flux</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide">
                            <i class="fa fa-chart"></i>
                            <span>chart</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <p>pie chart</p>
                            </li>
                            <li>
                                <p>line chart </p>
                            </li>
                            <li>
                                <p>bar chart</p>
                            </li>
                            <li>
                                <p>histogram bar </p>
                            </li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js" integrity="sha512-8Z5++K1rB3U+USaLKG6oO8uWWBhdYsM3hmdirnOEWp8h2B1aOikj5zBzlXs8QOrvY9OxEnD2QDkbSKKpfqcIWw==" crossorigin="anonymous"></script>
    <script>
        // Activate sidebar slide toggle
        $("[data-bs-toggle='slide']").on('click', function(e) {
            var $this = $(this);
            var checkElement = $this.next();
            var animationSpeed = 300,
                slideMenuSelector = '.sub-menu';
            if (checkElement.is(slideMenuSelector) && checkElement.is(':visible')) {
                checkElement.slideUp(animationSpeed, function() {
                    checkElement.removeClass('open');
                });
                checkElement.parent("li").removeClass("is-expanded");
            } else if ((checkElement.is(slideMenuSelector)) && (!checkElement.is(':visible'))) {
                var parent = $this.parents('ul').first();
                var ul = parent.find('ul:visible').slideUp(animationSpeed);
                ul.removeClass('open');
                var parent_li = $this.parent("li");
                checkElement.slideDown(animationSpeed, function() {
                    checkElement.addClass('open');
                    parent.find('li.is-expanded').removeClass('is-expanded');
                    parent_li.addClass('is-expanded');
                });
            }
            if (checkElement.is(slideMenuSelector)) {
                e.preventDefault();
            }
        });

        // Toggle Sidebar
        $('[data-bs-toggle="sidebar"]').click(function(event) {
            event.preventDefault();
            $('.app').toggleClass('sidenav-toggled');
        });


        $(".app-sidebar").hover(function() {
            if ($('body').hasClass('sidenav-toggled')) {
                $('body').addClass('sidenav-toggled-open');
            }
        }, function() {
            if ($('body').hasClass('sidenav-toggled')) {
                $('body').removeClass('sidenav-toggled-open');
            }
        });

        // ______________Active Class
        $(".ul li a").each(function() {
            var pageUrl = window.location.href.split(/[?#]/)[0];
            if (this.href == pageUrl) {
                $(this).addClass("active");
                $(this).parent().addClass("active"); // add active to li of the current link
                $(this).parent().parent().prev().addClass("active"); // add active class to an anchor
                $(this).parent().parent().prev().click(); // click the item to make it drop
            }
        });
    </script>

    <style type="text/css">
        @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');


        /*
        aside h1 span {
            font-size: 30px;
            line-height: 50px;
            margin-left: 6px;
            color: white;

        }

        aside ul {
            padding: 5px 0 5px 15px;
        }

        aside ul li {
            list-style: none;
            font-weight: bold;
            margin: 20px auto;
            position: relative;
            overflow: hidden;
            max-height: 35px;
            line-height: 35px;
            transition: 1s;
            text-transform: capitalize;
        }

        aside ul:first-child {
            max-height: 50px;
        }

        aside ul:first-child li:hover {
            background: none;
        }

        aside ul li:hover {
            background: #d1d1d173;
        }

        aside ul li a {
            text-decoration: none;
            color: black;
        }

        aside ul li a i {
            width: 15px;
            padding: 5px;
            margin-right: 2px;
        }

        aside ul li a i.fa-angle-right {
            position: absolute;
            right: 0;
            top: 5px;
            transition: 0.5s;
        }

        aside ul li>ul {
            padding: 2px;
            margin: 0 1px 0px 20px;
        }

        aside ul li>ul li {
            height: 30px;
            line-height: 30px;
            font-size: 15px;
            padding: 1px 2px 1px 20px;
            font-weight: normal;
            border-left: 1px solid blue;
            margin: 3px;
            color: blue;
            cursor: pointer;

        }

        aside ul li>ul li a,
        aside ul li:target>ul li a {
            background: transparent;
        }

        aside ul li:target {
            max-height: 300px;
            border-radius: 5px 0px 0px 5px;
        }

        aside ul li:target a {
            color: green;
            display: inherit;
            background: white;
        }

        aside ul li:target a i.fa-angle-right {
            transform: rotate(90dg);
            top: 30px;

        }

        aside ul li:target:hover {
            background: initial;
        }
*/


        @import url(https://fonts.googleapis.com/css?family=Inter:100,200,300,regular,500,600,700,800,900);

        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Inter", sans-serif;
        }

        body {
            background-color: #dbe2f4;
        }

        .container {
            display: flex;
            align-items: center;
            width: 100%;
            min-height: 100vh;
        }

        .sidebar {
            position: relative;
            width: 260px;
            height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 20px;
            background-color: #fff;
            padding: 2px;
            border-radius: 30px;
            transition: all 0.3s;
        }

        .sidebar .head {
            display: flex;
            gap: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f6f6f6;
        }

        .user-img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            overflow: hidden;
        }

        .user-img img {
            width: 100%;
            object-fit: cover;
        }

        .user-details .title,
        .menu .title {
            font-size: 10px;
            font-weight: 500;
            color: #757575;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .user-details .name {
            font-size: 14px;
            font-weight: 500;
        }

        .nav {
            flex: 1;
        }

        .menu ul li {
            position: relative;
            list-style: none;
            margin-bottom: 5px;

        }

        .menu ul li a {
            display: flex;
            align-items: left;
            gap: 10px;
            font-size: 16px;
            font-weight: 500;
            color: #000;
            text-decoration: none;
            padding: 12px 8px;
            border-radius: 8px;
            transition: all 0.4s;
        }

        .menu ul li>a:hover,
        .menu ul li.active>a {
            color: #fff;
            background: #2DCE89;
        }

        .menu ul li .icon {
            font-size: 20px;
        }

        .menu ul li .text {
            flex: 1;
        }

        .menu ul li .arrow {
            font-size: 13px;
            transition: all 0.4s;
        }

        .menu ul li.active .arrow {
            transform: rotate(180deg);
        }

        .menu .sub-menu {
            display: none;
            margin-left: 15px;
            padding-left: 10px;
            padding-top: 5px;
            border-left: 1px solid #f6f6f6;
        }

        .menu .sub-menu li a {
            padding: 10px 8px;
            font-size: 13px;
        }

        .menu:not(:last-child) {
            padding-bottom: 10px;
            margin-bottom: 20px;
            border-bottom: 2px solid #f6f6f6;
        }

        .menu-btn {
            position: absolute;
            right: -14px;
            top: 3.5%;
            width: 28px;
            height: 28px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: #757575;
            border: 2px solid #f6f6f6;
            background-color: #fff;
        }

        .menu-btn:hover i {
            color: #f6f6f6;
        }

        .menu-btn i {
            transition: all 0.3s;
        }

        .sidebar.active {
            width: 92px;
        }

        .sidebar.active .menu-btn i {
            transform: rotate(180deg);
        }

        .sidebar.active .user-details {
            display: none;
        }

        .sidebar.active .menu .title {
            text-align: center;
        }

        .sidebar.active .menu ul li .arrow {
            display: none;
        }

        .sidebar.active .menu>ul>li>a {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar.active .menu>ul>li>a .text {
            position: absolute;
            left: 70px;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px;
            border-radius: 4px;
            color: #fff;
            background-color: #000;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .sidebar.active .menu>ul>li>a .text::after {
            content: "";
            position: absolute;
            left: -5px;
            top: 20%;
            width: 20px;
            height: 20px;
            border-radius: 2px;
            background-color: #000;
            transform: rotate(45deg);
            z-index: -1;
        }

        .sidebar.active .menu>ul>li>a:hover .text {
            left: 50px;
            opacity: 1;
            visibility: visible;
        }

        .sidebar.active .menu .sub-menu {
            position: absolute;
            top: 0;
            left: 20px;
            width: 200px;
            border-radius: 20px;
            padding: 10px 20px;
            border: 1px solid #f6f6f6;
            background-color: #fff;
            box-shadow: 0px 10px 8px rgba(0, 0, 0, 0.1);
        }

        .credits {
            margin: 0 auto;
            color: #fff;
            text-align: center;
            font-size: 3rem;
        }
    </style>


</aside>