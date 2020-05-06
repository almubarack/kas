<?php 

//session
    session_start();
      
      if (!isset($_SESSION["login"])) {
        header("location: log.php");
        exit;
      }

    require 'function.php';

//Query database
    $karyawan = query("SELECT * FROM data_karyawan");


//fungsi cari
    if (isset($_POST["cari"])){

      $karyawan = cari($_POST["keyword"]);
    }


 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Uang akhirat</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">HOME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

          <ul class="nav navbar-nav">
            <li class="active">
              <a href="biodata.php">BIODATA <span class="sr-only">(current)</span></a>
            </li>
            <li>
              <a href="datakas.php">DATA KAS </a>
            </li>
          </ul>


          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">option <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="logadmin.php">Admin</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="logout.php">logout</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-right" action="" method="post">
            <div class="form-group">
              <input name="keyword" autocomplete="off" autofocus="" type="text" class="form-control" placeholder="Search">
            </div>
            <button name="cari" type="submit" class="btn btn-default">Cari</button>
          </form>
          
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
            <h1>=</h1>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-sm-7 col-sm-offset-2">
            <table class="table table-bordered">
             <tr>
                <th class="text-center">No</th>
                <th class="text-center">Photo</th>
                <th class="text-center">Bio</th>
              </tr>

    <!-- menampilkan hasil databases -->
    <?php $id = 1; ?>
    <?php 
      foreach ($karyawan as $baris)
     : ?>

              <tr>
                <td class="text-center"><?php echo $id;?></td>
                <td class="text-center">
                  <img src="gambar/<?php echo $baris["gambar"]; ?>" alt="Trulli" width="180" class="btn btn-default">
                </td>
                <td>
                  <ul class="list-group">
                    <li class="list-group-item text-left">Nama : <?php echo $baris["nama"]; ?></li>
                    <li class="list-group-item text-left">Telp : <?php echo $baris["telp"]; ?></li>
                    <li class="list-group-item text-left">Jabatan : <?php echo $baris["jabatan"]; ?></li>
                    <li class="list-group-item text-left">Status : <?php echo $baris["status"]; ?></li>
                  </ul>
                </td>
              </tr>

    <?php $id =$id+1; ?>      
    <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>      
    </section>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  </body>
</html>