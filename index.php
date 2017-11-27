<?php include('htmlHeader.php'); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
<a class="navbar-brand" href="#">Video Demo</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarVideoManager" aria-controls="navbarVideoManager" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarVideoManager">
	<div class="navbar-nav mr-auto">
		<a class="nav-item nav-link active" href="index.php"> Home </a>

		<div class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			View Model
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				<a id="show-original-only" class="dropdown-item">Original Video Only</a>
				<a id="show-proccessed-only" class="dropdown-item">Processed Video Only</a>
				<a id="show-both" class="dropdown-item">Both Video</a>
			</div>
		</div>

		<div class="dropdown show d-inline-block">
			<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="select-video-process-type" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: auto">视频螺旋</a>
			<div class="dropdown-menu" aria-labelledby="select-video-process-type">
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('视频螺旋');">视频螺旋</a>
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('步态识别');">步态识别</a>
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('关节检测');">关节检测</a>
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('安全帽检测');">安全帽检测</a>
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('人员检测');">人员检测</a>
				<a class="dropdown-item" onclick="$('#select-video-process-type').html('火焰烟雾检测');">火焰烟雾检测</a>
			</div>
		</div>
		<a class="nav-item nav-link" id="start-video-process"> Start Process </a>

	</div>
	<form class="form-inline my-2 my-lg-0">
		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	</form>
</div>
</nav>
<div class="mx-auto" style="width: 80%;">
	<h3>Online Video</h3>
	<div class="input-group">
		<input id="currentVideoUrl" type="text" class="form-control" placeholder="Input Video Url...">
		<span class="input-group-btn">
			<button id="getVideoFromUrl" class="btn btn-secondary" type="button">Get Video <i class="fa fa-cloud-download" aria-hidden="true"></i></button>
		</span>
	</div>
	<hr>
	<div class="videoPanel">
		<center>
			<div class="video-left-container d-none d-inline-block bg-dark embed-responsive embed-responsive-16by9" style="width: 45%">
				<video id="video-left" class="embed-responsive-item video-js">
					<source src="https://localhost:8087/VideoManager/server/ReceivedFiles/movie.ogg" type='video/ogg'>
					抱歉，您的浏览器不支持Html5 Video！
				</video>
			</div>
			<div class="video-right-container d-none d-inline-block bg-dark embed-responsive embed-responsive-16by9" style="width: 45%">
				<video id="video-right" class="embed-responsive-item video-js">
					<source src="https://localhost:8087/VideoManager/server/ReceivedFiles/movie.ogg" type='video/ogg'>
					抱歉，您的浏览器不支持Html5 Video！
				</video>
			</div>
			<hr>
		</center>
	</div>

	<h3>Select Video</h3>
	<div class="file-loading">
    	<input id="btn-select-video" type="file" name="videos[]" multiple>
	</div>
</div>
<hr>
<div style="width: 100%; height: 500px"></div>
<?php include('htmlFooter.php'); ?>
