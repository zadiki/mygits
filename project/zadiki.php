<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> <meta http-equiv="content-language" content="ar" />


 <meta http-equiv="content-language" content="ar" />


<title>YTÜ</title></head>

<body>

<?php



include "simple_html_dom.php";


 $html = file_get_html("https://www.youtube.com/watch?v=Cf8amekBiIc&list=PL6B08BAA57B5C7810&index=170/");
 
file_put_contents('image/--', $html);

// Find all images 

/*
foreach($html->find('meta') as $element) 
echo $element->name." ".$element->content.'<br>';

echo file_get_html($element)->plaintext . '<br>';
foreach($html->find('img') as $element) 
     // echo "<img src='http://www.aljazeera.net".$element->src . "'></img><br>";



foreach($html->find('a') as $element) 
      // echo $element->href . '<br>';
	//echo file_get_html("https://www.google.com.tr/search?q=ytu")->plaintext."<br><br><br>";   
echo file_get_html('http://www.nation.co.ke/')->plaintext;    
	  

*/
 
	   ?></body></html>