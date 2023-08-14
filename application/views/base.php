<!DOCTYPE html>
<html lang="en">
<head>
  <?php include "head.php";?>
</head>
<body>
  <!-- ======= Header ======= -->
  <?php include "header.php";?>
  <?php 
  foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; ?>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <?php include "menu.php";?>
  <!-- End Sidebar-->

  <main id="main" class="main" style="padding: 20px 20px 0px 20px;">
    <div class="pagetitle">
      <h1>Dashboard</h1>
      <!-- ========================AQUI VA EL CRUD======================== -->
      <div style="padding: 10px">
      <?php echo $output; ?>
      </div>
      <?php foreach($js_files as $file): ?>
          <script src="<?php echo $file; ?>"></script>
      <?php endforeach; ?>
      <!-- ========================FIN  VA EL CRUD======================== -->
    </div>
    <!-- End Page Title -->
  </main>
  <!-- End #main -->
  <!-- ======= Footer ======= -->
  <?php include "footer.php";?>
</body>
</html>