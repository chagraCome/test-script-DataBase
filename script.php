<head>
<meta charset="UTF-8">
</head>
<?php

	$link = mysql_connect('localhost', 'root', '');
if (!$link) {
   die('Impossible de se connecter : ' . mysql_error());
}
	//select db industrie_budget
$db=mysql_select_db('industrie_budget', $link);
if (!$db) {
   die ('Impossible de sélectionner la base de données db : ' . mysql_error());
}
// select db pad_2016
$db_selected = mysql_select_db('pad_2016', $link);
if (!$db_selected) {
   die ('Impossible de sélectionner la base de données : ' . mysql_error());
}
	mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $link);
    $query='SELECT * from budget';
	$result = mysql_query($query);
	//echo "$query";
	
    while($row3 = mysql_fetch_assoc($result)) {	
       // query='insert into dbh2.line_budget(article,parag,)
		echo '<pre>';
		//print_r($row3);
		echo '</pre>';
		 //------------------
	   $ministere=$row3['ministere'];
	   $prog=$row3['program'];
	   $article=$row3['article'];
	   $parag=$row3['paragraphe'];
	   $s_parag=$row3['sous_paragraphe'];
	   $region=$row3['region'];
	   $label=$row3['label'];
	   $s_prog='0';
	   
	   $creditE=$row3['inscrit_engagement'];
	   $creditP=$row3['inscrit_payement'];
	   $year=$row3['year'];
	   $total=$row3['inscrit_engagement']+ $row3['inscrit_payement'];
		$qu="insert into industrie_budget.line_budget(`article`,`parag`,`s_parag`,`region`,`label`,`prog`,`s_prog`,`ministere`,`total`) values(
		'".$article."','".$parag."','".$s_parag."','".$region."','".$label."','".$prog."','".$s_prog."','".$ministere."','".$total."');";
		$test=mysql_query($qu);
		//echo $qu."<br/>" ;
		if (!$test) {
    die('Invalid query insert : ' . mysql_error());
	}
	
	//remplir table $db.budget 
	
	$lastid=mysql_insert_id();
	
	$qu2="insert into industrie_budget.budget(`year`,`id_line`,`creditE`,`creditP`) values(
		'".$year."','".$lastid."','".$creditE."','".$creditP."');";
		$test2=mysql_query($qu2);
		//echo $qu."<br/>" ;
		if (!$test2) {
    die('Invalid query: ' . mysql_error());
	}
	/*teste	
     $query2='SELECT * from budget';
	$result2 = mysql_query($query2);

	while ($row32 = mysql_fetch_assoc($result2)) {
		echo '<pre>';
		
		//print_r($row32);
	echo '</pre>';}*/
	//
    }
	//------------------
	
	 
   // echo"good 3";

?>
