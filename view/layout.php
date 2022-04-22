<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'view/widgets/head.php' ?>
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php include 'view/widgets/leftmenu.php' ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

      <?php include 'view/widgets/topmenu.php' ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php 
                include $view;
            ?>       
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->

  <?php include 'view/widgets/footer.php' ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- modal -->


  <?php include 'view/widgets/script.php' ?>

</body>

</html>