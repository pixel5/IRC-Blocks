<!DOCTYPE html>
<html>
<head>
<title>IRC Block Maker</title>

<style>
html {
	white-space: pre;
	font-family:monospace;
}

#block_form {
	margin-top:-50px;
	padding:0;
}
</style>

</head>

<body>

<form id="block_form" name="blocks" method="post">
If this doesn't look right when you paste it, your client sucks and you should get good.<br/>
<input type="text" name="word" size="60"><br/><br/>
<input type="submit" name="normal" value="Blockify"><br/>
<input type="submit" name="super" value="SUPER BLOCKIFY"><br/>
</form>

<?php
if (isset($_POST['word'])) {
	include('script.php');
}
?>	

</body>
</html>