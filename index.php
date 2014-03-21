<?

$myverbs=simplexml_load_file("verbos.xml");
$myitems=simplexml_load_file("things.xml");
$mydest=simplexml_load_file("with.xml");


$randomexc=rand(0,count($myverbs)-1);

// pick

$excv=$myverbs->item[$randomexc]->name;
$excr=$myverbs->item[$randomexc]->cond;
$exprew=$myverbs->item[$randomexc]->extra;


$ffffff=0;

foreach($myitems as $tempval) {
  if (!strcmp($tempval->cond, $excr))
    {
      $excll[]=$tempval->name;
      $exclw[]=$tempval->extra;
      $ffffff++;
    }
}


$expred="";
if ($ffffff>0)
{
  //print $ffffff;
  $randm=rand(0,count($excll)-1);
  $expred=$excll[$randm];
  //  $exprew=$exclw[$randm];
  // de ahi cambiar exprew
  if ($exprew)
    {
	  $excwho=$mydest->item[rand(0,count($mydest)-1)];
	  //print $excwho;
	  switch ($exprew)
	    {
	    case "with":
	      $pred="con " . $excwho;
	      break;
	    case "to":
	      $pred="a " . $excwho;
	      break;
	    case "for":
	      $pred="para " . $excwho;
	      break;
	    case "of":
	      $pred="de " . $excwho;
	      break;
	    case "by":
	      $pred="por " . $excwho;
	      break;
	    default:
	      break;
	    }
      
    }

  }


print "<div align='center'><h2>Diablos! Tengo que...</h2>\n";

if ($_GET["v"]=="easter")
{
  $pred = " CON TU HERMANA!";
}

print "<h1>$excv $expred $pred</h1>";

?>
<form method="POST">
<input type="Submit" value="Generar otro">
</form>

<a href="?v=easter">easter egg</a>
</div>