<?php

parse_str(implode('&', array_slice($argv, 1)), $_GET);
$word = $_GET['word'];

$word_array = str_split($word);
$reverse_word_array = array_reverse($word_array);

$first_line = implode(' ', $word_array) . "\n";
$last_line = implode(' ', $reverse_word_array);
$word_length = count($word_array);
$spaces = str_repeat(" ",(($word_length - 2) * 2) + 1); 

for ($i = 1; $i < $word_length - 1; $i++) {
	$mid_lines[] = $word_array[$i] . $spaces . $reverse_word_array[$i];
}

$block = $first_line . implode("\n",$mid_lines) . "\n" . $last_line . "\n";
echo $block;

?>
