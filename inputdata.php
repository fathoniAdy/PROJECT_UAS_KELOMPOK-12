<?php
session_start();
include("inc_koneksi.php");
if (!isset($_SESSION['admin_username'])) {
    header("location:login.php");
    exit();
}

$gambar        = "";
$nama_campaign = "";
$kategori = "";
$deskripsi = "";
$target_dana = "";
$status = "";
$error = "";
$sukses = "";

$op = isset($_GET['op']) ? $_GET['op'] : "";

if ($op == 'delete') {
    $id = $_GET['id'];
    
    // Fetch gambar filename from the database
    $sql1 = "SELECT gambar FROM campaign WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $gambar = $r1['gambar'];

    // Delete file from directory
    if (file_exists('Foto/' . $gambar)) {
        unlink('Foto/' . $gambar);
    }

    // Delete data from database
    $sql2 = "DELETE FROM campaign WHERE id = '$id'";
    $q2 = mysqli_query($koneksi, $sql2);
    if ($q2) {
        $sukses = "Berhasil menghapus data dan gambar";
    } else {
        $error = "Gagal menghapus data";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM campaign WHERE id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    if ($r1 = mysqli_fetch_array($q1)) {
        $gambar  = $r1['gambar'];
        $nama_campaign = $r1['nama_campaign'];
        $kategori = $r1['kategori'];
        $deskripsi = $r1['deskripsi'];
        $target_dana = $r1['target_dana'];
        $status = $r1['status'];
    } else {
        $error = "Gagal edit data";
    }
}

if (isset($_POST['simpan'])) {
    $nama_campaign = $_POST['nama_campaign'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $target_dana = $_POST['target_dana'];
    $status = $_POST['status'];

    $extensi = explode(".", $_FILES['gambar']['name']);
    $gambar  = "foto-".round(microtime(true)).".".end($extensi);
    $sumber  = $_FILES['gambar']['tmp_name'];
    $upload = move_uploaded_file($sumber,'Foto/'.$gambar);

    if ($gambar && $nama_campaign && $kategori && $deskripsi && $target_dana && $status) {
        if ($op == 'edit') {
            $id = $_GET['id'];
            $sql1 = "UPDATE campaign SET gambar = '$gambar', nama_campaign = '$nama_campaign', kategori = '$kategori', deskripsi = '$deskripsi', target_dana = '$target_dana', status = '$status' WHERE id = '$id'";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diupdate";
            } else {
                $error = "Data gagal diupdate";
            }
        } else {
            $sql1 = "INSERT INTO campaign (gambar, nama_campaign, kategori, deskripsi, target_dana, status) VALUES ('$gambar', '$nama_campaign', '$kategori', '$deskripsi', '$target_dana', '$status')";
            $q1 = mysqli_query($koneksi, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Silahkan memasukkan semua data";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Input Data</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="Foto/about.jpg">
	<link rel="icon" type="image/png" sizes="32x32" href="Foto/about.jpg">
	<link rel="icon" type="image/png" sizes="16x16" href="Foto/about.jpg">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="bootstrap/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<!-- <div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"><img src="Foto/CAREBRIDGE.png" alt=""></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div> -->

	<div class="header d-flex justify-content-end align-items-center">
		<div class="header-right">
			<div class="dashboard-setting user-notification mr-3">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="javascript:;" data-toggle="right-sidebar">
						<i class="dw dw-settings2"></i>
					</a>
				</div>
			</div>
			<div class="user-info-dropdown d-flex align-items-center">
				<div class="dropdown">
					<a class="dropdown-toggle d-flex align-items-center" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="Foto/about.jpg" alt="">
						</span>
						<div class="admin-name ml-2"><?php echo $_SESSION['admin_username']; ?></div>
					</a>
                	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  		<a class="dropdown-item" href="logout.php">Logout</a>
                	</div>
				</div>
			</div>
		</div>
	</div>

	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="dashboardadmin.php">
				<img src="Foto/CAREBRIDGEgede.png" alt="" class="dark-logo">
				<img src="Foto/CAREBRIDGEgede.png" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
						</a>
						<ul class="submenu">
							<li><a href="dashboardadmin.php">Dashboard Admin</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-edit2"></span><span class="mtext">Forms</span>
						</a>
						<ul class="submenu">
							<li><a href="#inputData">Input Data</a></li>
							<li><a href="#dataCampaign">Data Campaign</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-library"></span><span class="mtext">Rekap Pembayaran</span>
						</a>
						<ul class="submenu">
							<li><a href="tableslaporandonasi.php">Tabel Rekap</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="mobile-menu-overlay"></div>
	
	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div class="title">
								<h4>Input Data Baru</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="dashboardbaru.php">Home</a></li>
									<li class="breadcrumb-item active text-danger" aria-current="page">Input Data</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<!-- Input Data Start -->
				<div class="pd-20 card-box mb-30" id="inputData">
					<div class="clearfix">
						<div class="pull-left">
							<h4 class="text-danger h4">Input Data Baru</h4>
							<p class="mb-30">Masukkan Campaign baru</p>
						</div>
					</div>
					<form enctype="multipart/form-data" action="" method="POST">
						<?php if ($error) { ?>
                        	<div class="alert alert-danger" role="alert">
                            	<?php echo $error ?>
                        	</div>
                    	<?php
                        	// header("refresh:5;url=inputdata.php");
                    	}
                    	?>
                    	<?php if ($sukses) { ?>
                        	<div class="alert alert-success" role="alert">
                            	<?php echo $sukses ?>
                        	</div>
                    	<?php
                        	// header("refresh:5;url=inputdata.php");
                    	}
                    	?>
						<div class="form-group row mb-5">
							<label for="gambar" class="col-sm-12 col-md-2 col-form-label">Gambar</label>
							<div class="col-sm-12 col-md-10">
								<div class="input-group">
                                    <input type="file" class="form-control" id="inputGroupFile04" name="gambar" value="<?php echo $gambar ?>">
                                </div>
							</div>
						</div>
						<div class="form-group row">
							<label for="nama_campaign" class="col-sm-12 col-md-2 col-form-label">Nama Campaign</label>
							<div class="col-sm-12 col-md-10">
							<input type="text" class="form-control" placeholder="Masukkan Nama Campaign" id="nama_campaign" name="nama_campaign" value="<?php echo $nama_campaign ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="kategori" class="col-sm-12 col-md-2 col-form-label">Kategori</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="kategori" id="kategori">
                            		<option selected="">- Pilih Kategori -</option>
                            		<option value="Kesehatan" <?php if ($kategori == "Kesehatan") echo "selected" ?>>Kesehatan</option>
                            		<option value="Pendidikan" <?php if ($kategori == "Pendidikan") echo "selected" ?>>Pendidikan</option>
                            		<option value="Kemanusiaan" <?php if ($kategori == "Kemanusiaan") echo "selected" ?>>Kemanusiaan</option>
                            		<option value="Bencana" <?php if ($kategori == "Bencana") echo "selected" ?>>Bencana Alam</option>
                        		</select>
							</div>
						</div>
						<div class="form-group row">
							<label for="deskripsi" class="col-sm-12 col-md-2 col-form-label">Deskripsi</label>
							<div class="col-sm-12 col-md-10">
								<textarea type="text" class="form-control textarea" placeholder="Masukkan Deskripsi Donasi" id="deskripsi" name="deskripsi" value="<?php echo $deskripsi ?>"></textarea>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label for="target_dana" class="col-sm-12 col-md-2 col-form-label">Target Dana</label>
							<div class="col-sm-12 col-md-10 input-group mb-3">
								<span for="target_dana" class="input-group-text">Rp.</span>
                            	<input type="number" class="form-control" id="target_dana" name="target_dana" value="<?php echo $target_dana ?>">
                            	<span class="input-group-text">.00</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="status" class="col-sm-12 col-md-2 col-form-label">Status Campaign</label>
							<div class="col-sm-12 col-md-10">
								<select class="custom-select col-12" name="status" id="status">
                              		<option selected="">- Pilih Status -</option>
                              		<option value="Aktif" <?php if ($status == "Aktif") echo "selected" ?>>Aktif</option>
                              		<option value="Selesai" <?php if ($status == "Selesai") echo "selected" ?>>Selesai</option>
                              		<option value="Gagal" <?php if ($status == "Gagal") echo "selected" ?>>Gagal</option>
                          		</select>
							</div>
						</div>
						<div class="form-group row">
							<div class="update ml-auto mr-auto">
                      			<input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary btn-round btn-danger" />
                    		</div>
						</div>
					</form>
				</div>
				<!-- Input Data End -->
			</div>
			<!-- Tabel start -->
			<div class="card-box mb-30" id="dataCampaign">
					<div class="pd-20">
						<h4 class="text-danger h4">Data Campaign</h4>
						<p class="mb-0 ">you can find more options <a class="text-primary text-danger" href="eror403.html" target="_blank">Click Here</a></p>
					</div>
					<div class="pb-20">
						<table class="data-table table stripe hover nowrap">
							<thead>
								<tr class="text-center">
									<th class="table-plus datatable-nosort" scope="col">No.</th>
                        			<th scope="col">Gambar</th>
                       			 	<th scope="col">Nama Campaign</th>
                        			<th scope="col">Kategori</th>
                        			<th scope="col">Deskripsi</th>
                        			<th scope="col">Target Dana</th>
                        			<th scope="col">Status</th>
                        			<th scope="col">Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php
                       			$sql2 = "SELECT * from campaign order by gambar desc";
                            		$q2 = mysqli_query($koneksi, $sql2);
                            		$urut = 1;
                            		while ($r2 = mysqli_fetch_array($q2)) {
                               			$id = $r2['id'];
                                		$gambar = $r2['gambar'];
                                		$nama_campaign = $r2['nama_campaign'];
                                		$kategori = $r2['kategori'];
                                		$deskripsi = $r2['deskripsi'];
                                		$target_dana = $r2['target_dana'];
                                		$status = $r2['status'];
                            	?>
                                	<tr class="text-center">
                                    	<th scope="row"><?php echo $urut++ ?></th>
                                    	<td>
                                        	<img src="Foto/<?php echo $gambar ?>" width="160px">
                                    	</td>
                                    	<td><?php echo $nama_campaign ?></td>
                                    	<td><?php echo $kategori ?></td>
                                    	<td><?php echo $deskripsi ?></td>
                                    	<td>Rp. <?php echo number_format($target_dana) ?></td>
                                    	<td><?php echo $status ?></td>
                                    	<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="inputdatabaru.php" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="user.php"><i class="dw dw-eye"></i> View</a>
													<a class="dropdown-item" href="inputdata.php?op=edit&id=<?php echo $id ?>"><i class="dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="inputdata.php?op=delete&id=<?php echo $id ?>" onclick="return confirm('APAKAH ANDA YAKIN UNTUK DELETE DATA?')"><i class="dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
										</td>
                                	</tr>
                            	<?php
                           		}
                            	?>
							</tbody>
						</table>
					</div>
				</div>
				<!-- Tabel End -->
			<div class="footer-wrap pd-20 mb-20 card-box">
				© 2024 CareBridge. <a href="eror403.html" target="_blank" class="text-danger">All rights reserved.</a>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="bootstrap/vendors/scripts/core.js"></script>
	<script src="bootstrap/vendors/scripts/script.min.js"></script>
	<script src="bootstrap/vendors/scripts/process.js"></script>
	<script src="bootstrap/vendors/scripts/layout-settings.js"></script>
</body>
</html>