<div class="menu">
                <ul>
                    <li>
                        <a href="{{route('homeAdmin') }}" class="active">
                            <i class="fa fa-home"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            <span>Gestion des utilisateurs</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li class="open">
                                <a href="{{route('users.create') }}" >
                                    <i class="fas fa-user-plus ms-1"></i>
                                    <span class="  nav-link-text  ">creation de compte</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('users.index')  }}" >
                                    <i class="fas fa-users   ms-1">_</i>
                                    <span class="nav-link-text">Liste des utilisateurs</span>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" aria-expanded="false">
                            <i class="fa fa-folder"></i>
                            <span class="nav-link-text">Gestion des dossiers</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('admin.dossiers.index') }} " >
                                    <i class="fa fa-folder-open-o ms-2">_</i>
                                    <span class="nav-link-text">Liste des dossiers</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="slide">
                        <a class="side-menu__item" data-bs-toggle="slide" aria-expanded="false">
                            <i class="fa fa-gear"></i>
                            <span class="nav-link-text ">Parametrage</span>
                            <i class="fa fa-angle-right"></i>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('uniteTempsTraitements.index') }}" >
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Unité temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('tempsTraitements.index') }}">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Temps traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('niveauTraitements.index') }}" >
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text "> Niveau traitement</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('directions.index') }}">
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Directions douanes</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('services.index') }}" >
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class=" nav-link-text ">Services douanes</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('roles.index') }}" >
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Roles</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('typeDossiers.index') }}" >
                                    <i class="fa fa-gears ms-2"></i>
                                    <span class="nav-link-text ">Type de dossiers</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('dashboard-config-flux') }}">
                                    <i class="fa fa-code-fork ms-2"></i>
                                    <span class="nav-link-text ">configuration de flux</span>
                                </a>
                            </li>
                        </ul>
                    </li>