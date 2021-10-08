<?php
// namespace Phppot;
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
     }
  
    private $vimeoClient;
    private $videoURL="";
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function Video_upload(){

	      $CLIENT_ID = 'Here need CLIENT_ID';

	      $CLIENT_SECRET = 'Here need CLIENT_SECRET';

	      $ACCESS_TOKEN = 'ACCESS_TOKEN';
          $ATTACHMENT_TYPE = array(
	        'MP4',
	        'MOV',
	        'MKV'
		  );
	    $this->vimeoClient = new \Vimeo\Vimeo($CLIENT_ID,$CLIENT_SECRET,$ACCESS_TOKEN);

		if (! empty($_FILES["video_file"]["tmp_name"])) {
           $valid="";
	       $file_extension = pathinfo($_FILES["video_file"]["name"], PATHINFO_EXTENSION);
	         if ((in_array(strtoupper($file_extension),$ATTACHMENT_TYPE))) {
	            $valid = true;
	        }

	        if($valid==TRUE){
	        $this->videoURL= $_FILES["video_file"]["tmp_name"];
	        $file_name = $this->videoURL;
	        try {
	            $uri = $this->vimeoClient->upload($file_name, array(
	                'name' => 'Video' . time()
	            ));

	            $video_data = $this->vimeoClient->request($uri);

	            if ($video_data['status'] == 200) {
	                $output = array(
	                    "type" => "success",
	                    "link" => $video_data['body']['link']
	                );
	              
	            }
	        } catch (VimeoUploadException $e) {
	            $error = 'Error uploading ' . $file_name . "\n";
	            $error .= 'Server reported: ' . $e->getMessage() . "\n";
	            $output = array(
	                "type" => "error",
	                "error_message" => $error
	            );
	        } catch (VimeoRequestException $e) {
	            $error = 'There was an error making the request.' . "\n";
	            $error .= 'Server reported: ' . $e->getMessage() . "\n";
	            $output = array(
	                "type" => "error",
	                "error_message" => $error
	            );
	        }
	         $response = json_encode($output);
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


  }

  


}
