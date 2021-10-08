$(document).ready(function() {
	$("#frm-video-upload").on("submit", function() {
		event.preventDefault();
	    var	base_url=$('#base_url').val();

		$("#phppot-message").removeClass("error");
		$("#phppot-message").removeClass("success");
		$("#phppot-message").text("");
		$("#btnUpload").hide();
		$("#loader-icon").show();
		$.ajax({
			url :base_url,
			type : "POST",
			dataType : 'json',
			data : new FormData(this),
			contentType : false,
			processData : false,
			success : function(data) {
			
				if (data.type == "error") {
					$("#btnUpload").show();
					$("#loader-icon").hide();
					$("#phppot-message").addClass("error");
					$("#phppot-message").text(data.error_message);
				} else if (data.type == "success") {
					$("#btnUpload").show();
					$("#loader-icon").hide();
					$("#phppot-message").addClass("success");
					$("#phppot-message").text("Video uploaded. " + data.link);
				}
			}
		});
	});
});