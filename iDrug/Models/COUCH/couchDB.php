<?php
  class CouchDB
 {
	private $m_diseases_URL = "http://couchdb.telecomnancy.univ-lorraine.fr/orphadatabase/_design/diseases/_view/GetDiseases";
	private $m_diseases_signs_URL = "http://couchdb.telecomnancy.univ-lorraine.fr/orphadatabase/_design/clinicalsigns/_view/GetDiseaseClinicalSigns";
	private $json1;
	private $json2;
	
	public function __construct()
	{
		this->retrieveData();
	}
	
	//getter
	public function get_diseases()
	{
		return $this->json1;
	}
	public function get_diseases()
	{
		return $this->json2;
	}
	public function retrieveData()
	{
		//  Initiate curl
		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$m_diseases_URL);
		// Execute
		$result=curl_exec($ch);

		// Set the url
		curl_setopt($ch, CURLOPT_URL,$m_diseases_signs_URL);
		// Execute
		$result2=curl_exec($ch);
		// Closing
		curl_close($ch);
		
		var_dump(json_decode($result, true));
		var_dump(json_decode($result2, true));
		$this->json1 = $result;
		$this->json2 = $result2;
	}
 }
?>