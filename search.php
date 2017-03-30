<?php
require_once"include.php";
$v=$_POST[value];
$re=@mysql_query("select  pName,id from imooc_pro where pName like '%$v%' order by id desc limit 10 ");
if(mysql_num_rows($re)<=0)
	exit('0');
echo '<ul>';
while($ro=mysql_fetch_array($re))echo "<li><a href='proDetails.php?id= $ro[id]' >".$ro[pName].'</a></li>';

echo '<li class="cls"><a href="javascript:;"onclick="$(this).parent().parent().parent().fadeOut(100)">关闭</a& gt;</li>';
echo '</ul>';
?>