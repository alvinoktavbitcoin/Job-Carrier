<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller 
{
	
	public function index()
	{
		
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_USERAGENT, 'Glassdoor API PHP wrapper');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

		curl_setopt($ch, CURLOPT_URL, 'http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=employers&l=Aceh&ps=20&pn=1');
		
		/*curl_setopt($ch, CURLOPT_URL, 'http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=jobs-stats&returnStates=true&admLevelRequested=1&country=Indonesia');*/
		
		
		http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=jobs-stats&returnStates=true&admLevelRequested=1&country=Indonesia
		
		http://api.glassdoor.com/api/api.htm?t.p=129717&t.k=bC1SAAE32ga&userip=0.0.0.0&useragent=&format=json&v=1&action=employers&l=Aceh&ps=20&pn=1

		$result = curl_exec($ch);
		curl_close($ch);
		$result = json_decode($result,true);
		

		foreach($result['response']['employers'] as $value)
		{
			//echo $value['id'];
			//echo $value['name'];
			//echo'<br>';
			
			echo $value['id'];echo'<br>';
					echo $value['name'];echo'<br>';
					echo $value['overallRating'];echo'<br>';
					echo $value['cultureAndValuesRating'];echo'<br>';
					echo $value['seniorLeadershipRating'];echo'<br>';
					echo $value['compensationAndBenefitsRating'];echo'<br>';
					echo $value['careerOpportunitiesRating'];echo'<br>';
					echo $value['workLifeBalanceRating'];echo'<br>';
					echo $value['recommendToFriendRating'];echo'<br>';
					echo $value['featuredReview']['jobTitle'];echo'<br>';
					echo $value['squareLogo'];echo'<br>';
					echo $value['ceo']['pctApprove'];echo'<br>';
					echo'<br>';
		}
		//die;
	}
			
}
?>






