<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>

  <?php include_once "../../model/user_info.php";
  // $dataUsers = User::getAllProfessional();
  $usersEntitys = new UserInfo();
  $dataUsers = $usersEntitys::getAllInfoPacientes();
  include_once "./templates/report_user.php";
  ?>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
  	<div class="layout-container">
  		<!-- Menu -->
  		<?php include_once "./templates/aside.php"; ?>
  		<!-- / Menu -->
  		<!-- Layout container -->
  		<div class="layout-page">
  			<!-- Navbar -->
  			<?php include_once "./templates/navbar.php"; ?>
  			<!-- / Navbar -->
  			<!-- Content wrapper -->
  			<div class="content-wrapper">
  				<!-- Content -->
  				<div class="container-xxl flex-grow-1 container-p-y">
  					<!-- Basic Bootstrap Table -->
  					<div class="card">

  						<h5 class="card-header">Contactar pacientes</h5>
  						<?php if (isset($_SESSION["error"])) {
                echo '<div class="alert alert-danger" role="alert">' .
                  $_SESSION["error"] .
                  "</div>";
                unset($_SESSION["error"]);
              } ?>
  					</div>
  					<div class="container-fluid">
  						<div class="row">
  							<div class="col-md-8">
  								<div class="container text-center mt-2">
  									<div class="row row-cols-4">
  										<?php foreach ($dataUsers as $currentUser) : ?>
  										<div class="col-sm-6 mb-3 mb-sm-4">
  											<div class="card">
  												<div class="card-body">
  													<h5 class="card-title" professional-name="<?php echo $currentUser["usuario"]; ?>"><?php echo $currentUser["usuario"]; ?></h5>
  													<p class="card-text">Me llamo <?php echo $currentUser["usuario"]; ?>, <?php echo is_null($currentUser["tipo"]) ? ' y aún no realizo la encuesta' : 'mi tipo de obesidad es ' . $currentUser["tipo"]  ?></p>
  													<a href="#" class="card-link" id="<?php echo $currentUser["id"]; ?>">Abrir chat <i class='bx bx-message-dots'></i></a>
                            <?php if ($currentUser["response_questions"] != null) : ?>
                              <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#infomodal_<?php echo $currentUser["id"]; ?>">Ver Detalles</button>
                            <?php endif; ?>
  												</div>
  											</div>
  										</div>
                
                <?php if ($currentUser["response_questions"] != null) : ?>
                <!-- Modal -->
                <div class="modal fade" id="infomodal_<?php echo $currentUser["id"]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalinfo">Detalles del Usuario</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <?php
                            echo generateReport($currentUser["response_questions"]); ?>
                          
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php endif; ?>
  										<?php endforeach; ?>
  									</div>
  								</div>
  							</div>
  							<div class="col-md-4 mt-2" id="chat-container" style="display: none;">
                  <div class="card">
                          <h5 class="card-header">Chat con el paciente <span id="currentNameProfessional"></span></h5>
                          <div class="card-body" id="chat-messages" style="max-height: 300px; overflow-y: auto;">
                              <!-- Aquí se mostrarán los mensajes del chat -->
                          </div>
                          <div class="input-group mb-3 p-2">
                              <input type="text" class="form-control" placeholder="Ingresa tu mensaje" aria-label="Ingresa tu mensaje" aria-describedby="button-addon2" id="input-message">
                              <button class="btn btn-primary btn-outline-secondary" type="button" id="send-message"><i class='bx bx-send'></i></button>
                          </div>
                      </div>
                  </div>
  							</div>
  						</div>
  					</div>
  				</div>
              <!--/ Basic Bootstrap Table -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/chat.js"></script>
    <script src="https://kit.fontawesome.com/3be4e7ddfc.js" crossorigin="anonymous"></script>
    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>