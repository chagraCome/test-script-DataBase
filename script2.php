<head>
<meta charset="UTF-8">
</head>
<?php

	$link2 = mysql_connect('localhost', 'root', '');
if (!$link2) {
   die('Impossible de se connecter : ' . mysql_error());
}





	//select db industrie_budget
        $db=mysql_select_db('industrie_budget', $link2);
     if (!$db) {
	 die ('Impossible de sélectionner la base de données db : ' . mysql_error());}
     
   mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $link2);
echo"hello";
    $query='SELECT * from line_budget;';
	$result2 = mysql_query($query);
	if (!$result2) {
   die ('error query : ' . mysql_error());
}
	
    while ($row = mysql_fetch_assoc($result2)) {	
     
		echo '<pre>';
		print_r($row);
		echo '</pre>';
		//echo "test2";
		 //------------------
	   $article=$row['article'];
	   $parag=$row['parag'];
	   $s_parag=$row['s_parag'];
	    $label_groupement=$row['label'];
	
		$qu="insert into groupement(`article`,`parag`,`s_parag`,`label_groupement`) values(
		'".$article."','".$parag."','".$s_parag."','".$label_groupement."');";
		$test=mysql_query($qu);
		//echo $qu."<br/>" ;
		if (!$test) {
    die('Invalid query: ' . mysql_error());
	}
	
	}
	//------------------
	
	 
    

?>
