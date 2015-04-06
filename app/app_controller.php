<?php 
class AppController extends Controller {

	//var $components = array('Auth','Cookie','RequestHandler');
 	var $helpers = array('Form','Html','Time','Javascript','Ajax','FusionCharts.FusionCharts');
 	
	var $components = array('FusionCharts.FusionCharts');

 	function uploadFiles($folder, $formdata, $itemId = null) {  
	    // setup dir names absolute and relative  
	    $folder_url = WWW_ROOT.$folder;  
	    $rel_url = $folder;  

	    // create the folder if it does not exist  
	    if(!is_dir($folder_url)) {  
	        mkdir($folder_url);  
	    }  

	    // if itemId is set create an item folder  
	    if($itemId) {  
	        // set new absolute folder  
	        $folder_url = WWW_ROOT.$folder.'/'.$itemId;   
	        // set new relative folder  
	        $rel_url = $folder.'/'.$itemId;
	        // create directory  
	        if(!is_dir($folder_url)) {  
	            mkdir($folder_url);  
	        }  
	    }  

	    // list of permitted file types, this is only images but documents can be added  
	    $permitted = array('image/gif','image/jpeg','image/pjpeg','image/png','application/vnd.ms-excel','application/msword','
	    application/doc', 'appl/text', 'application/vnd.msword', 'application/vnd.ms-word', 'application/winword', 'application/word', 'application/x-msw6', 'application/x-msword','application/pdf','application/x-shockwave-flash');  

	    // loop through and deal with the files  
	    foreach($formdata as $file) {  
	        // replace spaces with underscores  
	        $filename = str_replace(' ', '_', $file['name']);  
	        // assume filetype is false  
	        $typeOK = false;  
	        // check filetype is ok  
	        foreach($permitted as $type) {  
	            if($type == $file['type']) {  
	                $typeOK = true;  
	                break;  
	            }  
	        }  

	        // if file type ok upload the file  
	        if($typeOK) {  
	            // switch based on error code  
	            switch($file['error']) {  
	                case 0:  
	                    // check filename already exists  
	                    if(!file_exists($folder_url.'/'.$filename)) {  
	                        // create full filename  
	                        $full_url = $folder_url.'/'.$filename;  
	                        $url = $rel_url.'/'.$filename;  
	                        // upload the file  
	                        $success = move_uploaded_file($file['tmp_name'], $url);  
	                    } else {  
	                        // create unique filename and upload file  
	                        ini_set('date.timezone', 'Europe/London');  
	                        $now = date('Y-m-d-His');  
	                        $full_url = $folder_url.'/'.$now.$filename;  
	                        $url = $rel_url.'/'.$now.$filename;  
	                        $success = move_uploaded_file($file['tmp_name'], $url);  
	                    }  
	                    // if upload was successful  
	                    if($success) {  
	                        // save the url of the file  
	                        $result['urls'][] = $url;  
	                    } else {  
	                        $result['errors'][] = "Error uploaded $filename. Please try again.";  
	                    }  
	                    break;  
	                case 3:  
	                    // an error occured  
	                    $result['errors'][] = "Error uploading $filename. Please try again.";  
	                    break;  
	                default:  
	                    // an error occured  
	                    $result['errors'][] = "System error uploading $filename. Contact webmaster.";  
	                    break;  
	            }  
	        } elseif($file['error'] == 4) {  
	            // no file was selected for upload  
	            $result['nofiles'][] = "No file Selected";  
	        } else {  
	            // unacceptable file type  
	            $result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";  
	        }  
	    }  
	return $result;  
	}
	
	function upload_files($folder, $formdata, $itemId = null) {
		// setup dir names absolute and relative
		$folder_url = WWW_ROOT.$folder;
		$rel_url = $folder;
		
		// create the folder if it does not exist
		if(!is_dir($folder_url)) {
			mkdir($folder_url);
		}
			
		// if itemId is set create an item folder
		if($itemId) {
			// set new absolute folder
			$folder_url = WWW_ROOT.$folder.'/'.$itemId; 
			// set new relative folder
			$rel_url = $folder.'/'.$itemId;
			// create directory
			if(!is_dir($folder_url)) {
				mkdir($folder_url);
			}
		}
		
		// list of permitted file types, this is only images but documents can be added
		$permitted = array('image/gif','image/jpeg','image/pjpeg','image/png','image/jpg','video/x-flv','application/zip','application/x-compressed','application/x-zip-compressed','multipart/x-zip','application/msword','application/msword','application/vnd.openxmlformats-officedocument.wordprocessingml.document','application/vnd.openxmlformats-officedocument.wordprocessingml.template','application/vnd.ms-word.document.macroEnabled.12','application/vnd.ms-word.template.macroEnabled.12','application/vnd.ms-excel','application/vnd.ms-excel','application/vnd.ms-excel','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet','application/vnd.openxmlformats-officedocument.spreadsheetml.template','application/vnd.ms-excel.sheet.macroEnabled.12','application/vnd.ms-excel.template.macroEnabled.12','application/vnd.ms-excel.addin.macroEnabled.12','application/vnd.ms-excel.sheet.binary.macroEnabled.12','application/vnd.ms-powerpoint','application/vnd.ms-powerpoint','application/vnd.ms-powerpoint','application/vnd.ms-powerpoint','application/vnd.openxmlformats-officedocument.presentationml.presentation','application/vnd.openxmlformats-officedocument.presentationml.template','application/vnd.openxmlformats-officedocument.presentationml.slideshow','application/vnd.ms-powerpoint.addin.macroEnabled.12','application/vnd.ms-powerpoint.presentation.macroEnabled.12','application/vnd.ms-powerpoint.template.macroEnabled.12','application/vnd.ms-powerpoint.slideshow.macroEnabled.12');
		
		// loop through and deal with the files
		foreach($formdata as $file) {
			// replace spaces with underscores
			$filename = str_replace(' ', '_', $file['name']);
			// assume filetype is false
			$typeOK = false;
			// check filetype is ok
			foreach($permitted as $type) {
				if($type == $file['type']) {
					$typeOK = true;
					break;
				}
			}
			
			// if file type ok upload the file
			if($typeOK) {
				// switch based on error code
				switch($file['error']) {
					case 0:
						// check filename already exists
						if(!file_exists($folder_url.'/'.$filename)) {
							// create full filename
							$full_url = $folder_url.'/'.$filename;
							$url = $rel_url.'/'.$filename;
							// upload the file
							$success = move_uploaded_file($file['tmp_name'], $url);
						} else {
							// create unique filename and upload file
							ini_set('date.timezone', 'Europe/London');
							$now = date('Y-m-d-His');
							$full_url = $folder_url.'/'.$now.$filename;
							$url = $rel_url.'/'.$now.$filename;
							$success = move_uploaded_file($file['tmp_name'], $url);
						}
						// if upload was successful
						if($success) {
							// save the url of the file
							$result['urls'][] = $url;
						} else {
							$result['errors'][] = "Error uploaded $filename. Please try again.";
						}
						break;
					case 3:
						// an error occured
						$result['errors'][] = "Error uploading $filename. Please try again.";
						break;
					default:
						// an error occured
						$result['errors'][] = "System error uploading $filename. Contact webmaster.";
						break;
				}
			} elseif($file['error'] == 4) {
				// no file was selected for upload
				$result['nofiles'][] = "No file Selected";
			} else {
				// unacceptable file type
				$result['errors'][] = "$filename cannot be uploaded. Acceptable file types: gif, jpg, png.";
			}
		}
	return $result;
	}
	/**
	* Rebuild the Acl based on the current controllers in the application
	*
	* @return void
	*/



	function _cpyrec($src, $dest) {
if (is_dir($src)) $dir = opendir($src);
while ($file = readdir($dir)) {
if ($file != '.' && $file != '..') {
if (!is_dir($src.'/'.$file)) copy($src.'/'.$file, $dest.'/'.$file);
else {
@mkdir($dest.'/'.$file, 0750);
$this->_cpyrec($src.'/'.$file, $dest.'/'.$file);
} //else
} //if
} //while
closedir($dir);
} //function



function _delete_recursive($path) {
    $path = rtrim($path, '/').'/';
    $handle = opendir($path);
    while(false !== ($file = readdir($handle))) {
        if($file != '.' and $file != '..' ) {
            $fullpath = $path.$file;
            if(is_dir($fullpath)) $this->_delete_recursive($fullpath); else unlink($fullpath);
        }
    }
    closedir($handle);
    rmdir($path);
}


	function force_download( $filename = '', $data = '' )
	{
	    if( $filename == '' || $data == '' )
	    {
	        return false;
	    }
	    
	    if( !file_exists( $data ) )
	    {
	        return false;
	    }

	    // Try to determine if the filename includes a file extension.
	    // We need it in order to set the MIME type
	    if( false === strpos( $filename, '.' ) )
	    {
	        return false;
	    }

	    // Grab the file extension
	    $extension = strtolower( pathinfo( basename( $filename ), PATHINFO_EXTENSION ) );

	    // our list of mime types
	    $mime_types = array(

	        'txt' => 'text/plain',
	        'htm' => 'text/html',
	        'html' => 'text/html',
	        'php' => 'text/html',
	        'css' => 'text/css',
	        'js' => 'application/javascript',
	        'json' => 'application/json',
	        'xml' => 'application/xml',
	        'swf' => 'application/x-shockwave-flash',
	        'flv' => 'video/x-flv',

	        // images
	        'png' => 'image/png',
	        'jpe' => 'image/jpeg',
	        'jpeg' => 'image/jpeg',
	        'jpg' => 'image/jpeg',
	        'gif' => 'image/gif',
	        'bmp' => 'image/bmp',
	        'ico' => 'image/vnd.microsoft.icon',
	        'tiff' => 'image/tiff',
	        'tif' => 'image/tiff',
	        'svg' => 'image/svg+xml',
	        'svgz' => 'image/svg+xml',

	        // archives
	        'zip' => 'application/zip',
	        'rar' => 'application/x-rar-compressed',
	        'exe' => 'application/x-msdownload',
	        'msi' => 'application/x-msdownload',
	        'cab' => 'application/vnd.ms-cab-compressed',

	        // audio/video
	        'mp3' => 'audio/mpeg',
	        'qt' => 'video/quicktime',
	        'mov' => 'video/quicktime',

	        // adobe
	        'pdf' => 'application/pdf',
	        'psd' => 'image/vnd.adobe.photoshop',
	        'ai' => 'application/postscript',
	        'eps' => 'application/postscript',
	        'ps' => 'application/postscript',

	        // ms office
	        'doc' => 'application/msword',
	        'rtf' => 'application/rtf',
	        'xls' => 'application/vnd.ms-excel',
	        'ppt' => 'application/vnd.ms-powerpoint',

	        // open office
	        'odt' => 'application/vnd.oasis.opendocument.text',
	        'ods' => 'application/vnd.oasis.opendocument.spreadsheet',
	    );

	    // Set a default mime if we can't find it
	    if( !isset( $mime_types[$extension] ) )
	    {
	        $mime = 'application/octet-stream';
	    }
	    else
	    {
	        $mime = ( is_array( $mime_types[$extension] ) ) ? $mime_types[$extension][0] : $mime_types[$extension];
	    }
	        
	    // Generate the server headers
	    if( strstr( $_SERVER['HTTP_USER_AGENT'], "MSIE" ) )
	    {
	        header( 'Content-Type: "'.$mime.'"' );
	        header( 'Content-Disposition: attachment; filename="'.$filename.'"' );
	        header( 'Expires: 0' );
	        header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	        header( "Content-Transfer-Encoding: binary" );
	        header( 'Pragma: public' );
	        header( "Content-Length: ".filesize( $data ) );
	    }
	    else
	    {
	        header( "Pragma: public" );
	        header( "Expires: 0" );
	        header( "Cache-Control: must-revalidate, post-check=0, pre-check=0" );
	        header( "Cache-Control: private", false );
	        header( "Content-Type: ".$mime, true, 200 );
	        header( 'Content-Length: '.filesize( $data ) );
	        header( 'Content-Disposition: attachment; filename='.$filename);
	        header( "Content-Transfer-Encoding: binary" );
	    }
	    readfile( $data );
	    //return true;

	} //End force_download
		
}
?>