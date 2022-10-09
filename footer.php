<!--<!DOCTYPE html>
<html>
<head>
	<title></title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    

	<style type="text/css">
	footer
	{
		width: 100%;
		height: 170px;
		background-color: black;
		
	}
		.fa
		{
			margin: 0px 10px;
			padding: 5px;
			font-size: 20px;
			width: 20px;
			height: 20px;
			text-align: left;
			text-decoration: none;
			border-radius: 50%;
		}
		.fa:hover
		{
			opacity: .7;
		}
		.fa-facebook
		{
			background: #3B5998;
			color: white;
		}
		.fa-twitter
		{
			background: #55ACEE;
			color: white;
		}
		.fa-google
		{
			background: #dd4b39;
			color: white;
		}
		.fa-instagram
		{
			background: #125688;
			color: white;
		}
		.fa-youtube
		{
			background: red;
			color: white;
		}
		.fa-envelope
		{
			color:orange;
		}
		.fa-phone
		{
			color:orange;
		}
	</style>

</head>
<body>
<footer style="background-color: black; ">
	<br>
	<h3 style="color:white;text-align: center;">Contact us through social media</h3><br>
<br>
	<div style="margin:0px 815px;">

		<a href="https://www.facebook.com/trinitycollegedillibazar/" class="fa fa-facebook"></a>
		<a href="https://twitter.com/trinityhsschool?lang=en" class="fa fa-twitter"></a>
		<a href="https://www.trinity.edu.np/" class="fa fa-google"></a>
		<a href="https://www.instagram.com/trinityinternational2008/" class="fa fa-instagram"></a>
	    <a href="https://www.youtube.com/channel/UCI9QxocOF5Dy5_skkOYIGiA" class="fa fa-youtube"></a>
	

	<br>
	<br>
	
	<p style="color:white;">
		<li title="email"><i class ="fa fa-envelope"></i><a href="info@trinitycollege.edu.np">info@trinitycollege.edu.np </a></li>
		<li title="phone"><i class ="fa fa-phone"></i><a href="4445956">4445956</a></li>
	</p>
	
	</div>

	
</footer>
</body>
</html>-->



<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


<style type="text/css">

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  color: #d9d9d9;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}


/* .content1{
  position: relative;
  margin: 130px auto;
  text-align: center;
  padding: 0 20px;
}
.content1 .text{
  font-size: 2.5rem;
  font-weight: 600;
  color: #202020;
}
.content1 .p{
  font-size: 2.1875rem;
  font-weight: 600;
  color: #202020;
} */
footer{
  position: relative;
  bottom: 0px;
  width: 100%;
  background: #111;
}
.main-content{
  display: flex;
}
.main-content .box{
  flex-basis: 50%;
  padding: 10px 20px;
}
.box h2{
  font-size: 1.125rem;
  font-weight: 600;
  text-transform: uppercase;
}
.box .content{
  margin: 20px 0 0 0;
  position: relative;
}
.box .content:before{
  position: absolute;
  content: '';
  top: -10px;
  height: 2px;
  width: 100%;
  background: #1a1a1a;
}
.box .content:after{
  position: absolute;
  content: '';
  height: 2px;
  width: 15%;
  background: #f12020;
  top: -10px;
}
.left .content p{
  text-align: justify;
}
.left .content .social{
  margin: 20px 0 0 0;
}
.left .content .social a{
  padding: 0 14px;
}
.left .content .social a span{
  height: 50px;
  width: 50px;
  background: #1a1a1a;
  line-height: 50px;
  text-align: center;
  font-size: 18px;
  border-radius: 5px;
  transition: 0.3s;
}
.left .content .social .fa-facebook-f:hover{
  background: darkblue;
  
}
.left .content .social .fa-twitter:hover{
	background: #55ACEE;
}
.left .content .social .fa-instagram:hover{
	background: #e1306c;
}
.left .content .social .fa-youtube:hover{
  background: red;
}

.center .content .fas{
  font-size: 1.4375rem;
  background: #1a1a1a;
  height: 45px;
  width: 45px;
  line-height: 45px;
  text-align: center;
  border-radius: 50%;
  transition: 0.3s;
  cursor: pointer;
}
.center .content .fas:hover{
  background: #f12020;
}
.center .content .text{
  font-size: 1.0625rem;
  font-weight: 500;
  padding-left: 10px;
}
.center .content .phone{
  margin: 15px 0;
}
.right form .text{
  font-size: 1.0625rem;
  margin-bottom: 2px;
  color: #656565;
}
.right form .msg{
  margin-top: 10px;
}
.right form input, .right form textarea{
  width: 100%;
  font-size: 1.0625rem;
  background: #151515;
  padding-left: 10px;
  border: 1px solid #222222;
}
.right form input:focus,
.right form textarea:focus{
  outline-color: #3498db;
}
.right form input{
  height: 35px;
}
.right form .btn{
  margin-top: 10px;
}
.right form .btn button{
  height: 40px;
  width: 100%;
  border: none;
  outline: none;
  background: #f12020;
  font-size: 1.0625rem;
  font-weight: 500;
  cursor: pointer;
  transition: .3s;
}
.right form .btn button:hover{
  background: #000;
}
.bottom center{
  padding: 5px;
  font-size: 0.9375rem;
  background: #151515;
}
.bottom center span{
  color: #656565;
}
.bottom center a{
  color: #f12020;
  text-decoration: none;
}
.bottom center a:hover{
  text-decoration: underline;
}
@media screen and (max-width: 900px) {
  footer{
    position: relative;
    bottom: 0px;
  }
  .main-content{
    flex-wrap: wrap;
    flex-direction: column;
  }
  .main-content .box{
    margin: 5px 0;
  }
}


</style>

  </head>
  <body>
    <footer>
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>Trinity stands for academic accomplishment. The College has a congenial environment, state-of-the-art infrastructure, and reputed faculty. Managed by a devoted team of professionals advised by outstanding national and foreign advisors, the institution ensures student requirement and academic support go hand in hand</p>
            <div class="social">
              <a href="https://www.facebook.com/trinitycollegedillibazar/."><span class="fab fa-facebook-f"></span></a>
              <a href="https://twitter.com/trinityhsschool?lang=en"><span class="fab fa-twitter"></span></a>
              <a href="https://www.instagram.com/trinityinternational2008/"><span class="fab fa-instagram"></span></a>
              <a href="https://www.youtube.com/channel/UCI9QxocOF5Dy5_skkOYIGiA"><span class="fab fa-youtube"></span></a>
            </div>
          </div>
        </div>
        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Dillibazar Height, Kathmandu, Nepal</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">4445956</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">info@trinitycollege.edu.np</span>
            </div>
          </div>
        </div>
        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      </div>
    </footer>
  </body>
</html>