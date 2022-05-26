<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--Style-->
    <link rel="stylesheet" href="style.css">
    <!--Fontawesome-->
    <script
      src="https://kit.fontawesome.com/52339f9582.js"
      crossorigin="anonymous"
    ></script>
    <!--favicon-->
    <link rel="shorcut icon" href="img/logo-makr.png" type="image/png">
    <title>Distance Between cities</title>
  </head>
  <body>
    <div class="jumbotron py-1">
        <div class="container-fluid">
            <h1 class="display-4">Distance between cities</h1>
            <p class="h4">We help you to calculate travelling distances.</p>
        </div>
    </div>
    <!--FORM with horizontal field + label-->
    <div class="container">
        <form>
            <div class="row mt-3">
                <label class="col-2 col-form-label" for="from">From:</label>
                <div class="col-10">
                    <input type="text" id="from" placeholder="Origin" class="form-control">
                </div>
            </div>
            <div class="row mt-3">
                <label class="col-2 col-form-label" for="to">To:</label>
                <div class="col-10">
                    <input type="text" id="to" placeholder="Destination" class="form-control">
                </div>
            </div>
        </form>
        <div class="offset-2 col-10 mt-3">
            <button class="btn btn-lg btn-success submit" onclick="calculateRoute()">Submit</button>
        </div>
    </div>
    <!--MAP-->
    <div class="container-fluid">
        <div id="googleMap"></div>
    </div>
    <div id="output"></div>
    

    <!--FOOTER-->
    <footer class="footer">
      <p>Online Notes, Copyright &copy; <?php $date = date("Y"); echo $date ?> develop by Joan Kouloumba</p>
      <div>
        <ul class="social-media">
          <li>
            <a
              href="https://www.linkedin.com/in/joan-kouloumba-570a7680/"
              target="_blank"
              ><i class="fa-brands fa-linkedin-in"></i
            ></a>
          </li>
          <li>
            <a href="https://twitter.com/joanKouloumba" target="_blank"
              ><i class="fa-brands fa-twitter"></i
            ></a>
          </li>
          <li>
            <a href="https://github.com/jokoul" target="_blank"
              ><i class="fa-brands fa-github"></i
            ></a>
          </li>
        </ul>
        <p>
          <a
            href="https://joan-kouloumba.in/professional-site/index.html#achievements"
            >Visit more site like this on the professional site.</a
          >
        </p>
      </div>
    </footer>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
     <!--EMBED Javascript MAPS API-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjILPJidCXRJGyhHcXb57by3tmEOW5zOA"></script>
    <!-- My Javascript file-->
    <script src="javascript.js"></script>
  </body>
</html>