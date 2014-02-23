<?php function matheval($equation){
	$equation = preg_replace("/[^0-9+\-.*\/()%]/","",$equation);
	$equation = preg_replace("/([+-])([0-9]+)(%)/","*(1\$1.\$2)",$equation);
	// you could use str_replace on this next line
	// if you really, really want to fine-tune this equation
	$equation = preg_replace("/([0-9]+)(%)/",".\$1",$equation);
	if ( $equation == "" ) {
		$return = 0;
	} else {
		eval("\$return=" . $equation . ";" );
	}
	return $return;
}
function pushEqua($equa){
	mysql_query("
	INSERT INTO  `001-arbre` (`id` ,`equa`)
	VALUES (NULL ,  '$equa');");
}
function printLigne($i) {
		if($i < 10){$space = "   ";}else{$space = "  ";}
		if($i > 99){$space = " ";}
		if($i > 999){$space = "";}

		$nb = str_pad($i, 3, "0", STR_PAD_LEFT);
		$nb =$i;
		echo '<img src="/icons/folder.gif" alt="[DIR]"> <a href="'.$nb.'/">'.$nb.'/</a>'.$space.'                   08-Mar-2010 14:11    -
';
}
?>
