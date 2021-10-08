<?php
namespace Phppot;

// require_once __DIR__ . '/../libraries/VideoService.php';

if (! empty($_FILES["video_file"]["tmp_name"])) {
    $videoService = new VideoService($_FILES["video_file"]["tmp_name"]);
    $isValid = $videoService->validateVideo();
    if ($isValid) {
        $response = $videoService->uploadVideo();
    } else {
        $output = array(
            "type" => "error",
            "error_message" => "Invalid file type"
        );
        $response = json_encode($output);
    }
    print $response;
    exit();
}
