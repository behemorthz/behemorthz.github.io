<?php
$keep = file("test1.pml");
$j = count($keep);
// echo "<script>console.log('.$j.')</script>";
// echo "<script>console.log('.$keep[$j].')</script>";
$que = new SplQueue();
$proc = array();
$answer = array();

for($k=0;$k<$j;$k++){
  if(preg_match('/init/',$keep[$k])){
    $que->enqueue($keep[$k]);
  }
  else if(preg_match('/proctype/',$keep[$k])){
    array_push($proc,$keep[$k]);
  }
  else if(preg_match('/GOoperation/',$keep[$k])){
    array_push($proc,$keep[$k]);
  }
  else if(preg_match('/atomic/',$keep[$k])){
    $que->enqueue(trim($keep[$k]));
  }
  else if(preg_match('/run/',$keep[$k]) && preg_match('/    /',$keep[$k])){
    $que->enqueue(trim($keep[$k]));
  }
  else if(preg_match('/  /',$keep[$k])){
    array_push($proc,$keep[$k]);
  }
  else if(preg_match('/byte/',$keep[$k])){
    $que->enqueue($keep[$k]);
  }
  else if(preg_match('/}/',$keep[$k])){
    array_push($proc,$keep[$k]);
  }
  else{
    $que->enqueue($keep[$k]);
  }
}

while(!($que ->isEmpty())){
  $que ->rewind();
  $oper=$que ->current();
  $que ->dequeue();
  if(preg_match('/run/',$oper)){
    array_push($answer,$oper);
    $nproc = cutprocname($oper);
    getProc($nproc);
  }
  else{
    array_push($answer,$oper);
  }

}
genxml($answer);

function cutprocname($procname){
  $lpos = strpos($procname, '(');
  $nproc = substr($procname,3,$lpos-2);
  return $nproc;
}

function getProc($nproc){
  $put = false;
  global $answer;
  global $proc;
  for($i=0;$i<count($proc);$i++)
  {
    if (strpos($proc[$i],$nproc ) !== false) {
      $put=true;
    }
    if(strpos($proc[$i],'}')!==false){
      $put=false;
    }
    if($put==true){
      array_push($answer,$proc[$i]);
    }
  }
}
function genxml($answer){
  $j=count($answer);
  $text = '<formalmodel>';

  for($i=0;$i<$j;$i++){

      if(preg_match('/if/', $answer[$i]))
      {
          $text .= "<loc id=\"";
          $text .= $i+1;
          $text .= "\" trace=\"false\" type=\"if\">";
          $text .= "<code>";
          $text .= htmlspecialchars($answer[$i]);
          $text .= "</code>";
          $text .= "</loc>";
      }
      else if(preg_match('/fi/', $answer[$i])){
        $text .= "<loc id=\"";
        $text .= $i+1;
        $text .= "\" trace=\"false\" type=\"if\">";
        $text .= "<code>";
        $text .= htmlspecialchars($answer[$i]);
        $text .= "</code>";
        $text .= "</loc>";
    }
      if(preg_match('/^do/', $answer[$i]))
      {
        $text .= "<loc id=\"";
        $text .= $i+1;
        $text .= "\" trace=\"false\" type=\"do\">";
        $text .= "<code>";
        $text .= htmlspecialchars($answer[$i]);
        $text .= "</code>";
        $text .= "</loc>";
    }
      else if(preg_match('/^od/', $answer[$i])){
        $text .= "<loc id=\"";
        $text .= $i+1;
        $text .= "\" trace=\"false\" type=\"do\">";
        $text .= "<code>";
        $text .= htmlspecialchars($answer[$i]);
        $text .= "</code>";
        $text .= "</loc>";
    }
      else if(preg_match('/^for/', $answer[$i])){
        $text .= "<loc id=\"";
        $text .= $i+1;
        $text .= "\" trace=\"false\" type=\"for\">";
        $text .= "<code>";
        $text .= htmlspecialchars($answer[$i]);
        $text .= "</code>";
        $text .= "</loc>";
      }
    else
      {
        $text .= "<loc id=\"";
        $text .= $i+1;
        $text .= "\" trace=\"false\" type=\"statement\">";
        $text .= "<code>";
        $text .= htmlspecialchars($answer[$i]);
        $text .= "</code>";
        $text .= "</loc>";
      }
  }
  $text .= '</formalmodel>';

  $str = '<?xml version="1.0"?>' . $text;

  $xml = new SimpleXMLElement($str);

  $xml->asXML("text1.xml"); 
}
?>
