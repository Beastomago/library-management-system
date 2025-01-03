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
.trend
	{
  transition: margin-left .5s;
  padding: 16px;
}
@keyframes blink{
	from{background-color: white;}
	to{background-color: red;}
}


	</style>

</head>
<body>
	<?php
		$b=mysqli_query($db,'SELECT * FROM books order by bcount desc limit 0,3 ;');
	
	?>
<div id="trend">
	
<div style="width: 99%; height: 50px; margin-top: -20; padding-left: 20px;">
<div style="background-color: #f44336; padding: 10px; width: 10%;height: 50px; float: left;" ><!-- animation-name: blink; animation-duration: 2s; animation-iteration-count: infinite; -->
<h3 style="color: white; margin-top: 0px;">Trending:</h3>

</div>
<div style="background-color: #ffcccc; width:90%; height:50px; float:left; padding:10px;"> 
<table>
<?php
			while($b2=mysqli_fetch_assoc($b))
			{
				echo "<tr style='color: black; width: 400px; margin-top: 0px; float: left;'	>";
				echo "<td>"; echo "&nbsp&nbsp [".$b2['bid']."] &nbsp&nbsp" ; echo "</td>";
				echo "<td>"; echo $b2['name']; echo "</td>";
				echo "</td>";
			}
	
	?>
	<tr style ="color: black; width: 400px; margin-top: 0px; float: left;"></tr>
</table>

</div>
</div>
</div>
	<!--_________________sidenav ko lagi_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
 
 
 
  
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.getElementById("trend").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.getElementById("trend").style.marginLeft = "0";

  document.body.style.backgroundColor = "white";
}
</script>

	<!--___________________search bar ko lagi________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="search books.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book ko lagi__________________-->
<!-- 	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter Book ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div> -->


	<h2>List Of Books</h2>
	<?php

		if(isset($_POST['submit']))
		{
			/* $limit = 3;
			$page=$_GET['page'];
			$offset = ($page - 1)* $limit; */
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
				echo "<th>"; echo "NumberOfRequest";  echo "</th>";
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
				echo "<td>"; echo $row['bcount']; echo "</td>";
				echo "<td>"; echo "<form method='post'><button type='submit' name='submit1' class='btn btn-primary' value=" . $row['bid'] . "> Request </button></form>";  echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$limit = 3;
			if(isset($_GET['page'])){
			$page=$_GET['page'];}else{$page=1;
			}
			$offset = ($page - 1)* $limit;

			$res=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bid` ASC LIMIT {$offset},{$limit};");

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
				echo "<th>"; echo "NumberOfRequest";  echo "</th>";
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
				echo "<td>"; echo $row['bcount']; echo "</td>";
				echo "<td>"; echo "<form method='post'><button type='submit' name='submit1' class='btn btn-primary' value=" . $row['bid'] . "> Request </button></form>";  echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		//echo"hello";
		$res1=mysqli_query($db,"SELECT * FROM `books` ORDER BY `books`.`bid` ASC;");
		if(mysqli_num_rows($res1) > 0){
			$total_records = mysqli_num_rows($res1);
			
			$total_page = ceil($total_records / $limit);

			echo '<ul class="pagination admin-pagination" style=color:red;>';
			if($page > 1){
				echo '<li><a href="books.php?page='.($page -1).'">Prev</a></li>';

			}
		
			for($i = 1; $i <= $total_page; $i++){
				if($i == $page){
					$active= "active";
				}
				else{
					$active="";
				}
				echo '<li class ="'.$active.'"><a href="books.php?page='.$i.'">'.$i.'</a></li>';
			}
			if($total_page > $page){
				echo '<li><a href="books.php?page='.($page + 1).'">Next</a></li>';

			}
			echo '</ul>';
		}
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{	
				$sql1=mysqli_query($db,"SELECT * FROM `books` WHERE bid='$_POST[bid]';");
				$row1=mysqli_fetch_assoc($sql1);
				$count1=mysqli_num_rows($sql1);
				if($count1!=0)
				{
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
				}
				else{
					?>
					<script type="text/javascript">
						alert("The book is not avaiable in the library");
					</script>
				<?php
				}
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to Request a book");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>