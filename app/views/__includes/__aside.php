      <?php

        $URL_CONTROLLER = $_SESSION["url_controller"];
        $URL_METHOD = $_SESSION["url_method"];

        ?>

      <!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <div class="brand-link">
              <img
            src="<?=ASSETS ?>/img/LOGO INNOVATE SC.png"
            alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3"
            style="opacity: 0.8"
          />
              <span class="brand-text font-weight-light">INNOVATESC</span>
        </div>

          <!-- Sidebar -->
          <div class="sidebar">
              <!-- Sidebar user panel (optional) -->
              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                  <div class="image">
                      <!-- <img src="../_resources/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" /> -->
                  </div>
                  <div class="info">
                      <li href="#" class="d-block text-white"><?= $_SESSION['NOMBRE_USUARIO'] ?></li>
                  </div>
              </div>

              <!-- Sidebar MAIN Menu -->
              <nav class="mt-2">
                  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                      <!-- INICIO -->
                      <li class="nav-item">
                          <a href="<?= ROOT ?>" class="nav-link <?= $URL_CONTROLLER == "inicio" ? "active" : ""  ?>">
                              <ion-icon name="home-outline"></ion-icon>
                              <p>Inicio</p>
                          </a>
                      </li>

                      <!-- INICIO -->
                      <li class="nav-item">
                          <a href="<?= ROOT ?>/nosotros" class="nav-link <?= $URL_CONTROLLER == "nosotros" ? "active" : ""  ?>">
                              <ion-icon name="receipt-outline"></ion-icon>
                              <p>Nosotros</p>
                          </a>
                      </li>

                      <li class="nav-item <?= $URL_CONTROLLER == "proyecto" ? "menu-open" : ""  ?>">
                          <a class="nav-link <?= $URL_CONTROLLER == "proyecto" ? "active" : ""  ?>" style="cursor: pointer;">
                              <ion-icon name="briefcase-outline"></ion-icon>
                              <p>
                                  Proyectos
                                  <i class="right fas fa-angle-left"></i>
                              </p>
                          </a>
                          <ul class="nav nav-treeview">
                              <li class="nav-item">
                                  <a href="<?= ROOT ?>proyecto" class="nav-link <?= ($URL_CONTROLLER == "proyecto" && ($URL_METHOD == "index" || $URL_METHOD == "listar")) ? "active" : ""  ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Listar</p>
                                  </a>
                              </li>
                        
                              <li class="nav-item">
                                  <a href="<?= ROOT ?>proyecto/crear" class="nav-link <?= $URL_CONTROLLER == "proyecto" &&  $URL_METHOD == "crear"  ? "active" : ""  ?>">
                                      <i class="far fa-circle nav-icon"></i>
                                      <p>Crear</p>
                                  </a>
                              </li>
                          </ul>
                      </li>

                      <!-- CERRAR SESIÓN -->
                        <li class="nav-item">
                            <a id="cerrar_session" href="#" class="nav-link">
                                <b class="text-danger" style="font-size: 24px; vertical-align: middle;">
                                    <ion-icon name="caret-back-circle-outline"></ion-icon>
                                </b>
                                <p>Salir</p>
                            </a>
                        </li>

                </ul>
            </nav>
              <!-- /.sidebar-menu -->
          </div>
      </aside>