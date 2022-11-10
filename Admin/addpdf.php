<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  background-color: white;
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

.book
{
    width: 400px;
    margin: 0px auto;
}
.form-control
{
  background-color: blue;
  color: white;
  height: 40px;
}
.form-control1
{
 /*background-color: yellow;*/
  color: yellow;
  height: auto;
  font-size: 20px;
  float: left;
  opacity: .9;

}
.form-control2
{
 /* background-color: red;*/
  color: black;
  height: auto;
  font-size: 15px;
  float: left;
}
 #image_input{
  
   background-position: center;
  width:250px;
  height:350px;
  border: 2px solid grey;
  background-color: white;
  background-size: cover;
  text: 30px;
} 
.container
{
	height: 826px;
	background-color: black;
	opacity: .5;
	color: white;
}

</style>

	</style>


</head>
<body>
	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user1']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user1']; 
                }
                ?>
            </div><br><br>

            <div class="h"> <a href="books.php">Books</a></div>
            <div class="h"> <a href="add.php">Add Books</a> </div> 
            <div class="h"> <a href="delete.php">Delete Books</a></div>
            <div class="h"> <a href="request.php">Book Request</a></div>
            <div class="h"> <a href="issue_info.php">Issue Information</a></div>
        </div>

<div id="main">
  <span style="font-size:30px;cursor:pointer; color: black;" onclick="openNav()">&#9776; open</span>
  <div class="container" style="text-align: center;">
    <h2 style="color:green; font-family: Lucida Console; text-align: center"><b>Add PDF</b></h2><br>
    <!--<div class="containers"> -->
    <form class="book" action="" method="post" enctype="multipart/form-data">
        
<!--         <input type="text" name="bid" class="form-control" placeholder="Book id" required=""><br>
<div  id="display_image"></div><br><br> -->
               
<img id ="image_input"><br>    
      <br>
      
      <input class="form-control2"type="file" accept="image/*" name="image" required="" onchange="preview_image(event)"> <br><br>
      <lable class="form-control1"><b>Choose Your PDF File:-></b></lable><br><br>
      <input class="form-control2" type="file" name="pdf_file"  accept=".pdf" required=""> <br><br>
        <input type="text" name="name" class="form-control" placeholder="PDF Name" required=""></input><br>
        <input type="text" name="authors" class="form-control" placeholder="Authors Name" required=""></input><br>
        

        <button style="text-align: center;" class="btn btn-primary" type="submit" name="submit">Upload</button>
        
      </form>
        </div>
    </div>
</div>
              
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "lightblue";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "lightpink";
}

/* const image_input = document.querySelector("#image_input");
var uploaded_image = "";

image_input.addEventListener("change", function(){
  const reader = new FileReader();
  reader.addEventListener("load", () => {
    uploaded_image =reader.result;
    document.querySelector("#display_image").style.backgroundImage ='url(${uploaded_image})';
  });
 reader.readAsDataURL(this.files[0]);
}) */

function preview_image(event) {
         document.getElementById('image_input');
        // document.getElementById('display_image').style.display='none';
          var reader = new FileReader();
          reader.onload = function(){
           var output = document.getElementById('image_input');
           console.log(output.src = reader.result);
          }
          reader.readAsDataURL(event.target.files[0]);
         }


</script>

<?php
    if (isset($_POST['submit'])) {
 
      move_uploaded_file($_FILES['image']['tmp_name'],"images/".$_FILES['image']['name']);
      move_uploaded_file($_FILES['pdf_file']['tmp_name'],"pdf/".$_FILES['pdf_file']['name']);
			  $name = $_POST['name'];
      $authors= $_POST['authors'];
			$image=$_FILES['image']['name'];
      $pdf=$_FILES['pdf_file']['name'];

		
      mysqli_query($db,"INSERT INTO pdf_data VALUES ('','$name','$authors','$image','$pdf');");
?>
<script>
           alert("PDF added successful");

  </script>
<?php
  }
?>

</body>

</html>