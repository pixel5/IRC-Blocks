<?php

if (isset($_POST['normal'])) { 
	$word_array = str_split(filter_var($_POST['word']));
	$reverse_word_array = array_reverse($word_array);
	$first_line = implode(' ', $word_array) . "\n";
	$last_line = implode(' ', $reverse_word_array);
	$word_length = count($word_array);
	$spaces = str_repeat("&nbsp;",(($word_length - 2) * 2) + 1); 

	for ($i = 1; $i < $word_length - 1; $i++) {
		$mid_lines[] = $word_array[$i] . $spaces . $reverse_word_array[$i];
	}

	$block = $first_line . implode("\n",$mid_lines) . "\n" . $last_line . "\n";
	echo "<br/><br/><textarea style='width:100%;height:1000px;'>{$block}</textarea>";
}

else if (isset($_POST['super'])) {
	$test = explode(' ', filter_var($_POST['word']));
	if (strlen($test[0]) != strlen($test[1]) || isset($test[2])) {
		echo "<br/><br/><textarea style='width:100%;height:1000px;'>You did it wrong, moron. Use 2 words of the same length.</textarea>";
		return;
	}
	else {
		$wrd_arr1 = str_split($test[0]);
		$wrd_arr2 = str_split($test[1]);
		$rev_wrd_arr1 = array_reverse($wrd_arr1);
		$rev_wrd_arr2 = array_reverse($wrd_arr2);
		$word_length = count($wrd_arr1);
		$spaces = str_repeat("&nbsp;",(($word_length - 1) * 2) + 2); 
		
		$first_line = implode(' ', $wrd_arr1) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . implode(' ', $wrd_arr2). "\n";
		$last_line = implode(' ', $rev_wrd_arr2) . "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . implode(' ', $rev_wrd_arr1);
		$middle[0] = $spaces . "&nbsp;" . $wrd_arr1[$word_length - 1] . $spaces . "&nbsp;";
		$middle[1] = "&nbsp;" . implode(' ', $wrd_arr1) . "&nbsp;&nbsp;&nbsp;" . implode(' ', $wrd_arr2);
		$middle[2] = $spaces . "&nbsp;" . $wrd_arr2[0] . $spaces . "&nbsp;";
		
		for ($i = 1; $i < $word_length; $i++) {
			$mid_lines1[] = $wrd_arr1[$i] . $spaces . $wrd_arr1[$i - 1] . $spaces. $rev_wrd_arr2[$i];
			$mid_lines2[] = $wrd_arr2[$i-1] . $spaces . $wrd_arr2[$i] . $spaces. $wrd_arr1[$word_length-$i];
		}
		
		$block = $first_line . implode("\n",$mid_lines1) . "\n" . implode("\n",$middle) . "\n" . implode("\n",$mid_lines2) . "\n" . $last_line . "\n";
	}

	echo "<br/><br/><textarea style='width:100%;height:1000px;'>{$block}</textarea>";
}

?>