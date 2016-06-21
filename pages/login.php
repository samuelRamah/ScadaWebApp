<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="style0.css">
	<title>Login...</title>
	<link rel ="stylesheet" type="text/css" href="styleOfficielle.css" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/slate-bootstrap.min.css">
</head>
<body>
	<!-- <script type="text/javascript">
		function test(form1)
		{
			var m2p;
			var pass="msi3";
			m2p=document.form1.pass.value;
			if (document.form1.pseudo==""){
				alert("Tous les champs doivent être remplis!!!");
				window.location="Login.html"
			}else if (document.form1.pass==""){
				alert("Tous les champs doivent être remplis!!!");
				window.location="Login.html"
			}else if (m2p!=pass) {
				window.location="Login.html"
			} else{
				window.location="pejy_fandraisana.html"
			};
		}
	</script>
	-->

	<div class="container">
		<div class="modal-header" align="center">
		<img id="img_logo" class="img-circle" src="images/ispm.jpg"></img>
		    <div class="modal-body">
		        <div id="div-login-msg">
		            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right">
		                
		            </div>
		            <div class="form-control" id="erreur" style="color:red; background-color=grey;">
						
					</div>
		            <span id="text-login-msg">

		                IDENTIFIER VOUS :

		            </span>
		        </div>
		        <form class="formulaire" method="POST" action="">
			        <input id="pseudo" class="form-control" type="text" required="" placeholder="Username"></input>
			        <input id="pass" class="form-control" type="password" required="" placeholder="Password"></input>
			        <div class="checkbox">
			            <label>Se souvenir</label>
			        </div>
			    </form>
		    </div>
		    <div class="modal-footer">
		             <input class="btn btn-primary btn-lg btn-block" id="connecter" type="button" value="SING IN"></button>
		       
		     <div id="debugage">
		     	
		     </div> 
		    </div>
		</div>
	</div>

	<script src="jquery.js" type="text/javascript"></script>
	<script src="ajaxLogin.js" type="text/javascript"></script>
</body>
</html>
