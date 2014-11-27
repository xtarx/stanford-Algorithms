<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		// $this->load->view('welcome_message');
		$lines = explode("\n", file_get_contents('problems/1/sample.txt'));
// print_r($lines);
		$out=$this->merge_sort($lines);
		
		print_r($out);

	}


	public function merge($firsthalf,$secondhalf)
	{
		//create index i,j for first/secon half
		$i=0;$j=0;
		$c=array();
		$firsthalf_length=count($firsthalf);
		$secondhalf_length=count($secondhalf);
		while ($i<$firsthalf_length && $j<$secondhalf_length  ) {

			if($firsthalf[$i]<$secondhalf[$j]){
				$c[]=$firsthalf[$i];
				$i++;
			}else{
				$c[]=$secondhalf[$j];
				$j++;

			}

		}
		$h1=array_slice($firsthalf, $i);
		$size=count($h1);
		for ($x=0; $x < $size; $x++) { 
			$c []=$h1[$x] ;
		}

		$h2=array_slice($secondhalf, $j);
		$size=count($h2);

		for ($x=0; $x < $size; $x++) { 
			$c []=$h2[$x] ;
		}


		


		return $c;	

	}


	public function append($input)
	{

	}

	public function merge_sort($input)
	{
		$input_length=count($input);
		if($input_length==1){
			return $input;
		}
		$mid=(int) ($input_length/2);	
		$firsthalf = $this->merge_sort(array_slice($input, 0, $mid));
		$secondhalf = $this->merge_sort(array_slice($input, $mid));

// print_r($firsthalf);
// print_r($secondhalf);

		return $this->merge($firsthalf,$secondhalf);

		
		

	}




}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */