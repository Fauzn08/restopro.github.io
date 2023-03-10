<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rumah Makan Sederhana</title>
    <link rel="stylesheet" href="../landingpage/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="rms.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark - shadow-lg - fixed-top m-auto">
		<div class="container"> 
		  <img src="./gambar/logo restoran 1.png" width="80px" alt="">
		  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse text-right" id="navbarNav">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item">
					<a class="nav-link" href="#tentang">About Us</a>
				  </li>
				<li class="nav-item">
					<a class="nav-link" href="#menu">Menu</a>
				  </li>
				<li class="nav-item">
					<a class="nav-link" href="#testimoni">Testimony</a>
				  </li>
			  <li class="nav-item">
				<a class="nav-link" href="#kontak">Contact</a>
			  </li>
			  <li>
			  <div>
				<a href="../landingpage/login/login.php">
					<button class="button">Log in</button>
				</a>
			  </div>
			  </li>
			</ul>
		  </div>
		</div>
	  </nav>

      <!--Hero Section-->
<section>
    <div class="banner">
     <video autoplay loop muted>
         <source src="../landingpage/gambar/restoranvid.mp4">
    </video>
    <div class="video-info">
        <h1>Selamat Datang Di RestoPro</h1>
        <hr>
        <h4>Berbagai Makanan Nikmat dan Berkualitas Ada Di sini</h4>
        <a href="#menu"><input type="submit" class="btn btn-dark" value="Lihat Rekomendasi Menu"></a>
    </div> 
    </div>
</section>
<!--About-->
<section id="tentang" class="about">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img style="margin-left: 70px; margin-top: 90px; align-items: center;" src="../landingpage/gambar/logo restoran 1.png" width="230px" alt="">
            </div>
            <div class="col-6 text-center pt-5">
                <h3 style="color: #fff;">About Us</h2><br>
                <h5 style="color: #fff;">RestoPro adalah sebuah restoran makanan yang
                    menyediakan menu tradisional dan menu barat. Kami menjamin 
                    bahan baku pengolahan yang dipakai higienis dan terjamin halal
                    serta mengedepankan kenyamanan bagi para pembeli yang datang 
                    ke restoran kami.</h5>
            </div>
        </div>
    </div>
  </section>
  <svg style="background-color:#1f1f1f;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="000" fill-opacity="1" d="M0,96L60,112C120,128,240,160,360,181.3C480,203,600,213,720,197.3C840,181,960,139,1080,128C1200,117,1320,139,1380,149.3L1440,160L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>

  <!--menu-->
  <section id="menu">
    <div class="container">
        <div class="row">
            <div class="col pb-3 text-center">
                <h3 style="color: #fff; font-size: 40px;">Rekomendasi Menu</h3>
            </div>
        </div>

        <div class="container position-relative mt-5">
      <div class="row">
        <div class="col-ms-3 d-flex justify-content-start">
          <div class="card-fitur me-3 position-relative">
            <img src="../landingpage/gambar/Rendang.png" alt="">

            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                <h5>
                  Rendang
                </h5>
              </div>
            </div>
          </div>

          <div class="col-ms-3 d-flex justify-content-start">
          <div class="card-fitur me-3 position-relative">
            <img src="../landingpage/gambar/ayamgeprek.png" alt="">

            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                <h5>
                  Ayam Geprek
                </h5>
              </div>
            </div>
          </div>

          <div class="col-ms-3 d-flex justify-content-start">
          <div class="card-fitur me-3 position-relative">
            <img src="../landingpage/gambar/ayambakar.png" alt="">

            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                <h5>
                  Ayam Bakar
                </h5>
              </div>
            </div>
          </div>

          <div class="col-ms-3 d-flex justify-content-start">
          <div class="card-fitur me-3 position-relative">
            <img src="../landingpage/gambar/baksosapi.png" alt="">

            <div class="overlay position-absolute top-0 bottom-0 start-0 end-0 w-100 h-100">
              <div class="position-absolute top-50 start-50 translate-middle text-center w-100">
                <h5>
                  Bakso Sapi
                </h5>
              </div>
            </div>
          </div>
        
        </div>
    </div>
  </section>
  <svg style="background-color:#2C3333;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#1f1f1f" fill-opacity="1" d="M0,224L48,240C96,256,192,288,288,277.3C384,267,480,213,576,176C672,139,768,117,864,122.7C960,128,1056,160,1152,192C1248,224,1344,256,1392,272L1440,288L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path></svg>
  <!--Testimoni-->
  <section id="testimoni">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center pb-2">
          <h2 style="color: #fff;">Testimoni Pelanggan</h2>
        </div>
      </div>

      <div class="row mt-5">
            <div class="col-md-4 text-center">
              <div class="card-testi">
                <img src="./gambar/Ellipse 1.png" width="120px" alt="" >
                <h3 class="mt-5">Ryan Aldiansyah</h3>
                <p class="mt-4">"Menu di restoran ini 
                sangat beragam serta memiliki
                 tempat yang nyaman saat 
                menikmati makanan di restoran ini"</p>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="card-testi">     
                <img src="./gambar/Ellipse 2.png" width="120px" alt="" >
                <h3 class="mt-5">Afarah Nur</h3>
                <p class="mt-4">???Pelayanan yang diberikan sangat baik dan makanan yang disajikan enak???</p>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="card-testi">
                <div class="circle-icon position-relative mx-auto">
                <img src="./gambar/Ellipse 3.png" width="120px" alt="" >
                </div>
                <h3 class="mt-5">Syamsu ahsaf</h3>
                <p class="mt-4">"Tidak rugi datang ke restoran ini. Pelayanan dan fasilitas yang disediakan
              sangat baik serta rasa dari makanan yang disajikan sangat enak!???</p>
              </div>
            </div>
          </div>
        </div>
  </section>

  <!--Contact-->
  <section id="kontak">

    <div class="container">
      <div class="row">
        <div style="color: #fff;" class="col-md-6 mt-5">
          <h3>Ingin melakukan pengaduan?<br>
            silahkan hubungi kontak kami.
          </h3>
          <div class="kontak"><br/>
            <h5 class="namakontak pb-3">Kontak</h5>
            <div  class="mb-3 d-flex align-items-center">
              <div>
              <img style="margin-left: 10px;" src="../landingpage/gambar/icon gedung.png" alt="">
            </div>
              <a href="#" style="margin-left: 30px;" > Jl. Hayam Wuruk, Mangga Besar, Kec. Taman Sari, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11130</a>
            </div>

            <div class="mb-3">
              <img style="margin-left: 10px;" src="../landingpage/gambar/icon telepon.png" alt="">
              <a href="#"> 081212123432</a>
            </div>

            <div class="mb-3">
              <img style="margin-left: 10px;" src="../landingpage/gambar/icon pesan.png" alt="">
              <a href="#">restopro@gmail.com</a>
            </div>
          </div>
        </div>

        <div class="col-md-6 ">
          <div class="card-contact w-90">
          <iframe style="border-radius:10px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.865387067159!2d106.8125064817143!3d-6.148774849851576!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f609cbae1301%3A0xfc1440758abb39db!2sJl.%20Hayam%20Wuruk%2C%20RT.4%2FRW.6%2C%20Mangga%20Besar%2C%20Kec.%20Taman%20Sari%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011130!5e0!3m2!1sid!2sid!4v1676339687738!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>

      </div>
    </div>
 </section>

   <!--footer-->
   <section>
   <footer>
    <div class="container">
        <div class="row">
            <div class="col">
            <p class="text-center" style="color: #fff;">Copyright @2023</p>
            </div>
        </div>
    </div>
   </footer>
   </section>
</body>
</html>
</body>
</html>