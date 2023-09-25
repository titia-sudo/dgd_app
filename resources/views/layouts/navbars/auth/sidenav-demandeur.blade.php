<aside class="sidenav bg-white  navbar navbar-vertical navbar-expand-xs border-1 shadow-xl  border-radius-xl my-4 fixed-start ms-4 "
    id="sidenav-main">

   
    <!----partie du code concernant le logo--->
        <div class="class row">
          <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        
            <img src="/../../../../img/logo-dgd.png" width="450" height="300" alt="main_logo">
        </div>
        <hr class="horizontal " style="height:3px;border-width:1;color:#04AA6D;background-color:#04AA6D">
        

     <!---partie du code concernant le menu affichant les dossiers recents ----->

        <div class=" mx-2">

            <div>
                <a  class=" nav-link {{ Route::currentRouteName() == 'creation de compte' ? 'active' : '' }}" href="{{ route('dossiers.index') }}">
                       <i class="fa fa-home icon-lg"></i>
                        <span class="font-weight-bold text-lg" >Accueil</span>
                </a>
            </div>
                <div class=" " >
                    <i class="fa fa-folder-o"></i> <span class="font-weight-bold">dossiers recents</span>
                </div>
                <div class="mt-4">
                  <ul class="list-group">
                        <li class="list-group-item " >A disabled item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A fourth item</li>
                        <li class="list-group-item">And a fifth one</li>
                    </ul>
                </div>
          <hr>
       
                    <div>
                     <a href="#ecom">
                        <i class="fa fa-folder icon-lg"></i>
                          <a href="{{ route('dossiers.create') }}" class="nav-link-text font-weight-bold text-primary">Nouveau dossier</a>
                     </a>
                    </div>
        </div>
            
</aside>

