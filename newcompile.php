<?php

 
 $path=(md5(rand(10,10000)));
 $code=$path;
 if (!is_dir('opt/lampp/htdocs/compiler'.$code)) {
 mkdir($code, 0777);
 $fullpath='/opt/lampp/htdocs/compiler/'.$code;
 //chdir($code);
 chdir('/opt/lampp/htdocs/compiler/'.$code);
}
 else {
 unlink('/opt/lampp/htdocs/compiler/'.$code);
 }


  $file = fopen('prog.c', 'w+');
  
  $email = htmlspecialchars($_POST['nail'], ENT_HTML5);
  $email= htmlspecialchars_decode($email, ENT_HTML5);
  if ($email>=25000) { echo "too large to handle"; exit;}
  //$email = $_POST['nail']; 
  if(preg_match("/(awk|bash|rm|cpio|cut|clear|cipeg|reboot|grep|gstar|halt|root|map|grep|system)/i", $email)) { echo "Operation not    permitted."; exit;}
  $run=$code.'/runnable.txt';
  $fmail = $email;
  fwrite($file,$fmail);
  
if(isset($_POST['mail'])) {
    $data = $_POST['mail']  . "\n";
    $ret = file_put_contents('/opt/lampp/htdocs/compiler/'.$code.'/input.txt', $data,FILE_APPEND);
} 
      
   $times = posix_times();
 print_r($times);   
$output=shell_exec('gcc prog.c  2>&1');
echo "<br/>";
$times = posix_times();
 print_r($times);
shell_exec('php newcompile.php < input.txt');
  if (!empty($output))
  {
    echo "error in code".$output;
    }
    else
    {
    //$start = GetCPUClock();
  $output=shell_exec('./a.out < input.txt > runnable.txt');
  //$output.= shell_exec(escapeshellarg($run));	
  $file2 = fopen("runnable.txt","r");
   echo fgets($file2);
   fclose($file2);
  echo "$output";
 $times = posix_times();
 print_r($times);
//yyyyyyyyyyyy
chdir('/opt/lampp/htdocs/compiler/');
shell_exec('rm -R /opt/lampp/htdocs/compiler/'.$code);
}

?>
