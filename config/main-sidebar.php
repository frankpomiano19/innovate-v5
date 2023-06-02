<?php
   
?>
<div class="navbar-custom">
        <ul class="list-unstyled topbar-menu float-end mb-0">
            <!-- -->
            <li class="dropdown notification-list topbar-dropdown">
                 <img class="img-responsive-logo" src="assets/img/logo_responsive.png" width="30" height="30">              
            </li>
            <!-- -->
            <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <span class="account-user-avatar"> 
                            <img src="assets/img/users/<?php echo $imagen_perfil;?>" alt="user-image" class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name">
                                <?php echo $nombre;?>
                            </span>
                            <span class="account-position">Usuario</span>
                        </span>
                    </a>
                    <!-- -->
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bienvenido <?php echo $nombre;?>!</h6>
                        </div>

                        <!-- item-->
                        <a href="profile.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle me-1"></i>
                            <span>Mi Cuenta</span>
                        </a>

                        <!-- item-->
                        <a href="logout.php" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout me-1"></i>
                            <span>Cerrar Sesión</span>
                        </a>
                    </div>
            </li>

    </ul>

    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
              
</div>