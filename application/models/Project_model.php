<?php defined("BASEPATH") or exit("no direct script allowed");
class Project_model extends CI_Model{
	function __construct(){
	parent::__construct();	$this->load->library('session');
	$this->load->library(array('encryption','form_validation','pagination','image_lib','user_agent','cart','encrypt'));
	    $this->load->helper(array('url','form','file'));
		$this->load->database();
		
	}
	
	/*======
	defined all database table and prifix in mamber varible
    which is used in overall project	
	=======*/
	
	var $prifix = "hatbazar_";

	var $color           = "color";
	var $plan            = "plan";
	var $size            = "size";
	var $atribute        = "atribute";
	var $banner          = "banner";
	var $category        = "category";
	var $brand        	 = "brand";
	var $product       	 = "product";
	var $productimage  	 = "productimage";
	var $controllers     = "controllers";
	var $profile   	     = "profile";
	var $useraddress	 = "useraddress";
	var $user            = "user";
	var $userprivilege   = "userprivilege";
	var $booking         = "booking";
	var $bookingdetail   = "bookingdetail";
	
    
   

	/*=========
	function password return encrypted 
	password 
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function password($password)
	{
		return md5(sha1($password));
		
	}
	
	
	
	/*=========
	function encrypt for encrypt plane text 
    to cipher text decrypt cipher text to planetext 
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function encrypt($plentext){
		
		$this->encryption->initialize(
        array(  
		        'driver' => 'openssl',
                'cipher' => 'aes-16',
                'mode' => 'cbc',
                'key' => 'awewfgsgfcx',
				'hmac_digest' => 'sha256',
        )
		);
		
		return  $this->encryption->encrypt($plentext);
	}
	

	public function decrypt($ciphertext){
		
		$this->encryption->initialize(
        array(  
		        'driver' => 'openssl',
                'cipher' => 'aes-16',
                'mode' => 'cbc',
                'key' => 'awewfgsgfcx',
				'hmac_digest' => 'sha256',
        )
		);
		
		return  $this->encryption->decrypt($ciphertext);
	}

    /*=========
	function login parameter
    username hash_password
    return type user detail 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function login($username,$hash){
		
	    $this->db->where($this->user.'_username',$username);
		$this->db->where($this->user.'_password',$hash);
		$this->db->where($this->user.'_status',"1");
		$data = $this->db->get($this->prifix . $this->user)->row_array();
        return $data;
	}
	
	
	
			/*=========
	function User_detail parameter
    User id 
    return type user detail 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function User_detail($id="",$email=""){
		if($id !=""){
			$this->db->where($this->user.'_id',$id);
		}
		if($email !=""){
			$this->db->where($this->user.'_email',$email);
		}
		$this->db->where($this->user.'_status',"1");
		$data = $this->db->get($this->prifix . $this->user)->row_array();
		//echo $this->db->last_query(); die;
        return $data;
	}
	
	
	/*=========
	function category 
	table category
	return type array 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function category(){
		
	    $this->db->select($this->pro->category."_title,".$this->pro->category."_url");
		$this->db->from($this->pro->prifix.$this->pro->category);
		$this->db->where($this->pro->category.'_status','1');
		$this->db->order_by($this->pro->category.'_id','asc');
		$rs = $rs = $this->db->get();
		return $rs->result_array();
	}
	
		    /*=========
	function upload for 
	singe image file upload 
	parameter filename
    return type upload detail 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function upload($file_name="",$width=""){
		 $upload_data['success'] ="";
	     $upload_data['error'] = "";
		 $this->load->library('upload');

		 $config['upload_path']          = './upload/';
		 $config['allowed_types']        = 'gif|jpg|png|jpeg';
		 $config['max_size']             =  2048;
		 //$config['max_width']            = 1024;
		 //$config['max_height']           = 768;
		 $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload($file_name)) {
		     $upload_data['error'][] = $this->upload->display_errors();
		}
		else {  
			if(!empty($width)){
		        $source        = $this->upload->data('full_path');
		        $size          = getimagesize($source);
                $resize_height =($size[1]*$width)/$size[0];
			    $this->image_lib->clear();
				$config['image_library'] = 'gd2';
				$config['source_image'] = $source;
				$config['new_image'] = './upload/';
				$config['quality'] = '100%';
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = true;
				$config['thumb_marker'] = '';
				$config['width'] = $width;
				$config['height'] = $resize_height;
				$this->image_lib->initialize($config);
		 
				if ($this->image_lib->resize())
				{
					$upload_data['success'][] = $this->upload->data();
				}
				else{
				    return $upload_data['error'][]  = "Image not uplodade";
				}
			}else{
				
				if ($this->image_lib->resize())
				{
					$upload_data['success'][] = $this->upload->data();
				}
				else{
				    return $upload_data['error'][]  = "Image not uplodade";
				}
				
			}
		}

		return $upload_data;
		
	}
	
	
	    /*=========
	function upload for 
    multiple image file upload 
	parameter filename
    return type upload detail 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function upload_multiple($file_name=""){
		 $upload_data['success'] =array();
	     $upload_data['error'] = array();
		 $this->load->library('upload');
         $number_of_files_uploaded = count($_FILES[$file_name]['name']);
		
		for ($i = 0; $i < $number_of_files_uploaded; $i++) {
			if($_FILES[$file_name]['name'][$i] !='')
			{
				 $_FILES['userfile']['name']     = $_FILES[$file_name]['name'][$i];
				 $_FILES['userfile']['type']     = $_FILES[$file_name]['type'][$i];
				 $_FILES['userfile']['tmp_name'] = $_FILES[$file_name]['tmp_name'][$i];
				 $_FILES['userfile']['error']    = $_FILES[$file_name]['error'][$i];
				 $_FILES['userfile']['size']     = $_FILES[$file_name]['size'][$i];

                 $config['upload_path']          = './upload/';
                 $config['allowed_types']        = 'gif|jpg|png|jpeg';
                 $config['max_size']             = 2048;
                 //$config['max_width']            = 1024;
                 //$config['max_height']           = 768;

                 $this->upload->initialize($config);
                if ( ! $this->upload->do_upload()) {
                 $upload_data['error'][] = array('error' => $this->upload->display_errors());
	            }
                else {
                $upload_data['success'][] = $this->upload->data();
                 // Continue processing the uploaded data
	  
		        }
			}
		}
		
		return $upload_data;
		
	}
	
		    /*=========
	function docupload for 
	singe document and image file upload 
	parameter filename
    return type upload detail 
    in arry form 	
	date 03/08/2017
	author pravin kumar
	==========*/
	
	public function docupload($file_name=""){
		 $upload_data['success'] ="";
	     $upload_data['error'] = "";
		 $this->load->library('upload');

		 $config['upload_path']          = './upload/';
		 $config['allowed_types']        = 'gif|jpg|png|jpeg|pdf|doc|docx|zip|rar';
		 $config['max_size']             = 2048;
		 //$config['max_width']            = 1024;
		 //$config['max_height']           = 768;
		 $this->upload->initialize($config);
		
		if ( ! $this->upload->do_upload($file_name)) {
		     $upload_data['error'][] = $this->upload->display_errors();
		}
		else {
		     $upload_data['success'][] = $this->upload->data();
		     // Continue processing the uploaded data

		}

		return $upload_data;
		
	}
	
	
	   /*=========
	function pagination for pagination
	parameter url, allrecord, data par page,
	link,segment,
    return offset,limit,and pagination
	full control nav
	date 03/09/2017
	author pravin kumar
	==========*/
	
	public function pagination($baseurl,$allrecord,$dpp,$link,$segment){
	 
	    $paging=array();
		$paging['base_url'] =$baseurl;
		$paging['total_rows'] = $allrecord;
		$paging['per_page'] = $dpp;
		$paging['uri_segment']=$segment;
		$paging['num_links'] = $link;
		$paging['first_link'] = '<i class="fa fa-caret-left" aria-hidden="true"></i><i class="fa fa-caret-left" aria-hidden="true"></i>';
		$paging['first_tag_open'] = '<li class="shop-button style2 btn-small prev-page" >';
		$paging['first_tag_close'] = '</li>';
		$paging['num_tag_open'] = '<li class="current-page" >';
		$paging['num_tag_close'] = '</li>';
		$paging['prev_link'] = '<i class="fa fa-caret-left" aria-hidden="true"></i>';
		$paging['prev_tag_open'] = '<li class="shop-button style2 btn-small prev-page" >';
		$paging['prev_tag_close'] = '</li>';
		$paging['next_link'] = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
		$paging['next_tag_open'] = '<li class="shop-button style2 btn-small next-page" >';
		$paging['next_tag_close'] = '</li>';
		$paging['last_link'] = '<i class="fa fa-caret-right" aria-hidden="true"></i><i class="fa fa-caret-right" aria-hidden="true"></i>';
		$paging['last_tag_open'] = '<li class="shop-button style2 btn-small next-page" >';
		$paging['last_tag_close'] = '</li>';
		$paging['cur_tag_open'] = '<li ><a href="javascript:void(0);" class="current-page inline-block" >';
		$paging['cur_tag_close'] = '</a></li>';
		
		$this->pagination->initialize($paging);		
		$data['limit'] = $paging['per_page'];
		$data['number_page'] = $paging['per_page']; 
        $data['offset'] = ($this->uri->segment($segment)) ? $this->uri->segment($segment):'0';	
        $data['nav'] = $this->pagination->create_links();	
        
		return $data;
    }
     
	 
	 

	 
	 
	 
	  /*=========
	function privilege
	parameter controllers id,user id
    return privilege status 
	data type array
	date 03/09/2017
	author pravin kumar
	==========*/
    public function privilege($controller,$user_id){
		
		$this->db->where($this->controllers.'_name',$controller);
		$cdata = $this->db->get($this->prifix.$this->controllers)->row_array();
		$controller_id  = $cdata[$this->controllers.'_id'];
		
		$this->db->select('*');
		$this->db->from($this->prifix.$this->userprivilege);
		$this->db->where($this->userprivilege.'_user_id',$user_id);
		$this->db->where($this->userprivilege.'_controllers_id',$controller_id);
		$rs = $this->db->get();
		return $rs->row_array();
	}
	
	
	
	
	  /*=========
	function controllers
	parameter none
	data type array
	date 03/09/2017
	author pravin kumar
	==========*/
    public function controllers(){
		$this->db->select($this->controllers."_id");
		$this->db->from($this->prifix.$this->controllers);
		$rs    = $this->db->get();
		$cdata = $rs->result_array();
		return $cdata;
	}
	
	 /*=========
	function privilege
	parameter user id
    return privilege Controllers 
	of particular user
	data type array
	date 03/09/2017
	author pravin kumar
	==========*/
	public function privilege_list($user_id){
		
		$this->db->select('a.*,b.*');
		$this->db->from($this->prifix.$this->controllers." as a");
		$this->db->join($this->prifix.$this->userprivilege." as b","ON a.".$this->controllers."_id = b.".$this->userprivilege."_controllers_id","inner");
		$this->db->where("b.".$this->userprivilege.'_user_id',$user_id);
		$rs = $this->db->get();
		return $rs->result_array();
	}

	

    public function smtp_mail($to,$subject,$msg){
		$config['protocol']  = 'smtp';
		$config['smtp_host'] = 'smtpout.asia.secureserver.net'; //change this
		$config['smtp_port'] = '80';
		$config['smtp_user'] = 'Info@11needs.com'; //change this
		$config['smtp_pass'] = '11needs@123'; //change this
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['wordwrap']  = TRUE;
		$config['newline']   = "\r\n"; //use double quotes to comply with RFC 822 standard	
		$this->load->library('email', $config);
		$this->email->from('info@11needs.com', '11needs.com');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($msg);
		if ($this->email->send())
		{
			$mdata['msg'] = "Mail Sent!";
		    $mdata['status'] = true;
			return $mdata;
		}
		else
		{
			$mdata['msg']= "There is error in sending mail!".$this->email->print_debugger();
		    $mdata['status'] = false;
			return $mdata;
		}
	}
	
	
	  public function mail($from,$from_name="",$to,$subject,$msg){
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['wordwrap']  = TRUE;
		$config['newline']   = "\r\n"; //use double quotes to comply with RFC 822 standard	
		$this->load->library('email', $config);
		$this->email->from($from, $from_name);
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($msg);
		if ($this->email->send()) 
		{
			$m_data['msg'] = "Mail Sent!";
		    $m_data['status'] = true;
			return $m_data;
		}
		else
		{
			$m_data['msg']= "There is error in sending mail!".$this->email->print_debugger();
		    $m_data['status'] = false;
			return $m_data;
		}
	}
	
	
	
	 function genpwd($length = 7){
      $password = "";
      $possible = "0123456789bcdfghjkmnpqrstvwxyz"; //no vowels
      $i = 0; 
    
        while ($i < $length){ 
         $char = substr($possible, mt_rand(0, strlen($possible)-1), 1);    
           if (!strstr($password, $char)){ 
            $password .= $char;
            $i++;
            }
        }
      return $password;

    }
     
    function getLatandLng($zip){
		$url = "http://maps.googleapis.com/maps/api/geocode/json?&address=".urlencode($zip)."&amp;sensor=false";
		$options = array(
			CURLOPT_URL=>$url,
			CURLOPT_RETURNTRANSFER => true,   // return web page
			CURLOPT_HEADER         => false,  // don't return headers
			//CURLOPT_FOLLOWLOCATION => true,   // follow redirects
			//CURLOPT_MAXREDIRS      => 10,     // stop after 10 redirects
		   // CURLOPT_ENCODING       => "",     // handle compressed
			//CURLOPT_USERAGENT      => "test", // name of client
			CURLOPT_AUTOREFERER    => true,   // set referrer on redirect
			CURLOPT_CONNECTTIMEOUT => 120,    // time-out on connect
			CURLOPT_TIMEOUT        => 120,    // time-out on response
		); 

    $ch = curl_init();
    curl_setopt_array($ch, $options);
	$result_string = curl_exec($ch);
    curl_close($ch); 
		//$result_string = file_get_contents($url);
		$result = json_decode($result_string, true);
		$result1[]=$result['results'][0];
		$result2[]=$result1[0]['geometry'];
		$result3[]=$result2[0]['location'];
		return $result3[0];
    }

	public function setting(){
		
		return $this->db->get($this->prifix.$this->profile)->row_array();
	}
	
}