<aside class="sidenav bg-white  navbar navbar-vertical navbar-expand-xs border-1 shadow-xl  border-radius-xl my-4 fixed-start ms-4 "
    id="sidenav-main">

   
    <!----partie du code concernant le logo--->
        <div class="class row">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        
            <img src="/../../../../img/logo-dgd.png" width="450" height="300" alt="main_logo">
        </div>
        <hr class="horizontal " style="height:3px;border-width:1;color:#04AA6D;background-color:#04AA6D">
        
 
 
        
     
    
     <!---partie du code concernant le menu ----->

     <ul>

            <li >
                <a  class=" nav-link {{ Route::currentRouteName() == 'creation de compte' || Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}" href="{{ route('home') }}">
                       <i class="fa fa-home"></i>
                        <span>Tableau de bord</span>
                </a>
            </li>

            <li id="home">
                  <a href="#home">
                     <i class="fa fa-user"></i>
                       <span>Gestion des utilisateurs</span>
                     <i class="fa fa-angle-right"></i>
                  </a>
                    <ul>
                        <li class="nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}">
                            <a href="{{route('users.create') }}">
                                <i class="fas fa-user-plus ms-1"></i>
                                <span class="  nav-link-text  " >creation de compte</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('users.index')  }}">
                                <i class="fas fa-users   ms-1">_</i>
                                <span class="nav-link-text" >Liste des utilisateurs</span>
                            </a>
                        </li>
                    </ul>
            </li>
        
       
        <li id="ecom">
                <a href="#ecom">
                    <i class="fa fa-folder"></i>
                    <span class="nav-link-text">Gestion des dossiers</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <ul>
                    <li class="nav-link {{ Route::currentRouteName() == 'Liste des dossiers' ? 'active' : '' }}">
                        <a href="{{ route('dashboard-ls-dossiers') }}">
                        <i class="fa fa-folder-open-o ms-2">_</i>
                            <span class="nav-link-text" >Liste des dossiers</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li id="com">
                <a href="#com">
                    <i class="fa fa-gear"></i>
                    <span class="nav-link-text ">Parametrage</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <ul>
                        <li class="nav-link {{ Route::currentRouteName() == 'Temps de traitement' ? 'active' : '' }}">
                            <a href="{{ route('uniteTempsTraitements.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class="nav-link-text " > Unité temps traitement</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Temps de traitement' ? 'active' : '' }}">
                            <a href="{{ route('tempsTraitements.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class="nav-link-text " > Temps traitement</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Temps de traitement' ? 'active' : '' }}">
                            <a href="{{ route('niveauTraitements.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class="nav-link-text " > Niveau traitement</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Créer type de dossiers' ? 'active' : '' }}">
                            <a href="{{ route('directions.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class=" nav-link-text " >Directions douanes</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Créer type de dossiers' ? 'active' : '' }}">
                            <a href="{{ route('services.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class=" nav-link-text " >Services douanes</span>
                            </a>
                        </li>

                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('profils.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class="nav-link-text " >Profile utilisateur</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('typeDossiers.index') }}">
                            <i class="fa fa-gears ms-2"></i>
                                <span class="nav-link-text " >Type de dossiers</span>
                            </a>
                        </li>
                        <li class="nav-link {{ Route::currentRouteName() == 'Liste des utilisateurs' ? 'active' : '' }}">
                            <a href="{{ route('dashboard-config-flux') }}">
                            <i class="fa fa-code-fork ms-2"></i>
                                <span class="nav-link-text " >configuration de flux</span>
                            </a>
                        </li>
                </ul>
            </li>

            <li id="chart">
                <a href="#chart">
                    <i class="fa fa-chart"></i>
                    <span>chart</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <ul>
                    <li><p>pie chart</p></li>
                    <li><p>line chart </p></li>
                    <li><p>bar chart</p></li>
                    <li><p>histogram bar </p></li>
                    
                </ul>
            </li>
         
    </ul>

        <style type="text/css">
                @import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
        

        aside h1 span{
            font-size:30px;
            line-height:50px;
            margin-left:6px;
            color:white;

        }

        aside ul{
            padding: 5px 0 5px 15px;
        }

        aside ul li{
            list-style:none;
            font-weight:bold;
            margin:20px auto;
            position:relative;
            overflow:hidden;
           max-height:35px;
            line-height:35px;
            transition:1s;
            text-transform:capitalize;
        }

        aside ul:first-child{
            max-height:50px;
        }
        aside ul:first-child li:hover{
            background:none;
        }

        aside ul li:hover{
            background:#d1d1d173;
        }
        aside ul li a{
            text-decoration:none;
            color:black;
        }

        aside ul li a i{
            width:15px;
            padding:5px;
            margin-right:2px;
        }

        aside ul li a i.fa-angle-right{
            position:absolute;
            right:0;
            top:5px;
            transition:0.5s;
        }

        aside ul li>ul{
            padding:2px;
            margin:0 1px 0px 20px;
        } 

        aside ul li>ul li{
            height:30px;
            line-height:30px;
            font-size:15px;
            padding:1px 2px 1px 20px;
            font-weight:normal;
            border-left:1px solid blue;
            margin:3px;
            color:blue;
            cursor:pointer;

        }

        aside ul li>ul li a,
        aside ul li:target>ul li a{
            background:transparent;
        }

        aside ul li:target{
            max-height:300px;
            border-radius:5px 0px 0px 5px;
        }

        aside ul li:target a{
            color:green;
            display:inherit;
            background:white;
        }

        aside ul li:target a i.fa-angle-right{
            transform:rotate(90dg);
            top:30px;

        }

        aside ul li:target:hover{
            background:initial;
        }

        </style>

        <script>

const listItems = document.querySelectorAll(".sidebar-list li");

listItems.forEach((item) => {
  item.addEventListener("click", () => {
    let isActive = item.classList.contains("active");

    listItems.forEach((el) => {
      el.classList.remove("active");
    });

    if (isActive) item.classList.remove("active");
    else item.classList.add("active");
  });
});

const toggleSidebar = document.querySelector(".toggle-sidebar");
const logo = document.querySelector(".logo-box");
const sidebar = document.querySelector(".sidebar");

toggleSidebar.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});

logo.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});
        </script>
</aside>

