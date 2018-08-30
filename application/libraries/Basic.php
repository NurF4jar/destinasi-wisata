<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class basic {
    public function upload_image($image_name, $width = 0, $height = 0) {
      $file_name = '';
        $CI = get_instance();
        //UPLOAD IMAGES
        $CI->load->library('upload');
        if($_FILES[$image_name]['error'] == 0) {
            $config['upload_path'] 			= './assets/images/';
            $config['allowed_types'] 		= 'png|jpg|jpeg|gif|bmp';
            $config['overwrite'] 			  = false;
            $config['remove_spaces'] 		= true;
            $config['encrypt_name'] 		= true;
            $config['max_size']				  = '10000';// in KB

            $CI->upload->initialize($config);
            if (!$CI->upload->do_upload($image_name)) {
                echo $CI->upload->display_errors();

            } else {

                //Image Resizing
                $cover['source_image'] 	    = $CI->upload->upload_path.$CI->upload->file_name;
                $cover['maintain_ratio'] 	  = FALSE;

                if ($width != 0) { $cover['width'] = $width; }
                if ($height != 0) { $cover['height'] = $height; }

                $CI->load->library('image_lib', $cover);
                if (!$CI->image_lib->resize()) {
                    echo $CI->upload->display_errors();
                } else {
                    $file_name    = $CI->upload->file_name;
                }
            }
        }
        return $file_name;
    }

}
