<?php
//echo "HEYY ";
session_start();
if(isset($_SESSION['id']))
{
if(isset($_SESSION['status_upload']))
{
  if($_SESSION['status_upload']==1)
  {
    echo "<script>alert('Your Blog Is Uploaded')</script>";
  }
  else
  {
   echo "<script>alert('Blog Upload Error')</script>"; 
  }
  unset($_SESSION['status_upload']);
}
}
else
{
  $_SESSION['warning']=1;
  header('location:main.php');
}
$servername="localhost";
$username="root";
$password="";
$database="weblog";
$con=mysqli_connect($servername,$username,$password,$database);
if(!$con){
  die("connection failed".$con->connect_error);
}
if(isset($_SESSION['id']))
{
  $id=$_SESSION['id'];
  $query="select * from bloggers where id='$id'";
  $result=mysqli_query($con,$query);
  if(mysqli_num_rows($result)>0)
  {
    $row=mysqli_fetch_assoc($result);
    $_SESSION['name']=$row['username'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>We Blogger</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  /*Navigation Bar CSS*/
  body {
      font: 400 15px/1.8 Lato, sans-serif;
      color: #000000;
  }
  div{
     word-wrap: break-word;
  }
    img{
      height:100vh !important;
      width:100vw;
    }

    .navbar-brand{
      color: #fff!important;
    }
    .nav li a{
      background-color: transparent !important;
      color: white !important;
      font-size: 20px;
    }
    .navbar-nav li a.active, .navbar-nav li a:hover{
      background-color: #fff !important;
      color: #000000 !important;
      transform: rotate(7deg);
    }


    .container-fluid{
      margin: 0;
      padding: 0;
    }
    .bg-tr{
      background:transparent;
      border-bottom:1px solid #fff;
    }
    .bg-grey{
      background:#2d2d30; 
    }
    .bg-gr{
      background-color: #000;
      color: #fff;
    }

    /*Modal CSS*/
   
   .modal-header{
    background-color: #2d2d30;
    color: #fff;
   }
   .btn-nav-opp{
    background: #fff;
    border-color: #2d2d30;
    border-radius: 0px;
   /* background-color: black;*/
    color: #000000;
    letter-spacing: 2px;
    font-size: 16px;    
   }
  .bottom-border{
    border-bottom:2px solid grey !important; 
  }
   .btn-clear{
    color: #fff  !important;
    background-color:#2d2d30 !important;
   }
   .btn-clear:hover{
      background: #fff !important;
      color: #2d2d30  !important;
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
/*STory List*/
a,a:hover,a:visited,a:link,a:active{
  text-decoration: none!important;
  color:inherit;
}
.story-item:hover{
  border-bottom:2px solid grey !important; 
}
.story-item .panel:hover{
    box-shadow: 5px 15px 10px rgba(0,0,0,.9);
  }
  .story-item .panel{
    border:2px solid grey;
    border-radius: 0px;
  }  
.story-list .row{
  display: flex;
}
.story-list .col-sm-4 .panel{
  height: 300px;
 }
.item-img{
  width:100%;
  height:200px !important;
}

 /*OVERFLOW STORY CONTROL*/
div,p,h1,h2,h3 {
    text-overflow: ellipsis;
    overflow: hidden;
}
.overflow-control
{ 
  white-space: nowrap;
  height: auto;
  overflow-wrap: nowrap;
  text-overflow: ellipsis; // This is where the magic happens
}

/*div story*/

 .margin-story{
  margin-top: 20px !important;
  margin-bottom: 20px !important;
 }
 .zero-padding{
  padding: 0px;
 }
/*Modal*/

.full-screen{
  height: 100%;
  width:  100%; 
}
  </style>
  
  <!MODAL CATCH SCRIPT>

  <script>
    $(document).ready(function () {
    $("#content-modal").on('show.bs.modal',function (e) {
        var x=$(e.relatedTarget).data('id');
        var type=$(e.relatedTarget).data('type');
        //alert("hi");
        $.ajax
        ({
          type: "POST",
          url: "data_retrieve.php",
          dataType: 'json',
          data:{id:x,table:type},
          success: function(data)
            {
            document.getElementById("cont-head").innerHTML=data.head;
            document.getElementById("cont-body-text").innerHTML=data.content;
            document.getElementById("cont-body-img").src="img/"+type+"/"+data.image;
            document.getElementById("cont-body-img").alt=data.image;
            }

        });
     /* $.ajax({
           url : 'data_retrieve.php',
           type: 'POST',
           dataType:'json',            
           success: function(response) {
            alert("hey bro");
            var result=$.parseJSON(response);
            alert("hey");
            document.getElementById("cont-head").innerHTML=result[0];
          }
          });
*/


        
    });
});
  </script>
    <script>
    $(document).ready(function() {
        $('a.activable').click(function() {
           // alert('ho ho ho');
            $('a.activable.active').removeClass('active');
            $(this).addClass('active');
        });
    });

  </script>
</head>
<body id="mybody">


  <!Content-Modal>


  <div class="modal fade" id=content-modal>
    <div class="modal-dialog  full-screen">
      <div class="modal-content">
        <div class="modal-header">
           <button class="close" style="background-color:transparent;color:#fff !important;font-size:30px;" type="button" data-dismiss="modal">&times;</button>
           <h3 id="cont-head" class="text-center">
              Heading Missing..
           </h3>
        </div>
        <div id="cont-body" class="modal-body" style="padding: 0px!important;">
          <div id="cont-body-img-div" style="margin-right:20px;margin-bottom:10px;float:left;border-color:10px solid red;height:500px;width:400px;">
            <img id="cont-body-img" class="img-responsive">
          </div>
          <p id="cont-body-text">
            
          </p> 
        </div>
      </div>
    </div>
  </div>



  <!Write Modal>

  <div class="modal fade" id="write_modal">
    <div class="modal-dialog  full-screen">
      <div class="modal-content">
         <div class="modal-header">
           <button class="close" style="background-color:transparent;color:#fff !important;font-size:30px;" type="button" data-dismiss="modal">&times;</button>
           <h3 class="text-center"><span class="glyphicon glyphicon-log-in"> Your Blog Panel </span></h3>
         </div>
        <div class="modal-body">
          <form action="write.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="section">Choose Section:</label>
              <select required name="select">
              <option selected="selected" value="select">Select</option>
              <option value="movies">Movies</option>
              <option value="tvseries">T.V.Series</option>
              <option value="sports">Sports</option>
              <option value="stories">Stories</option>
              <option value="education">Education</option>
              <option value="others">Others</option>
              </select>
            </div>
            <div class="form-group">  
              <label for="blog-head">Enter Heading</label>
              <input  name="blog-head" required type="text" class="form-control" placeholder="Heading..">
            </div>
            <div class="form-group">  
              <label for="blog-img">Select Image</label>
              <input  name="blog-img" required type="file">
            </div>

            <div class="form-group">  
              <label for="blog-content">Write Ur Blog:</label>
              <textarea name="blog-content" required class="form-control" rows="10" cols="10" placeholder="Content.."></textarea>  
            </div>
            <div class="form-group text-center"> 
              <button class="btn btn-default btn-lg btn-clear" type="submit">
              Submit Blog 
              </button>
            </div>
          </form>   
        </div>
      </div>
    </div> 
  </div>


  <!MyCarousel>
  

  <div class="container-fluid">
    <div id="main_carousel" class="carousel slide" data-interval="false"data-ride="carousel">


      <!Navigation Bar>

      <nav class="navbar navbar-default navbar-fixed-top" style="background-color:rgba(45,45,48,0.7);">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav" >
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <span class="navbar-brand">LOGO</span>
          </div>
          <div class="carousel-buttons navbar-right">
            <div id="mynav" class="collapse navbar-collapse">
              <ul class="nav navbar-nav ">
                <li><a  class="activable active" data-target="#main_carousel" data-slide-to="0" href="#">Movies</a></li>
                <li><a  class="activable" data-target="#main_carousel" data-slide-to="1" href="#">T.V. Series</a></li>
                <li><a  class="activable"  data-target="#main_carousel" data-slide-to="2" href="#">Sports</a></li>
                <li><a  class="activable" data-target="#main_carousel" data-slide-to="3" href="#">Educational</a></li>
                <li><a  class="activable" data-target="#main_carousel" data-slide-to="4" href="#">Stories</a></li>
                <li><a  class="activable" data-target="#main_carousel" data-slide-to="5" href="#">Others</a></li>
                <li>
                <form class="form-inline" style="padding-top:10px;">
                <div class="form-group">
                <button type="button" data-backdrop="static" data-toggle="modal" data-target="#write_modal" class="btn btn-default btn-nav-opp">Write Blog !</button>
                </div>
                <div class="form-group">
                <label style="color:white;font: 400 20px/1.8 Lato, sans-serif;"><?php echo "Welcome ".$row['username']." !!" ?></label>

                </div>                
                </form>
                </li>
                </ul>
            </div>
          </div>    
        </div>
      </nav>
       <div class="logout">
          <button class="btn btn-default" style ="background-color:rgba(0,0,0,0.4);color:white;font: 400 20px/1.8 Lato, sans-serif;margin-left:92.9%;margin-top:50px;position:fixed; z-index:10;" type="button" onclick="location.href='main.php'">
            Log Out
          </button>
       </div> 



      <div class="carousel-inner" role="listbox">
        
        <!Movies Section Start>

        <div class="item active">

          <?php
            include("inc/movies.php");
          ?>
        </div>

        <!Movies Section End>

        <!TV Series Section Start>
        
        <div class="item">

          <?php
            include("inc/tvseries.php"); 
          ?>

        </div>
        
        <!TV Series Section End>
         
         <!Sports Section Start>

        <div class="item">

          <?php
            include("inc/sports.php"); 
          ?>

        </div>
         
        <!Sports Section End>

        <!Educational Section Start>


        <div class="item">

          <?php
            include("inc/education.php"); 
          ?>

        </div>

        <!Educational Section End>

        <!Stories Section Start>
        
        <div class="item">

          <?php
            include("inc/stories.php"); 
          ?>

        </div>

        <!Stories Section End>

        <!Others Section Start>

        <div class="item">

          <?php
            include("inc/others.php"); 
          ?>

        </div>
        
        <!Others Section End>


      </div>
    
  </div>
  </div>
  
<!footer..>
  <div class="container-fluid text-center bg-grey" style="color:#fff;">
    <?php
    include("inc/footer.php");
    ?>
  </div>

  <!Smooth Slide>
  
  <?php  
  include("inc/smooth_slide.php");
  ?>

</body>
</html>