<?php

function json_response($message = null)
{
    header_remove();
    http_response_code(200);
    header('Content-Type: application/json');
    header('Status: 200 OK');

    return json_encode([
        'excuse' => $message
    ]);
}

$myverbs=simplexml_load_file("verbos.xml");
$myitems=simplexml_load_file("things.xml");
$mydest=simplexml_load_file("with.xml");


$randomexc=rand(0,count($myverbs)-1);

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
  $randm=rand(0,count($excll)-1);
  $expred=$excll[$randm];
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


// print "<div align='center'><h2>Diablos! Tengo que...</h2>\n";

if ($_GET["v"]=="easter")
{
  $pred = "CON TU HERMANA!";
}

echo json_response("$excv $expred $pred"); exit();
print "<h1>$excv $expred $pred</h1>";

?>
<form method="POST">
<input type="Submit" value="Generar otro">
</form>

<a href="?v=easter">easter egg</a>
</div>
