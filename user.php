<?php
session_start();
include("inc_koneksi.php");
if(!isset($_SESSION['user_username'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
		crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<title>Home CrowdFunding</title>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
			<div class="navbar-brand" href="#"><span class="text-success">Care</span>Bridge</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
				aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#kategori">Kategori</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#donasi">Donasi</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#berita">Berita</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#contact">Kontak</a>
					</li>
				</ul>
				<form class="d-flex">
					<input class="form-control" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-secondary me-2" type="submit">
						<i class="bi bi-search"></i>
					</button>
				</form>
				<form class="logout" action="logout.php">
					<button class="btn btn-danger" type="submit"> Logout </button>
				</form>
			</div>
		</div>
	</nav>
	<div class="home" id="home">
		<div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
			<div class="carousel-indicators">
				<button aria-label="Slide 1" class="active" data-bs-slide-to="0"
					data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2"
					data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button
					aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators"
					type="button"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img alt="..." class="d-block w-100" src="Foto/home-1.jpeg">
					<div class="carousel-caption">
						<h5>Cancer Fighter</h5>
						<p>Bantu tetangga kita agar segera sembuh dari kanker. Semangatnya yang tak pernah padam dalam
							berjuang harus kita dukung!</p>
						<p><a class="btn btn-success me-sm-3 mt-3" href="#">Donate Now</a></p>
					</div>
				</div>
				<div class="carousel-item">
					<img alt="..." class="d-block w-100" src="Foto/home-2.jpeg">
					<div class="carousel-caption">
						<h5>Nenek Sumiati</h5>
						<p>Menjadi tulang punggung keluarga di usianya yang sudah lanjut demi untuk menghidupi
							cucu-cucunya. Luangkan sebagian hartamu untuk membantu si nenek!</p>
						<p><a class="btn btn-success me-sm-3 mt-3" href="#">Donate Now</a></p>
					</div>
				</div>
				<div class="carousel-item">
					<img alt="..." class="d-block w-100" src="Foto/home-3.jpeg">
					<div class="carousel-caption">
						<h5>Musholla Al-Ikhlas</h5>
						<p>Bismillah. Pembangunan musholla ini akan bertempat di sekitar area Kampung 1. Donasi sekarang
							agar memperoleh sedekah jariyah!</p>
						<p><a class="btn btn-success me-sm-3 mt-3" href="#">Donate Now</a></p>
					</div>
				</div>
			</div><button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators"
				type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span
					class="visually-hidden">Previous</span></button> <button class="carousel-control-next"
				data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true"
					class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
		</div>
	</div><!-- about section starts -->
	<section class="about section-padding" id="about">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-12 col-12">
					<div class="about-img"><img alt="" class="img-fluid" src="Foto/about.jpg"></div>
				</div>
				<div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
					<div class="about-text">
						<h2>Berbagi Berkah</h2>
						<p>Yuk, mari kita bersama-sama memberikan kebaikan kepada yang membutuhkan. Setiap sedekah kita adalah sinar harapan bagi orang lain</p><a class="btn btn-outline-success" href="#">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</section><!-- about section Ends -->
	<!-- kategori section Starts -->
	<section class="kategori section-padding" id="kategori">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-4">
						<h2>Kategori</h2>
						<p>Pilih kategori donasi yang kamu inginkan</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-people"></i>
							<h6 class="card-title">Kemanusiaan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-shield-plus"></i>
							<h6 class="card-title">Kesehatan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-cash-coin"></i>
							<h6 class="card-title">Kewirausahaan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-tree"></i>
							<h6 class="card-title">Lingkungan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-tools"></i>
							<h6 class="card-title">Pembangunan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none">
						<div class="card-body">
							<i class="bi bi-book"></i>
							<h6 class="card-title">Pendidikan</h6>
						</div>
					</a>
				</div>
				<div class="col-12 col-md-6 col-lg-2">
					<a href="#" class="card text-white text-center bg-success pb-2 text-decoration-none my-sm-4">
						<div class="card-body">
							<i class="bi bi-three-dots"></i>
							<h6 class="card-title">Lainnya</h6>
						</div>
					</a>
				</div>
			</div>
		</div>
	</section><!-- kategori section Ends -->
	<!-- donasi strats -->
	<section class="donasi section-padding" id="donasi">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-4">
						<h2>Donasi Mendesak</h2>
						<p>Utamakan membantu yang ada dibawah ini!</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-light text-center bg-white pb-2">
						<div class="card-body text-dark">
							<div class="img-area mb-4"><img alt="" class="img-fluid" src="Foto/home-2.jpeg"></div>
							<h3 class="card-title">Nenek Sumiati</h3>
							<p class="card-text">Menjadi tulang punggung keluarga di usianya yang sudah lanjut demi untuk menghidupi
								cucu-cucunya. Luangkan sebagian hartamu untuk membantu si nenek!</p><button
								class="btn btn-success">Donate Now</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-light text-center bg-white pb-2">
						<div class="card-body text-dark">
							<div class="img-area mb-4"><img alt="" class="img-fluid" src="Foto/home-1.jpeg"></div>
							<h3 class="card-title">Cancer Fighter</h3>
							<p class="card-text">Bantu tetangga kita agar segera sembuh dari kanker. Semangatnya yang tak pernah padam dalam
								berjuang harus kita dukung!</p><button
								class="btn btn-success">Donate Now</button>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-4">
					<div class="card text-light text-center bg-white pb-2">
						<div class="card-body text-dark">
							<div class="img-area mb-4"><img alt="" class="img-fluid" src="Foto/home-3.jpeg"></div>
							<h3 class="card-title">Musholla Al-Ikhlas</h3>
							<p class="card-text">Bismillah. Pembangunan musholla ini akan bertempat di sekitar area Kampung 1. Donasi sekarang
								agar memperoleh sedekah jariyah!</p><button
								class="btn btn-success">Donate Now</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- donasi ends -->
	<!-- berita starts -->
	<section class="section-padding" id="berita">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-4">
						<h2>Berita</h2>
						<p>Update perkembangan dan berita terkini.</p>
					</div>
				</div>
			</div>
			<div class="berita">
				<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<div class="carousel-item active">
							<div class="single-item">
								<div class="row">
									<div class="col-lg-4 col-md-12 col-12">
										<div class="berita-img"><img alt="" class="img-fluid" src="Foto/home-2.jpeg"></div>
									</div>
									<div class="col-lg-8 col-md-12 col-12 ps-lg-4">
										<div class="berita-text">
											<h2>Pendidikan Layak</h2>
											<p>Campaign ini telah selsai dan telah tersalurkan ke orang yang bersangkutan.</p>
											<a class="btn btn-outline-success" href="#">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="single-item">
								<div class="row">
									<div class="col-lg-4 col-md-12 col-12">
										<div class="berita-img"><img alt="" class="img-fluid" src="img/berita-2.jpg"></div>
									</div>
									<div class="col-lg-8 col-md-12 col-12 ps-lg-4">
										<div class="berita-text">
											<h2>Pendidikan Layak<br>
											</h2>
											<p>Campaign ini telah selsai dan telah tersalurkan ke orang yang bersangkutan.</p>
											<a class="btn btn-outline-success" href="#">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="carousel-item">
							<div class="single-item">
								<div class="row">
									<div class="col-lg-4 col-md-12 col-12">
										<div class="berita-img"><img alt="" class="img-fluid" src="img/berita-3.jpg"></div>
									</div>
									<div class="col-lg-8 col-md-12 col-12 ps-lg-4">
										<div class="berita-text">
											<h2>Pendidikan Layak<br>
											</h2>
											<p>Campaign ini telah selsai dan telah tersalurkan ke orang yang bersangkutan.</p>
											<a class="btn btn-outline-success" href="#">Read More</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
						data-bs-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Previous</span>
					</button>
					<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
						data-bs-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="visually-hidden">Next</span>
					</button>
				</div>

			</div>
		</div>
	</section><!-- berita ends -->
	<!-- Contact starts -->
	<section class="contact section-padding" id="contact">
		<div class="container mb-5">
			<div class="row">
				<div class="col-md-12">
					<div class="section-header text-center pb-5">
						<h2>Contact Us</h2>
						<p>Lorem ipsum dolor sit amet, consectetur<br>
							adipisicing elit. Non, quo.</p>
					</div>
				</div>
			</div>
			<div class="row m-0">
				<div class="col-md-12 p-0 pt-4 p-4 m-auto">
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<input type="text" class="form-control" placeholder="Your full name">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<input type="email" class="form-control" placeholder="Your email here">
							</div>
						</div>
						<div class="col-md-12">
							<div class="mb-3">
								<textarea rows="3" class="form-control" placeholder="Your query here"></textarea>
							</div>
						</div>

						<button class="btn btn-warning btn-lg btn-block mt-3">Send Now</button>
					</div>
				</div>
			</div>
		</div>
	</section><!-- contact ends -->
	<!-- footer starts -->
	<footer class="bg-dark p-2 text-center">
		<div class="container">
			<p class="text-white">All Right Reserved By @Kelompok 12</p>
		</div>
	</footer>
	<!-- footer ends -->
</body>

</html>