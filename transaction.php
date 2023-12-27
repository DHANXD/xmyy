<?php include('session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Transaksi Saya - <?php echo $s0['instansi']; ?></title>
  <meta name="description" content="<?php echo $s0['deskripsi']; ?>">
  <meta name="keywords" content="<?php echo $s0['keyword']; ?>">
  <meta property="og:title" content="Transaksi Saya - <?php echo $s0['instansi']; ?>"/>
  <meta property="og:description" content="<?php echo $s0['deskripsi']; ?>" />
  <meta property="og:url" content="<?php echo $urlweb; ?>" />
  <meta property="og:image" content="<?php echo $urlweb; ?>/upload/<?php echo $s0['image']; ?>" />
  <meta name="resource-type" content="document" />
  <meta http-equiv="content-type" content="text/html; charset=US-ASCII" />
  <meta http-equiv="content-language" content="en-us" />
  <meta name="author" content="Arie Budi" />
  <meta name="contact" content="ariebudi.com" />
  <meta name="copyright" content="Copyright (c) ariebudi.com. All Rights Reserved." />
  <meta name="robots" content="index, nofollow">

  <link rel="shortcut icon" type="image/x-icon" href="<?php echo $urlweb; ?>/upload/favicon.png">

  <link rel="stylesheet" href="<?php echo $urlweb; ?>/assets/plugins/summernote/dist/summernote-bs4.css"/>
  <!--Select Plugins-->
  <link href="<?php echo $urlweb; ?>/assets/plugins/select2/css/select2.min.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="<?php echo $urlweb; ?>/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!--Data Tables -->
  <link href="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $urlweb; ?>/assets/plugins/bootstrap-datatable/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
  <!-- animate CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Horizontal menu CSS-->
  <link href="<?php echo $urlweb; ?>/assets/css/horizontal-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="<?php echo $urlweb; ?>/assets/css/app-style.css" rel="stylesheet"/>
  <link href="<?php echo $urlweb; ?>/assets/css/style-main<?php echo $s0['warna']; ?>.css" rel="stylesheet"/>
 
</head>

<body>

  <!-- Start wrapper-->
  <div id="wrapper">

    <!--Start topbar header-->
    <?php include('top_menu.php'); ?>
    <!--End topbar header-->

    <div class="clearfix pt-5"></div>
    <div class="pt-5 pb-5">
      <div class="container">
       <div class="row">
          <div class="col-lg-12">
            <div class="pt-3 pb-4">
              <h5>Riwayat Transaksi</h5>
              <span class="strip-primary"></span>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="pb-3">
              <div class="section">
                <div class="card-body">
                  <div class="table-responsive">
                    <div class="alert-message text-left mb-3">
                      <a class="text-white"><strong>Perhatian!!</strong> Jika status kosong silahkan Lapor Admin.</a>
                    </div>
                    <table id="default-datatable" class="table table-bordered">
                      <thead>
                        <tr class="bg-primary text-white">
                          <th class="text-center" style="vertical-align: middle;">No</th>
                          <th class="text-center" style="vertical-align: middle;">Tgl Transaksi</th>
                          <th class="text-center" style="vertical-align: middle;">No Transaksi</th>
                          <th class="text-center" style="vertical-align: middle;">Produk</th>
                          <th class="text-center" style="vertical-align: middle;">Harga</th>
                          <th class="text-center" style="vertical-align: middle;">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sql_1 = mysqli_query($conn,"SELECT * FROM `tb_order` WHERE id_user = '$userID' ORDER BY id DESC") or die(mysqli_error());
                          $no = 0;
                          while($s1 = mysqli_fetch_array($sql_1)){
                            $no++;
                            $produkID = $s1['produkID'];
                        ?>
                        <tr>
                          <td class="text-center text-white" style="vertical-align: middle; white-space: normal;"><?php echo $no; ?></td>
                          <td class="text-center text-white" style="vertical-align: middle; white-space: normal;"><?php echo $s1['created_date']; ?></td>
                          <td class="text-center text-white" style="vertical-align: middle; white-space: normal;"><a href="<?php echo $urlweb; ?>/cektrx/?trxNum=<?php echo $s1['kd_transaksi']; ?>"><?php echo $s1['kd_transaksi']; ?></a></td>
                          <td class="text-left text-white" style="vertical-align: middle; white-space: normal;"><?php echo $s1['kategori']; ?><br><small><?php echo $s1['title']; ?></small><br><small><?php echo $s1['userID']; ?>(<?php echo $s1['zoneID']; ?>)</small></td>
                          <td class="text-center text-white" style="vertical-align: middle; white-space: normal;"><?php echo number_format($s1['sub_total']); ?></td>
                          <td class="text-center text-white" style="vertical-align: middle; white-space: normal;">
                            <?php
                              if($s1['status'] == 0){
                                echo '<button class="btn btn-primary btn-sm">Waiting</button>';
                              }
                              else if($s1['status'] == 1){
                                echo '<button class="btn btn-warning btn-sm">Proccess</button>';
                              }
                              else if($s1['status'] == 2){
                                echo '<button class="btn btn-success btn-sm">Success</button>';
                              }
                              else if($s1['status'] == 3){
                                echo '<button class="btn btn-danger btn-sm">Failed</button>';
                              }
                            ?>
                          </td>
                        </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="d-block d-sm-none" style="height: 100px;"></div>
    <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
	  <!--Start footer-->
    <?php include('footer.php'); ?>
    <script>
      $(document).ready(function() {
        //Default data table
        $('#default-datatable').DataTable();
      });
    </script>
</body>
</html>
