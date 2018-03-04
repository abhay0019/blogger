<!DOCTYPE html>
<html lang="en">
<head>
  <title>We Bloggers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  /*Navigation Bar CSS*/
    img{
      height:100vh !important;
      width:100vw;
    }
    .navbar-brand{
      color: #fff!important;
    }
    .nav li a{
      color: white !important;
      font-size: 20px;
    }
    .container-fluid{
      margin: 0;
      padding: 0;
    }
    .bg-tr{
      background:transparent;
      border-bottom:1px solid #fff;
    }


    /*Modal CSS*/
   
   .modal-header{
    background-color: #00C5CD;
    color: #fff;
   }
   .btn-clear{
    color: #fff !important;
   }
   .btn-clear:hover{
      background: #00C5CD!important;
   }
   .btn-clear{
    background: transparent;
    border-color: #fff;
   /* background-color: black;*/
    color: #fff;
    letter-spacing: 2px;
    font-size: 15px;
    font-weight: bold;
   }
   .img{
    z-index: -1;
   }
  .fixed-center{
    top: 10vh;
    left: 1vw;
    position: absolute;
    background-color: transparent;
    color: #fff;
   }
   .fixed{
    top: 88vh;
    left: 88vw;
    position: absolute;
    background-color: transparent;
   }
  </style>
</head>
<body>

  <!Navigation Bar>

  <nav class="navbar navbar-default navbar-fixed-top bg-tr">
    <div class="container">
      <div class="navbar-header">
        <span class="navbar-brand">LOGO</span>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a><button type="button" data-toggle="modal" data-target="#login_modal" class="btn btn-info btn-clear">Login</button></a></li>
        <li><a><button type="button" data-toggle="modal" data-target="#signup_modal" class="btn btn-info btn-clear">SignUp</button></a></li>
      </ul>
    </div>
  </nav>
  
  <!Login Modal>

  <div class="modal fade" id="login_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <button class="close" style="color:black !important;font-size:30px;" type="button" data-dismiss="modal">&times;</button>
         <div class="modal-header">
           <h3 class="text-center"><span class="glyphicon glyphicon-log-in"> Login</span></h3>
         </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="email">Enter Email:</label>
              <input type="email" class="form-control" placeholder="Enter Email-Id" size="10">
            </div>
            <div class="form-group">  
              <label for="password">Enter Password:</label>
              <input type="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-group text-center"> 
              <button class="btn btn-default btn-lg btn-clear" type="submit">
              Login
              </button>
            </div>
          </form>   
        </div>
      </div>
    </div> 
  </div>

  <!Sign up Modal>

  <div class="modal fade" id="signup_modal">
    <div class="modal-dialog">
      <div class="modal-content">
        <button class="close" style="color:#fff !important;font-size:30px;" type="button" data-dismiss="modal">&times;</button>
         <div class="modal-header">
           <h3 class="text-center"><span class="glyphicon glyphicon-log-in"> SignUp</span></h3>
         </div>
        <div class="modal-body">
          <form class="form-horizontal">
              <div class="form-group">
                <label class="control-label col-sm-2" for="Name">Name:</label>
                <div class="col-sm-10">
                 <input type="text" class="form-control" placeholder="Enter Name" size="60"> 
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2" for="Email">Email:</label>
                <div class="col-sm-10">
                 <input type="email" class="form-control" placeholder="Enter Email" size="60"> 
                </div>
              </div>              
              <div class="form-group">
                <label class="control-label col-sm-2" for="Passowrd">Password:</label>
                <div class="col-sm-10">
                 <input type="password" class="form-control" placeholder="Enter Password" size="60"> 
                </div>
              </div>              
              <div class="form-group text-center"> 
                <button class="btn btn-default btn-lg btn-clear" type="submit">
                Register
                </button>
              </div>
          </form>   
        </div>
      </div>
    </div> 
  </div>
  
  <!MyCarousel>
  

  <div class="container-fluid">
    <div id="home_carousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#home_carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home_carousel" data-slide-to="1"></li>
        <li data-target="#home_carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="img/home_.jpg" class="img img-responsive">
          <div class="carousel-caption">
            <h3>We Value</h3>
            <h4>Whats your story?</h4>
            <br>
          </div>
        </div>
        <div class="item">
          <img src="img/home_2.jpg" class="img img-responsive">
          <div class="carousel-caption">
            <h3>We Value</h3>
            <h4>Whats your story?</h4>
            <br>
          </div>
        </div>
        <div class="item">
          <img src="img/home_3.jpg" class="img img-responsive">
          <div class="carousel-caption">
            <h3>We Value</h3>
            <h4>Whats your story?</h4>
            <br>
          </div>
        </div>                
      </div>


    <!left right slide>

    <a class="left carousel-control" role="button" data-slide="prev" href="#home_carousel">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" role="button" data-slide="next" href="#home_carousel">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>    
    </div>
  </div>

  <div class="fixed">
    <button  type="button" class="btn btn-default btn-lg" style="background:transparent;color:#fff;" onclick="window.location.href='main.php'"> 
    Read Blogs <span class="glyphicon glyphicon-chevron-right" style="font-size:20px;color: #fff;"></span>
    </button>
  </div>
</body>
</html>