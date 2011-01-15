<?php

/*@type: CLASS */
/*@author: JOSE MARIZ MELO */
/*@company: XCHEMA */
/*@release: 18/07/2010 */
/*@updated: 18/07/2010 */
/*@description: Initialize the custom variable values for the website/project */
/*@example: 
**$database = new Configure('title for the website/project', 'lang (default en-US)'); */


//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");


class Xml extends Debug{

	function __toString(){
		
		$this->debugMESSAGE('S', 'XML class created sucessfuly!');
		return '';
		
	}
	
	
	function xmlPARSERSS($xml)
	{
	   	echo "<b>".$xml->channel->title."</b><br>";
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
	
	
	function xmlPARSEATOM($xml)
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
	
	
	
	
	//GET INFORMATION ABOUT A SPECIFIC NODE ON THE RSS FILE
	function xmlRSS_SEPARE($string, $tag)
	{
	    $tmpval = array();
	    $preg = "|<$tag>(.*?)</$tag>|s";
	    preg_match_all($preg, $string, $tags);
	    foreach ($tags[1] as $tmpcont){
	        $tmpval[] = $tmpcont;
	    }
	    return $tmpval;
	}
	
	
	//READ A RSS FILE AND RETURN ITS INFORMATION
	function xmlRSS($feed)
	{
			
			ini_set('allow_url_fopen', true);
			$fp = fopen($feed, 'r');
			$xml = '';
			while (!feof($fp)) {
			    $xml .= fread($fp, 128);
			}
			fclose($fp);
			
			$items = $this->xmlRSS_SEPARE($xml, 'item');	//get the information on the node item
			
			return $items;	
				
	}
	

}

?>