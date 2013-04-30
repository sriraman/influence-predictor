<?php


$alchemy_api_key = 0 // Enter your alchemy api key here... Get your key here (http://www.alchemyapi.com/api/register.html) 

if($alchemy_api_key==0)
{
	alert("Paste your alchemy api key in influence-predictor.php");
}
else
{

$query = $_GET['q']; // Query for search

$link = "http://api2.socialmention.com/search?q=".$query."&f=json&t=microblogs&lang=fr"; // Generating social mention API link with query

$pos = $neg = 0; // Initialize the positive and negative influence as zero..
$json_file=file_get_contents($link); 
$json = json_decode($json_file,true);

$items = $json['items'];

echo "<table border=1>";

foreach ($items as $index => $item) {
	$title = $item['title'];
	$description = $item['description'];
	$link = $item['link'];
	$timestamp = $item['timestamp'];
	$geo = $item['geo'];
	$source = $item['source'];
	$ref_id = $item['id'];


/* Resolve the short link to the destination link */
	$headers = get_headers($link);
	$headers = array_reverse($headers);
	foreach($headers as $header) {
		if (strpos($header, 'Location: ') === 0) {
			$url = str_replace('Location: ', '', $header);
			break;
		}
	}

/* Alchamey API to do sentimental analysis  */

$url = str_replace("http://","",$url);

$alchemyjson=file_get_contents("http://access.alchemyapi.com/calls/url/URLGetTextSentiment?url=$url&apikey=".$alchemy_api_key."&outputMode=json");

$sc = json_decode($alchemyjson,true);

$score = $sc['docSentiment']['score']; 

if($score < 0)
{
	$neg = $neg + $score; 
}
else 
{
	$pos = $pos + $score;
}
	//$stmt->execute(array($title,$description,$link,$source));
	echo "<tr> <td> $title </td> <td> $description </td> <td> $url </td> <td> $timestamp </td> <td> $geo </td> <td> $source </td> <td> $score </td> </tr>";


}

echo "</table>";

echo "Total positive score => $pos <br> Total Negative score => $neg";


}

?>