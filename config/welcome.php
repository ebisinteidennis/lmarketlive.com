<html>
    
<head>
	<meta http-equiv="Content-type" content="text/html;charset=UTF-8" />
	<title>Legalsparktrade</title>
	<link href='styles/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link href='styles/custom.css' rel='stylesheet' type='text/css'>
	<link href='styles/css/hover.css' rel='stylesheet' type='text/css'>
	<link href='styles/animate.css' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src='styles/bootstrap.min.js' type='text/javascript'></script>
	<script src='styles/calc.js' type='text/javascript'></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
	
	<link rel="icon" href="styles/img/favicon.png" type="image/png"/>
	
	<script type="text/javascript">
		$(document).ready(function() {
			$(".cal2").click(function() {
				$(".calculate_ctn").toggle();
				$(".calculate_ctn").addClass("animated lightSpeedIn");
			});
		});
	</script>
	
	
	
				<script type="text/javascript">
				var tday=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
				var tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

				function GetClock(){
				var tzOffset = -5;//set this to the number of hours offset from UTC

				var d=new Date();
				var dx=d.toGMTString();
				dx=dx.substr(0,dx.length -3);
				d.setTime(Date.parse(dx))
				d.setHours(d.getHours()+tzOffset);
				var nday=d.getDay(),nmonth=d.getMonth(),ndate=d.getDate();
				var nhour=d.getHours(),nmin=d.getMinutes(),ap;
				if(nhour==0){ap=" AM";nhour=12;}
				else if(nhour<12){ap=" AM";}
				else if(nhour==12){ap=" PM";}
				else if(nhour>12){ap=" PM";nhour-=12;}

				if(nmin<=9) nmin="0"+nmin;

				document.getElementById('clockbox').innerHTML=""+tday[nday]+", "+tmonth[nmonth]+" "+ndate+" "+nhour+":"+nmin+ap+"";
				}

				window.onload=function(){
				GetClock();
				setInterval(GetClock,1000);
				}
				</script>
				
										
				
	
	


</head>

<body>
	
		<div class="headerTopContainer">
		<div class="headerTopInner">
			<div class="hdTopLeft">
				<a href="?a=home" title=""></a>
			</div>
			<div class="hdTopRight">
				
								
				
				<div class="form">
					<div id="clockbox" style="display: inline;"></div>
					
					
									
										<script language=javascript>
										function checkform() {
										  if (document.mainform.email.value=='') {
											alert("Please type your email!");
											document.mainform.email.focus();
											return false;
										  }
										  if (document.mainform.psw.value=='') {
											alert("Please type your password!");
											document.mainform.psw.focus();
											return false;
										  }
										  return true;
										}
										</script>
										
	
					
						<form method=POST action="login.php" name=loginform>
							<input class="user" type="email" name=email value='' placeholder="Email">
							<input class="pass" type="password" name=psw value='' placeholder="Password">
							<input class="login" type="submit" name="submit" value="LOGIN">
						</form>
						
				</div>
 				
				
								
				
				<div class="contact">
					<div>
						info@Legalsparktrade.com
					</div>
			
			</div>
		</div>
	</div>
	
	
	
	
	<div class="headerBotContainer">
		<div class="headerBotInner">
			<div class="navbar">
				<div class="navbar-inner">
					<ul class="nav">                   
						<li><a href="../index.html">Home</a></li>
                        <li><a href="../about.html">about the company</a></li>
                        <li><a href="../affiliate.html">AFFILIATE PROGRAM</a></li>
                        
                        <li><a href="../faq.html">FREQUENTLY ASKED QUESTIONs</a></li>
                        <li><a href="../support.html">SUPPORT CENTER</a></li>
                        <li><a href="../news.html">news</a></li>
                        <li><a href="../monitors.html">monitors</a></li>
                        <li><a id="signup" href="register.php">signup</a></li> 											
				    </ul>
				</div>
			</div>
		</div>
	</div>


<div class="subpage-title">
	<div class="subpage-inner-title container">
		
		Welcome to <span>Legalsparktrade</span>
		
	</div>
</div>


<div class="subpage-container container">


<h3>Registration completed:</h3><br>

Thank you for joining our program.<br>
You are now an official member of this program. You can login to your account to start investing with us and use all the services that are available for our members.
<br>
<br>

<b>Important:</b> Do not provide your login and password to anyone!


</div>
<div class="paymentContainer">
		<div class="paymentInner">
			<div class="payment">
				<a href="http://perfectmoney.is/" class="pm"></a>
				<a href="https://blockchain.info/" class="bc"></a>
				<a href="https://payeer.com/en/" class="pe"></a>
			<!---	<a href="#" class="sk"></a>
				<a href="#" class="sl"></a>
				<a href="#" class="nl"></a> 
				<a href="http://advcash.com/" class="adv">--></a> 
			</div>
			<div class="pamentSocial">
				<a href="https://www.facebook.com" class="pay_fb"></a>
				<a href="" class="pay_tw"></a>
			</div>
		</div>
	</div><!-- end paymentContainer -->

	<div class="footerContainer">
		<div class="footerInner">
				<div class="footerPart footerPart1">
				<p>© 2021 Legalsparktrade. All Rights Reserved</p>
				<p class="footerLink"><a href="indexa972.php?a=rules">terms of services</a><span>|</span><a href="index15a0.php?a=support">Support center</a><span>|</span><a href="indexa972.php?a=cust&amp;page=privacy">Privacy policy</a></p>
			</div>
			<div class="footerPart footerPart2">
						
								
									<script language=javascript>
										function checkform() {
										  if (document.mainform.email.value=='') {
											alert("Please type your email!");
											document.mainform.email.focus();
											return false;
										  }
										  if (document.mainform.psw.value=='') {
											alert("Please type your password!");
											document.mainform.psw.focus();
											return false;
										  }
										  return true;
										}
										</script>
										
	
		
			<form method=POST action="login.php" name=loginform2 >
				<div class="footerInput">
			
					

				
						<input type="email" name=email value='' placeholder="email">
						<input type="password" name=psw value=''  placeholder="Password">
						
				
				</div>
				<div class="footerSubmit">
					<input type="submit" name="submit" value="LOGIN">
				</div>
					</form>
			</div>
			<div class="footerPart footerPart3">
			<p><span>Legalsparktrade LTD</span></p>
				<p>Flat 19 1 Angel Lane,</p> 
				<p>London,</p>
				<p>England,  E15 1BL</p>
				<p> United Kingdom,</p>
				
		 
				<p>Company No. #13658896</p> 
				
				
			</div>
			
		</div> 
		
		
	</div><!-- end footerContainer --> 
	

<div style="position:fixed; bottom:0px; right:0px;">


	</div>
</body>
</html>
