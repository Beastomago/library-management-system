<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 850px;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		
		body {
			background-image: url("images/1111.jpg");
			background-repeat: no-repeat;
/* 			background-size: cover;
			height: 875px;
			width: 1920px; */
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
.container
{
	height: 600px;
	background-color: black;
	opacity: .8;
	color: white;
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

 
  <div class="h"> <a href="books.php">Books</a></div>
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
	<br>

<div class="container">
	<div class="srch">
		<br>
		<form class="navbar-form" method="post" name="form1">
			
			<input class="form-control" type="text" name="search" placeholder="requested.." >
		<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
 	</form>

<!-- 		<form method="post" action="" name="form1">
			<input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="bid" class="form-control" placeholder="BID" required=""><br>
			<button class="btn btn-default" name="submit" type="submit">Submit</button><br>
		</form> -->
	</div>

	<h3 style="text-align: center;">Request of Book</h3>



	<?php
	
	if(isset($_SESSION['login_user1']))
	{
		$sql= "SELECT student.username,roll,books.bid,name,authors,edition,status,id FROM student inner join issue_book ON student.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve =''";
		$res= mysqli_query($db,$sql);

		if(mysqli_num_rows($res)==0)
			{
				echo "<h2><b>";
				echo "There's no pending request.";
				echo "</h2></b>";
			}
		else
		{
			echo "<table class='table table-bordered' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				
				echo "<th>"; echo "#";  echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
				echo "<th>"; echo "Roll No";  echo "</th>";
				echo "<th>"; echo "BID";  echo "</th>";
				echo "<th>"; echo "Book Name";  echo "</th>";
				echo "<th>"; echo "Authors Name";  echo "</th>";
				echo "<th>"; echo "Edition";  echo "</th>";
				echo "<th>"; echo "Status";  echo "</th>";
				echo "<th>"; echo "Accept" ; echo "</th>";
				echo "<th>"; echo "Reject" ; echo "</th>";
			echo "</tr>";	

			$no =1;
		$_SESSION['req_bid'] = array();

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $no; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['roll']; echo "</td>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['name']; echo "</td>";
				echo "<td>"; echo $row['authors']; echo "</td>";
				echo "<td>"; echo $row['edition']; echo "</td>";
				echo "<td>"; echo $row['status']; echo "</td>";
				echo "<td>"; echo "<form method='post'>
				<input type='hidden' name='bookid' value=" .$row['bid']. ">
				<button type='submit' name='submit1' value=" . $row['id'] . " ;><i  style=\"color: red;\" class=\"glyphicon glyphicon-book\"> Procced</i></button>
				
				</form>"; echo "</td>";

				echo "<td>"; echo "<form method='post'><button type='submit' name='submit2' value=" . $row['id'] . "><i  style=\"color: red;\" class=\"glyphicon glyphicon-trash\"></i></button>
				</form>"; echo "</td>";
			

				echo "</tr>";
				


				$no++ ;


			}

		
			
		echo "</table>";
		}
	}
	else
	{
		?>
		<br>
			<h4 style="text-align: center;color: yellow;">You need to login to see the request.</h4>
			
		<?php
	}

/* 	if(isset($_POST['submit']))
	{
		$_SESSION['name']=$_POST['username'];
		$_SESSION['bid']=$_POST['bid'];

		?>
			<script type="text/javascript">
				window.location="approve.php"
			</script>
		<?php
	} */

	if(isset($_POST['submit2']))
	{
		mysqli_query($db,"DELETE  from  `issue_book`  where `issue_book`.`id` = '$_POST[submit2]'  and approve = '';");

		//echo "button pressed";
		?>
			<script type="text/javascript">
				window.location="request.php"
				</script>
		<?php				
	}
	if(isset($_POST['submit1']))
	{
		//$ids = $_POST['submit1'];
		 $_POST['bookid'];
		
		//echo "button working";
		$d4=date('d-m-o');
        echo "date4 is = $d4 <br>";
        $newDate = date('d-m-o', strtotime($d4. ' + 6 months'));
        echo $newDate ;

		 mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  'Done', `issue` =  '$d4', `return` =  '$newDate' WHERE id = '$_POST[submit1]';");

		mysqli_query($db,"UPDATE books SET quantity = quantity-1 where bid='$_POST[bookid]' ;");
	
		mysqli_query($db,"UPDATE books SET bcount = bcount+1 where bid='$_POST[bookid]' ;");
	
		$res=mysqli_query($db,"SELECT quantity from books where bid='$_POST[bookid]' ;");
	
		while($row=mysqli_fetch_assoc($res))
		{
		  if($row['quantity']==0)
		  {
			mysqli_query($db,"UPDATE books  SET status = 'not-available' where bid='$_POST[bookid]';");
		  }
		}
		?>
		  <script type="text/javascript">
			alert("Updated successfully.");
			window.location="request.php"
		  </script>
		<?php 
	}
	?> 
	
	</div>
</div>
</body>
</html>