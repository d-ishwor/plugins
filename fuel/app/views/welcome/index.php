<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Packages </title>
	<?php echo Asset::css(['bootstrap.css','bootstrap-theme.css','custom.css']); ?>
	<style>
		header{
			height: 75px;
			width: 100%;
			margin-bottom: 40px;
		}
		a{
			color: #883ced;
		}
	</style>
</head>
<body>
	<?php echo view::forge('welcome/common');?>
	<header>
		<div class="container">
			<div id="logo"></div>
		</div>
	</header>
	<div class="container">
		<div class="jumbotron">
			<span class="btn btn-sm btn-default js-fuel-modal-call" href="<?php echo Uri::Create('welcome/modal/modal');?>">Modal</span>
			<span class="btn btn-sm btn-default js-fuel-modal-call" href="<?php echo Uri::Create('welcome/modal/copy_to_clipboard');?>">Copy to Clipboard</span>
			<span class="btn btn-sm btn-default js-fuel-modal-call" href="<?php echo Uri::Create('welcome/modal/cropper');?>">Cropper</span>
			<span class="btn btn-sm btn-default js-fuel-modal-call" href="<?php echo Uri::Create('welcome/modal/filter_dd');?>">Filter on Drop Down</span>


















			

			<h1> Packages of Fuel</h1>
		</div>

		<hr/>
		<footer>
			<p class="pull-right">Copyright &copy; Ishwor Pd Rijal</p>
			<p>
				<small>Version: <?php echo Fuel::VERSION; ?></small>
			</p>
		</footer>
	</div>
	<?php echo Asset::js(['jquery.min.js','bootstrap.min.js','custom.js']); ?>
</body>
</html>
