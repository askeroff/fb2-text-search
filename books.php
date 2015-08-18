<?PHP      header("Content-Type: text/html; charset=windows-1251"); ?>
<!DOCTYPE html>
<html><head><title>Books</title><meta http-equiv="content-type" content="text/html; charset=windows-1251" /></head>

<body>

<form method='post' action='' style='margin:0 auto; display:block; border:1px solid #ddd; width:800px;height:100%;padding:80px;'>
<?php
if(isset($_POST['seekWord'])){$seekWord = $_POST['seekWord'];}
foreach (glob("books/*.fb2") as $filename) {
$result = preg_match_all("/<p>.*<\/p>/m", file_get_contents($filename), $out);
for($i = 0; $i<count($out[0]);$i++){
if(preg_match("/\s" . $seekWord . "\s/im", $out[0][$i])){
echo "Match was found in file: .<b>" . $filename . "</b><br>" . preg_replace("/" . $seekWord . "/im", "<span style='background:yellow;'>" . $seekWord . "</span>", $out[0][$i]);
}}}
?>

<input style='width:400px;display:block;border:1px solid #ededed;padding:10px;height:40px;' type='text' name='seekWord' id='seekWord' />
<input style='margin-top:10px;width:400px;display:block;border:1px solid #ededed;padding:10px;height:40px;' type='submit' name='sub' id='sub' />



</form>

  </body> </html>