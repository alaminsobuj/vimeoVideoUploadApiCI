<?php
// namespace Phppot;
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<title>Uploading Videos to Vimeo</title>
<head>
<link href="./assets/css/phppot-style.css" type="text/css"
	rel="stylesheet" />
<!-- <script src="./vendor/jquery/jquery-3.2.1.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="./assets/js/video.js"></script>
<style>
.loader-icon {
	display: none;
}
</style>
</head>
<body>
	<div class="phppot-container">
		<h1>Uploading Videos to Vimeo <input type="hidden" value="<?php echo base_url('videoUpload')?>" id="base_url"></h1>
		<form id="frm-video-upload" class="phppot-form" method="post">
			<div class="phppot-row">
				<input type="file" name="video_file" />
			</div>
			<div class="phppot-row">
				<button id="btnUpload" type="submit">Upload</button>
				<img src="./img/loader.gif" class="loader-icon" id="loader-icon">
			</div>
		</form>
		<div id="phppot-message"></div>
	</div>
</body>
</html>