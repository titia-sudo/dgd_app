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
            <div class="menu" id="menu1">
                <ul>
                    <li>

                        @if(auth()->user()->HasRole('super-administrateur'))
                        <a href="{{route('HomeSuperAdmin') }}">
                            <i class="fa fa-home"></i>
                            <span>Tableau de bord</span>
                        </a>
                        @else
                        <a href="{{route('homeAdmin') }}">
                            <i class="fa fa-home"></i>
                            <span>Tableau de bord</span>
                        </a>
                        @endif
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide">
                            <i class="fa fa-user"></i>
                            <span>Gestion des utilisateurs</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu open">
                            <li class="open">
                                <a href="{{route('users.create') }}" class="navlist">
                                    <i class="fas fa-user-plus ms-1"></i>
                                    <span class="  nav-link-text  ">creation de compte</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index')  }}" class="navlist">
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
                                <a href="{{ route('admin.dossiers.index') }} " class="navlist">
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
                                <a href="{{ route('uniteTempsTraitements.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Unité temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tempsTraitements.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('niveauTraitements.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Niveau traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('directions.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Directions douanes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Services douanes</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('roles.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('typeDossiers.index') }}" class="navlist">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Type de dossiers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard-config-flux') }}" class="navlist">
                                    <i class="fa fa-code-fork ms-2"></i>
                                    <span class="nav-link-text ">configuration de flux</span>
                                </a>
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

        /*
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

        $(document).ready(function () {
    $('.menu a').click(function () {
        //removing the previous selected menu state
        $('.menu').find('li.active').removeClass('active');
        //adding the state for this parent menu
        $(this).parents("li").addClass('active');

    });
});
*/
        "use strict";

        let navlist = document.querySelectorAll('.navlist');

        for (let i = 0; i < navlist.length; i++) {
            navlist[i].addEventListener('click', function() {
                for (let x = 0; x < navlist.length; x++) {
                    if (navlist[x] == this) {
                        navlist[x].classList.add('active');
                    } else {
                        navlist[x].classList.remove('active');
                    }
                }
            });
        }
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
            transition: all 0.2s;
        }

        .menu ul li>a:hover,
        .menu ul li.active>a {
            color: #fff;
            background: #2DCE89;
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
    </style>


</aside>
