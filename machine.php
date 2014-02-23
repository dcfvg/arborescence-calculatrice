<?
include('../000/bdd.php');
include('fonctions.php');

$path = str_replace("calculatrice/",'',$_SERVER["REQUEST_URI"]);
$path = str_replace("_projets/_dcfvg/net/001.arbre-a-calculer/",'',$path);

$path = explode("?",$path);

if(substr($path[0],-1) =="/")$repertoire = substr($path[0],1,-1);
else $repertoire = substr($path,1);

if($path[1] == "C=N;O=D")$triName = "C=N;O=A";
else $triName = "C=N;O=D";

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 3.2 Final//EN">
<html>
<head>
<title>Index of calculatrice/<? echo $repertoire ?></title>
</head>
<body>
<h1>Index of calculatrice/<? echo $repertoire ?></h1>
<pre><img src="/icons/blank.gif" alt="Icon "> <a href="?<?php echo $triName;?>">Name</a>                    <a href="?C=M;O=A">Last modified</a>      <a href="?C=S;O=A">Size</a>  <a href="?C=D;O=A">Description</a>
<hr><img src="/icons/back.gif" alt="[DIR]"> <a href="../">Parent Directory</a>                             -
<?

$param = explode("/",$repertoire);
$totalOp = count($param);

$last = $param[$totalOp-1];

if(is_numeric($last)){
	if($param[$totalOp-2] != "="){;
echo '<img src="/icons/folder.gif" alt="[DIR]"> <a href="*/">*/</a>                      08-Mar-2010 14:11    -
<img src="/icons/folder.gif" alt="[DIR]"> <a href="+/">+/</a>                      08-Mar-2010 14:11    -
<img src="/icons/folder.gif" alt="[DIR]"> <a href="-/">-/</a>                      08-Mar-2010 14:11    -
<img src="/icons/folder.gif" alt="[DIR]"> <a href=":/">:/</a>                      08-Mar-2010 14:11    -
<img src="/icons/folder.gif" alt="[DIR]"> <a href="=/">=/</a>                      08-Mar-2010 14:11    -
';
	}
}else if($last=="+" or $last=="-" or $last=="*" or $last==":" or $last==""  or $totalOp==1){
	
	if($path[1] == "C=N;O=D"){
		for ($i = 1000; $i > 1; $i--) printLigne($i);
	}else {
		for ($i = 1; $i <= 1000; $i++)printLigne($i);
	}

}else if($last == "="){
	$opération = str_replace("/0", "/", $repertoire);
	$opération = str_replace("/0", "/", $repertoire);
	$opération = str_replace("/0", "/", $repertoire);

	$opération = str_replace("/", "", $repertoire);
	$recap = $opération;
	$opération = str_replace("=", "", $opération);
	$opération = str_replace(":", "/", $opération);

	pushEqua($opération);

	$resultat = matheval($opération);
	$taillRes = strlen($resultat);

	for($s;$s<(24-$taillRes);$s++){
		$space .=" ";
	}

	echo '<img src="/icons/folder.gif" alt="[DIR]"> <a href="'.$resultat.'/">'.$resultat.'</a>'.$space.'08-Mar-2010 14:11    -
';
}
?>
<hr>
</pre>
</body>
</html>