<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="sweetalert2/sweetalert2@11.js"></script>
    <!-- Bootstrap CSS 
-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js">
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="style/inicio.css">
    <link rel="stylesheet" href="style/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/b00314f003.js" crossorigin="anonymous"></script>
    <title>CEPEIGE</title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- Aquí colocamos la foto o imagen del logotipo -->
        <a class="navbar-brand" href="index.php">
            <img src="img/favicon.ico" alt="Logotipo" width="50">
        </a>
        <button class="navbar-toggler" type="button" id="navbarToggleBtn">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php"><i class="fa-solid fa-person"></i> Entrada</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="comida.php"><i class="fa-sharp fa-solid fa-utensils"></i> Comida</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" href="taller.php"><i class="fa-solid fa-book"></i> Talleres</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="login.php"><i class="fa-solid fa-user-lock"></i> Iniciar Sesion</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<br>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggleBtn = document.getElementById('navbarToggleBtn');
        const navbarNav = document.getElementById('navbarNav');

        navbarToggleBtn.addEventListener('click', function() {
            navbarNav.classList.toggle('show');
        });
    });
/*funcion del codigo de hora / fecha / pais estatico*/

document.addEventListener("DOMContentLoaded", function() {
  function getCurrentTime() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, "0");
      const minutes = String(now.getMinutes()).padStart(2, "0");
      const seconds = String(now.getSeconds()).padStart(2, "0");
      return `${hours}:${minutes}:${seconds}`;
  }

  function getCurrentDate() {
      const now = new Date();
      const day = String(now.getDate()).padStart(2, "0");
      const month = String(now.getMonth() + 1).padStart(2, "0");
      const year = now.getFullYear();
      return `${day}/${month}/${year}`;
  }

  function getUserCountry() {
      return "Ecuador";
  }

  function updateDateTime() {
      document.getElementById("time").textContent = getCurrentTime();
      document.getElementById("date").textContent = getCurrentDate();
      document.getElementById("country").textContent = getUserCountry();
  }

  setInterval(updateDateTime, 1000);
  updateDateTime();
});

</script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" ></script>
  </body>
</html>
