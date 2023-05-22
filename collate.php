<?php
$db = mysql_connect('localhost','genshindc_genshi','TLr7LwH0YrOcw');
if(!$db)
echo "cannot connect to the database";
mysql_select_db('genshindc_genshi');
$result=mysql_query('show tables');
while($tables = mysql_fetch_array($result)) {
foreach ($tables as $key => $value) {
mysql_query("ALTER TABLE $value COLLATE utf8_general_ci");
}
}
?>