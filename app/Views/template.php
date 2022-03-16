<!DOCTYPE html>
<html lang="en">

<?php

$db = db_connect();
$sql = $db->query('SELECT icon,menu_name,menu_url,username FROM `trn_menu` JOIN `tb_menu` ON `tb_menu`.id_menu=`trn_menu`.id_menu JOIN `tb_admin` ON `tb_admin`.level=`trn_menu`.level WHERE `tb_admin`.level=1
');
$row = $sql->getResult();
?>
<style>
  body {
    font-family: 'poppins' !important;
  }
</style>

<head>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:wght@700&family=Pacifico&family=Poppins:wght@300;900&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <!-- Required meta tags -->
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Stellar Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/vendors/chartist/chartist.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-brand-wrapper d-flex align-items-center">
        <a class="navbar-brand brand-logo" href="<?= base_url(); ?>/assets/index.html">
          <img src="<?= base_url(); ?>/assets/images/logo.svg" alt="logo" class="logo-dark" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?= base_url(); ?>/assets/index.html"><img src="<?= base_url(); ?>/assets/images/logo-mini.svg" alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
        <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Welcome Admin Hospital!</h5>
        <ul class="navbar-nav navbar-nav-right ml-auto">
          <form class="search-form d-none d-md-block" action="#">
            <i class="icon-magnifier"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
          <li class="nav-item"><a href="<?= base_url(); ?>" class="nav-link"><i class="icon-basket-loaded"></i></li>
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="<?= base_url(); ?>#" data-toggle="dropdown" aria-expanded="false">
              <i class="icon-speech"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
              <a class="dropdown-item py-3">
                <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                <span class="badge badge-pill badge-primary float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url(); ?>/assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url(); ?>/assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="<?= base_url(); ?>/assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                </div>
                <div class="preview-item-content flex-grow py-2">
                  <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                  <p class="font-weight-light small-text"> The meeting is cancelled </p>
                </div>
              </a>
            </div>
          </li>
          <li class="nav-item dropdown language-dropdown d-none d-sm-flex align-items-center">
            <a class="nav-link d-flex align-items-center dropdown-toggle" id="LanguageDropdown" href="<?= base_url(); ?>#" /assets/ data-toggle="dropdown" aria-expanded="false">
              <div class="d-inline-flex mr-3">
                <i class="flag-icon flag-icon-us"></i>
              </div>
              <span class="profile-text font-weight-normal">English</span>
            </a>
            <div class="dropdown-menu dropdown-menu-left navbar-dropdown py-2" aria-labelledby="LanguageDropdown">
              <a class="dropdown-item">
                <i class="flag-icon flag-icon-us"></i> English </a>
              <a class="dropdown-item">
                <i class="flag-icon flag-icon-fr"></i> French </a>
              <a class="dropdown-item">
                <i class="flag-icon flag-icon-ae"></i> Arabic </a>
              <a class="dropdown-item">
                <i class="flag-icon flag-icon-ru"></i> Russian </a>
            </div>
          </li>
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="<?= base_url(); ?>#" /assets/ data-toggle="dropdown" aria-expanded="false">
              <img class="img-xs rounded-circle ml-2" src="<?= base_url(); ?>/assets/images/faces/face8.jpg" alt="Profile image"> <span class="font-weight-normal"> Henry Klein </span></a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <div class="dropdown-header text-center">
                <img class="img-md rounded-circle" src="<?= base_url(); ?>/assets/images/faces/face8.jpg" alt="Profile image">
                <p class="mb-1 mt-3">Allen Moreno</p>
                <p class="font-weight-light text-muted mb-0">allenmoreno@gmail.com</p>
              </div>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-energy text-primary"></i> Activity</a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-question text-primary"></i> FAQ</a>
              <a class="dropdown-item"><i class="dropdown-item-icon icon-power text-primary"></i>Sign Out</a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="<?= base_url(); ?>#" /assets/ class="nav-link">
              <div class="profile-image">
                <img class="img-xs rounded-circle" src="<?= base_url(); ?>/assets/images/faces/face8.jpg" alt="profile image">
                <div class="dot-indicator bg-success"></div>
              </div>
              <div class="text-wrapper">
                <p class="profile-name">Allen Moreno</p>
                <p class="designation">Administrator</p>
              </div>
              <div class="icon-container">
                <i class="icon-bubbles"></i>
                <div class="dot-indicator bg-danger"></div>
              </div>
            </a>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Dashboard</span>
          </li>
          <?php foreach ($row as $r) : ?>
            <li class="nav-item col">
              <a class="nav-link col-12" href="<?= base_url('/' . $r->menu_url); ?>">
                <i class="col <?= $r->icon; ?>"></i>
                <span class="menu-title"><?= $r->menu_name; ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row purchace-popup">
            <div class="col-12 stretch-card grid-margin">
              <div class="card card-secondary">
                <span class="card-body d-lg-flex align-items-center">
                  <?= view($actView); ?>
                  <button class="close popup-dismiss ml-2">
                  </button>
                </span>
              </div>
            </div>
          </div>
          <!-- Quick Action Toolbar Starts-->
          <!-- <div class="row quick-action-toolbar">
            <div class="col-md-12 grid-margin">
              <div class="card">
                <div class="card-header d-block d-md-flex">
                  <h5 class="mb-0">Quick Actions</h5>
                  <p class="ml-auto mb-0">How are your active users trending overtime?<i class="icon-bulb"></i></p>
                </div>
                <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                  <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button type="button" class="btn px-0"> <i class="icon-user mr-2"></i> Add Client</button>
                  </div>
                  <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button type="button" class="btn px-0"><i class="icon-docs mr-2"></i> Create Quote</button>
                  </div>
                  <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button type="button" class="btn px-0"><i class="icon-folder mr-2"></i> Enter Payment</button>
                  </div>
                  <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                    <button type="button" class="btn px-0"><i class="icon-book-open mr-2"></i>Create Invoice</button>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
          <!-- Quick Action Toolbar Ends-->
          <!-- <div class="row">
            <div class="col-md-12 grid-margin"> -->
          <!-- <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="d-sm-flex align-items-baseline report-summary-header">
                        <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="row report-inner-cards-wrapper">
                    <div class=" col-md -6 col-xl report-inner-card">
                      <div class="inner-card-text">
                        <span class="report-title">EXPENSE</span>
                        <h4>$32123</h4>
                        <span class="report-count"> 2 Reports</span>
                      </div>
                      <div class="inner-card-icon bg-success">
                        <i class="icon-rocket"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-xl report-inner-card">
                      <div class="inner-card-text">
                        <span class="report-title">PURCHASE</span>
                        <h4>95,458</h4>
                        <span class="report-count"> 3 Reports</span>
                      </div>
                      <div class="inner-card-icon bg-danger">
                        <i class="icon-briefcase"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-xl report-inner-card">
                      <div class="inner-card-text">
                        <span class="report-title">QUANTITY</span>
                        <h4>2650</h4>
                        <span class="report-count"> 5 Reports</span>
                      </div>
                      <div class="inner-card-icon bg-warning">
                        <i class="icon-globe-alt"></i>
                      </div>
                    </div>
                    <div class="col-md-6 col-xl report-inner-card">
                      <div class="inner-card-text">
                        <span class="report-title">RETURN</span>
                        <h4>25,542</h4>
                        <span class="report-count"> 9 Reports</span>
                      </div>
                      <div class="inner-card-icon bg-primary">
                        <i class="icon-diamond"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
          <!-- </div>
          </div> -->
          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
              </div>
            </div>
          </div>
        </div> -->

          <!-- <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body"> -->
          <!-- <div class="table-responsive border rounded p-1">
                  <table class="table table-striped|sm|bordered|hover|inverse table-inverse table-responsive">
                    <thead class="thead-inverse|thead-default">
                      <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td scope="row"></td>
                        <td>1</td>
                        <td>2</td>
                      </tr>
                      <tr>
                        <td scope="row"></td>
                        <td>1</td>
                        <td>2</td>
                      </tr>
                    </tbody>
                  </table>
                </div> -->
          <!-- </div>
              </div>
            </div>
          </div> -->
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <!-- <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="<?= base_url(); ?>/assets/https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
          </div>
        </footer> -->
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="<?= base_url(); ?>/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="<?= base_url(); ?>/assets/./vendors/chart.js/Chart.min.js"></script>
    <script src="<?= base_url(); ?>/assets/./vendors/moment/moment.min.js"></script>
    <script src="<?= base_url(); ?>/assets/./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="<?= base_url(); ?>/assets/./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="<?= base_url(); ?>/assets/js/off-canvas.js"></script>
    <script src="<?= base_url(); ?>/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="<?= base_url(); ?>/assets/./js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>

<!-- <script>
  var site_url = "<?php echo base_url(); ?>";
  $(document).ready(function() {
    $('#tbl-mahasiswa-data').DataTable({
      lengthMenu: [
        [10, 30, -1],
        [10, 30, "All"]
      ],
      bProcessing: true,
      serverSide: true,
      scrollY: "400px",
      scrollCollapse: true,
      ajax: {
        url: site_url + "/pasienLoadData",
        type: "post",
        data: {}
      },
      columns: [{
          data: "nik_pasien"
        },
        {
          data: "nama_pasien"
        },
        {
          data: "jenis_kelamin"
        },
        {
          data: "alamat"
        },
        {
          data: "no_telp"
        },
      ],
      columnDefs: [{
        orderable: false,
        targets: [0, 1, 2, 3]
      }],
      bFilter: true,
    });
  });
</script> -->