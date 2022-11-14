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

	</style>

</head>
<body>



	<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user1']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic1']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user1']; 
                }
                ?>
            </div><br><br>

 <div class="h"> <a href="add.php">Add Books</a> </div> 
 <div class="h"> <a href="addpdf.php">Add PDF</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
	<!--___________________search bar________________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
 	</form>
		<!--
	<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Delete
				</button>
		</form> -->
	</div>

	<button style="color:blue; font-size: 16px; text-decoraton:none;" class="btn btn-primaray" ><a href="../Admin/add.php">
	<span class="glyphicon glyphicon-plus" style="color:red; " > </a></span> Add Book</button>
	<h2>List Of Books</h2>
	<?php

		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from books where name like '%$_POST[search]%' OR authors like '%$_POST[search]%' OR bid like '%$_POST[search]%' OR department like '%$_POST[search]%'");

			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No book found. Try searching again.";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
				echo "<th>"; echo "";  echo "</th>";

			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				echo "<td>"; echo "<form method='post'><button type='submit' name='submit1' value =" . $row['bid'] ."><i  style=\"color: red;\" class=\"glyphicon glyphicon-remove\"></i> remove</button></form>"; echo "</td>";
				echo "<td>"; echo "<form method='post'><button type='submit' name='submit2' value =" . $row['bid'] ."><i  style=\"color: green;\" class=\"glyphicon glyphicon-edit\"></i> remove</button>
				</form>"; echo "</td>";
				//$_check['id']=$row['bid'];

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`name` ASC;");

		echo "<table class='table table-bordered table-hover'  cellspacing=-115' cellpadding=-110>";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Book-Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Quantity";  echo "</th>";
				echo "<th>"; echo "Department";  echo "</th>";
				echo "<th>"; echo "";  echo "</th>";
				echo "<th>"; echo "";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo $row['quantity']; echo "</td>";
				echo "<td>"; echo $row['department']; echo "</td>";
				echo "<td>"; echo "<form method='post'><button type='submit' name='submit1' value =" . $row['bid'] ." ><i  style=\"color: red;\" class=\"glyphicon glyphicon-remove\"></i> remove</button></form>"; echo "</td>";
			echo "<td>"; ?><form method='post'><button type='submit' name='submit2' value =" . $row['bid'] ."><a href ="bookedit.php?id= <?php echo $row['bid'] ?> "><i  style="color: green;" class=glyphicon glyphicon-edit></i> edit</button>
 				
			</form> <?php echo "</td>";
			
				echo "</tr>";
			}
		echo "</table>";
		}
/* 		if(isset($_POST['submit5']))
		{
			echo "kam lagxa ki nae";
		} */
		if(isset($_POST['submit1']))
		{
			$id= $_POST['submit1'];
			
			
			if(isset($_SESSION['login_user1']))
			{	
				
					$id=$_check['id'];
				mysqli_query($db,"DELETE from books where books.bid = '$id'; ");
				?>
					<script type="text/javascript">
						alert("Delete Successful.");
					</script>
					      <script type="text/javascript">
       							 window.location="books.php"
      						</script>
				<?php
				
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("Please Login First.");
					</script>
				<?php
			}
		}

/* 		if(isset($_POST['submit2']))
		{
			$id= $_POST['submit2'];
			
			
			if(isset($_SESSION['login_user1']))
			{	
				
				?>
 				<script type="text/javascript">
 					window.location="../Admin/bookedit.php"
 				</script>
 				<?php
				
			}
		} */
		

	?>
</div>
</body>
</html>