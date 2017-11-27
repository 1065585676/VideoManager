<script type="text/javascript">
$(document).ready(function() {
	var player_left_video = videojs( document.querySelector('#video-left'), {
		controls: true,
		autoplay: false,
		preload: 'auto'
	});
	var player_right_video = videojs( document.querySelector('#video-right'), {
		controls: true,
	});

	player_left_video.on('ready', function() {
		console.log("player_left_video is ready");
	});
	player_right_video.on('ready', function() {
		console.log("player_right_video is ready");
	});

	player_left_video.on('play', function() {
		player_right_video.play();
	});
	player_left_video.on('pause', function() {
		player_right_video.pause();
	});

	player_left_video.on('timeupdate', function() {
		if(player_right_video.paused()){
			player_right_video.currentTime(player_left_video.currentTime());
		}
	});

	$('#currentVideoUrl').val("http://localhost:8087/VideoManager/server/ReceivedFiles/videoDemo001.mp4");

	function showVideoPanel(mode='original') {
		if (mode == "original") {
			$('.video-left-container').css('width', "80%");
			$('.video-left-container').addClass('d-inline-block');
			$('.video-right-container').removeClass('d-inline-block');
		} else if (mode == "proccessed") {
			$('.video-right-container').css('width', "80%");
			$('.video-right-container').addClass('d-inline-block');
			$('.video-left-container').removeClass('d-inline-block');
		} else if (mode == "both") {
			$('.video-left-container').css('width', "45%");
			$('.video-right-container').css('width', "45%");
			$('.video-left-container').addClass('d-inline-block');
			$('.video-right-container').addClass('d-inline-block');
		}
	}

	// Get Video From File Upload
	$("#btn-select-video").fileinput({
		theme: "fa",
		uploadUrl: "server/FileUploadHandler.php",
		allowedFileExtensions: ["mp4", "ogg"],
		uploadAsync: false,
		//hideThumbnailContent: true // hide image, pdf, text or other content in the thumbnail preview
	});
	$('#btn-select-video').on('filebatchuploadsuccess', function(event, data, previewId, index) {
		console.log('File batch uploaded triggered');
		console.log(data);
		var fileUrls = data.response.fileUrls;
		for (var fileName in fileUrls) {
			console.log("FileName:" + fileName + ", FileUrl:" + fileUrls[fileName]);
			$('#currentVideoUrl').val(fileUrls[fileName]);
		}

		var videoOriginalUrl = $('#currentVideoUrl').val();
		player_left_video.src({type: "video/mp4", src: videoOriginalUrl});
		player_right_video.src({type: "video/mp4", src: videoOriginalUrl});
	});

	// Get Video From Url
	$('#getVideoFromUrl').on('click', function() {
		var videoOriginalUrl = $('#currentVideoUrl').val();
		player_left_video.src({type: "video/mp4", src: videoOriginalUrl});
		player_right_video.src({type: "video/mp4", src: videoOriginalUrl});
	});

	$('#start-video-process').on('click', function(){
		var originalUrl = $('#currentVideoUrl').val();
		player_left_video.src({type: "video/mp4", src: originalUrl});

		var urlPrefix = originalUrl.substring(0, originalUrl.lastIndexOf('.'));
		var urlSuffix = originalUrl.substring(originalUrl.lastIndexOf('.'), originalUrl.length);
		var videoProcessedUrl =  urlPrefix + "_" + $('#select-video-process-type').html() + urlSuffix;
		player_right_video.src({type: "video/mp4", src: videoProcessedUrl});
	});

	$('#show-original-only').on('click', function(){
		showVideoPanel('original');
	});
	$('#show-proccessed-only').on('click', function(){
		showVideoPanel('proccessed');
	});
	$('#show-both').on('click', function(){
		showVideoPanel('both');
	});

});

</script>