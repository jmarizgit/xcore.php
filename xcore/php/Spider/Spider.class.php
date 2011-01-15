<?php

//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");


class Spider extends Debug{

	
	function __toString(){
	
		$this->debugMESSAGE('S', 'Spider class initialized');
		return '';
		
	}	
	
	
	//LOAD THE REQUIRED SPIDER
	function spiderLOAD($domain)
	{	
		if($domain){
			
			$ch = curl_init($domain);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$data = curl_exec($ch);
			curl_close($ch);
		
			return  $data;
		
		}else{
			
			return 0;	
			
		}
		
	}
	
	
	function spiderPARSERSS($xml)
	{
	   	//echo "<img src='{$xml->channel->image->url}' /></b><br>";
	   	echo '<b>'.$xml->channel->title.'</b><br />';
	    $cnt = count($xml->channel->item);
	    for($i=0; $i<$cnt; $i++)
	    {
		$url 	= $xml->channel->item[$i]->link;
		$title 	= $xml->channel->item[$i]->title;
		$desc = $xml->channel->item[$i]->description;
		
		preg_match_all('/<img[^>]+>/i',$desc, $result); 
		
		echo "<pre>".$result[0][0]."</pre><br>";
	 
		echo '<a href="'.$url.'">'.utf8_decode($title).'</a><br />'.utf8_decode(strip_tags($desc)).'<br /><br />';
	    }
	}
	
	
	function spiderPARSEATOM($xml)
	{
	    echo "<strong>".$xml->author->name."</strong>";
	    $cnt = count($xml->entry);
	    for($i=0; $i<$cnt; $i++)
	    {
		$urlAtt = $xml->entry->link[$i]->attributes();
		$url	= $urlAtt['href'];
		$title 	= $xml->entry->title;
		$desc	= strip_tags($xml->entry->content);
	 
		echo '<a href="'.$url.'">'.$title.'</a>'.$desc.'';
	    }
	}
	
}

?>