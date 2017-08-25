<?php
/**
* WEB SCRAPING AND PARSING TASK
* Created by Raffaele Longo Elia
* Date: 24/08/2017
* Time: 13:41
*/

$url=$_GET['url'];
include('simple_html_dom.php');

$plaintext = file_get_html($url)->plaintext; //Get all the texts in the web page
$plaintext = preg_replace('/[^a-zA-Z0-9.]/', ' ', $plaintext); //Replace all symbols with spaces

/*str_word_counts() returns an array containing all the words found inside the string and then
array_count_values() returns an array using the values of array as keys and their frequency in array as values*/
$words = array_count_values(str_word_count($plaintext, 1));

arsort($words); //Sort an array in reverse order and maintain index association

//LONGEST WORD
echo "<h2>Longest Word</h2>";
$longest_word_length = 0;
$longest_word = '';
foreach($words as $key => $value){
    if (strlen($key) > $longest_word_length) {
        $longest_word_length = strlen($key);
        $longest_word = $key;
    }
}
echo "The longest word is: ".$longest_word."<br>";

//MOST COMMON LETTER
echo "<h2>Most common letter</h2>";
$letter_string=preg_replace("/[^A-Za-z]/","",$plaintext);
$mcl_array = count_chars($letter_string, 1);
$highest_value=max($mcl_array);
$key = array_search($highest_value, $mcl_array);
echo "The most common character is <b>'".chr($key)."'</b> and it's contained $highest_value time(s)<br>";

//WORDS COUNT
echo "<h2>Words count</h2>";
foreach($words as $key => $value){
    echo "The word <b>".$key."</b> is contained: <b>".$value."</b> times.<br />\n";
}
?>

