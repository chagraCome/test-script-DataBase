<head>
<meta charset="UTF-8">
</head>
<?php

	$link2 = mysql_connect('localhost', 'root', '');
if (!$link2) {
   die('Impossible de se connecter : ' . mysql_error());
}




/*select db pad_2016
$db_selected = mysql_select_db('pad_2016', $link2);
if (!$db_selected) {
die ('Impossible de sélectionner la base de données : ' . mysql_error());}
*/
	//select db industrie_budget
       $db=mysql_select_db('industrie_budget', $link2);
     if (!$db) {
          die ('Impossible de sélectionner la base de données db : ' . mysql_error());
     }
		
   mysql_query("SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'", $link2);

    $query='SELECT * from line_budget;';
	$result2 = mysql_query($query);
	if (!$result2) {
   die ('error query : ' . mysql_error());
}
	
    while ($row = mysql_fetch_assoc($result2)) {	
     
		echo '<pre>';
		//
		echo '</pre>';
		
		 //------------------
       $article=$row['article'];
       $parag=$row['parag'];
	   $s_parag=$row['s_parag'];
	   $id_ligne=$row['id_line'];
	   $query="select id_groupement from groupement where article='".$article."';";;
	   $test_query=mysql_query($query);
	   
	  /*test query
	  if (!$test_query) {
   die ('error query 2 : ' . mysql_error());
}*/
	

	   while ($row2 = mysql_fetch_assoc($test_query)) {
		 $id_groupement=$row2['id_groupement'];  
	   }
	 
	 $qu="insert into ligne_groupement(`id_groupement`,`article`,`parag`,`sparag`,`id_ligne`) values(
		'".$id_groupement."','".$article."','".$parag."','".$s_parag."','".$id_ligne."');";
		$test=mysql_query($qu);
		//echo $qu."<br/>" ;
		if (!$test) {
    die('Invalid query insert: ' . mysql_error());
	}
	
	
    }
	//------------------
	
	 
    

?>
