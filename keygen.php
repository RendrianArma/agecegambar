<?php 
if($_POST['keywordlist'])
{
	$string = trim(preg_replace('/\s\s+/', ', ', $_POST['keywordlist']));
	$command = 'php generatekw.php "'.$string.'" 1000000 > keywords/' . str_replace(' ', '-', $_POST['filename']). '.txt';
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Keywords Generator</title>
	<meta name="keywords" content="instagram otomatis, otomatis instagram" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="/assets/img/favicon.png" />
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800,900" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/bootstrap/css/bootstrap-extended.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/font-feather/feather.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/font-ps/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/plugins/izitoast/css/iziToast.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/css/colors.min.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/css/layout.css">
	<link rel="stylesheet" type="text/css" href="https://kopigram.net/assets/css/oauth-page.css">
	<script type="text/javascript" src="https://kopigram.net/assets/plugins/jquery/jquery.min.js"></script>
</head>
<body>
	<div class="loading-overplay"><div class="cssload-container"><div class="cssload-speeding-wheel"></div></div></div>
	<div class="bg-svg">
		<svg jsname="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 810" preserveAspectRatio="xMinYMin slice" aria-hidden="true">
			<path fill="#f6fafc" d="M592.66 0c-15 64.092-30.7 125.285-46.598 183.777C634.056 325.56 748.348 550.932 819.642 809.5h419.672C1184.518 593.727 1083.124 290.064 902.637 0H592.66z"></path>
			<path fill="#f4f8fb" d="M545.962 183.777c-53.796 196.576-111.592 361.156-163.49 490.74 11.7 44.494 22.8 89.49 33.1 134.883h404.07c-71.294-258.468-185.586-483.84-273.68-625.623z"></path>
			<path fill="#fcfdfe" d="M153.89 0c74.094 180.678 161.088 417.448 228.483 674.517C449.67 506.337 527.063 279.465 592.56 0H153.89z"></path>
			<path fill="#f2f6f9" d="M153.89 0H0v809.5h415.57C345.477 500.938 240.884 211.874 153.89 0z"></path>
			<path fill="#fcfdfe" d="M1144.22 501.538c52.596-134.583 101.492-290.964 134.09-463.343 1.2-6.1 2.3-12.298 3.4-18.497 0-.2.1-.4.1-.6 1.1-6.3 2.3-12.7 3.4-19.098H902.536c105.293 169.28 183.688 343.158 241.684 501.638v-.1z"></path>
			<path fill="#eef4f8" d="M1285.31 0c-2.2 12.798-4.5 25.597-6.9 38.195C1321.507 86.39 1379.603 158.98 1440 257.168V0h-154.69z"></path>
			<path fill="#f4f8fb" d="M1278.31,38.196C1245.81,209.874 1197.22,365.556 1144.82,499.838L1144.82,503.638C1185.82,615.924 1216.41,720.211 1239.11,809.6L1439.7,810L1439.7,256.768C1379.4,158.78 1321.41,86.288 1278.31,38.195L1278.31,38.196z"></path>
		</svg>
	</div>
	<div class="oauth-wrap">
		
		<div class="oauth-form">
			
			<div class="tab-content">
				<div class="tab-pane fade in active">
					<?php
					if(isset($command))
					{
						echo '
						<div class="form-group">
						<label for="email"> Command Line</label>
						<textarea class="form-control" rows="30" name="keywordlist">'.$command.'</textarea>
						
						</div>
						<div class="form-group">
						<a href="/keygen.php" class="btn btn-success btn-block">REFRESH</a>
						</div>';

						
					}
					
					else
					{
						echo '<form action="/keygen.php" class="actionForm" method="POST">
						<div class="form-group">
						<label for="email"> File Name</label>
						<input type="text" class="form-control" name="filename">

						</div>
						<div class="form-group">
						<label for="email"> Keyword List</label>
						<textarea class="form-control" rows="10" name="keywordlist"></textarea>

						</div>
						
						<input type="submit" class="btn btn-success btn-block" name="GENERATE">

						</form>';

					}
					?>

					

					
					<div class="oauth-social mt15 pb15">
						
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="https://kopigram.net/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://kopigram.net/assets/plugins/izitoast/js/iziToast.min.js"></script>
	
</body>
</html>
