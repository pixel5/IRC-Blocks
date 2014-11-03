<?php

parse_str(implode('&', array_slice($argv, 1)), $_GET);
$word = $_GET['word'];

$test = explode(' ', filter_var($_GET['word']));
	if (strlen($test[0]) != strlen($test[1]) || isset($test[2])) {
		echo "You did it wrong, moron. Use 2 words of the same length.\n";
		return;
	}
	else {
		$wrd_arr1 = str_split($test[0]);
		$wrd_arr2 = str_split($test[1]);
		$rev_wrd_arr1 = array_reverse($wrd_arr1);
		$rev_wrd_arr2 = array_reverse($wrd_arr2);
		$word_length = count($wrd_arr1);
		$spaces = str_repeat(" ",(($word_length - 1) * 2) + 2); 
		
		$first_line = implode(' ', $wrd_arr1) . "     " . implode(' ', $wrd_arr2). "\n";
		$last_line = implode(' ', $rev_wrd_arr2) . "     " . implode(' ', $rev_wrd_arr1);
		$middle[0] = $spaces . " " . $wrd_arr1[$word_length - 1] . $spaces . " ";
		$middle[1] = " " . implode(' ', $wrd_arr1) . "   " . implode(' ', $wrd_arr2);
		$middle[2] = $spaces . " " . $wrd_arr2[0] . $spaces . " ";
		
		for ($i = 1; $i < $word_length; $i++) {
			$mid_lines1[] = $wrd_arr1[$i] . $spaces . $wrd_arr1[$i - 1] . $spaces. $rev_wrd_arr2[$i];
			$mid_lines2[] = $wrd_arr2[$i-1] . $spaces . $wrd_arr2[$i] . $spaces. $wrd_arr1[$word_length-$i];
		}
		
		$block = $first_line . implode("\n",$mid_lines1) . "\n" . implode("\n",$middle) . "\n" . implode("\n",$mid_lines2) . "\n" . $last_line . "\n";
	}

	echo $block;

?>
