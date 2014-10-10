<?php
/*
* Author : Savaş Can Altun
* Web : http://savascanaltun.com.tr
* Mail : savascanaltun@gmail.com
* GİT : http://github.com/saltun
* Date : 09.10.2014
* Update : 09.10.2014
*/
class easyRegex{
	public $source=NULL;



	function __construct($par=NULL){

		if (isset($par)) {
			$this->source=$this->get_source($par);
		}
	
		
	}

	
	public function get($par,$par2=NULL,$par3=NULL){

		    $regex = explode('::s::', $par);

		    if (!strpos($par,"::s::")){
		    	die('Hata : ::s:: kullanilmadi ');
		    }

		    if ($par2==true) {
		    	$durum=1;
		    }else{
		    	$durum=0;
		    }

		    if ($par3=="number") {
		    	preg_match_all('#'.$regex[0].'([0-9]+)'.$regex[1].'#si',$this->source,$cikti);
		    	
		    }elseif($par3=="string") {
		    		preg_match_all('#'.$regex[0].'(.+)'.$regex[1].'#si',$this->source,$cikti);
		    }else{
		    	preg_match_all('#'.$regex[0].'(.*?)'.$regex[1].'#si',$this->source,$cikti);
		    }

		 
		

		return $cikti[$durum];
	}
	
	protected function get_source($url){
			$user = getenv('USER_AGENT');
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $url);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_USERAGENT, $user);
			curl_setopt($curl, CURLOPT_TIMEOUT, 10);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
			curl_setopt($curl, CURLOPT_REFERER, 'http://google.com');
			curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);

			$data = curl_exec($curl);
			curl_close($curl);

			if($data) return $data; else return false;
	}

	public function encode($par){
		return mb_convert_encoding($par, 'HTML-ENTITIES', 'UTF-8');
	}
 
 

}
?>