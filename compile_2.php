<?php 
$ext = $_POST['lang'];
$code = $_POST['code_clean'];
$id = $_COOKIE['unq_id'];
$filename1 = 'biglol.'.$ext;
$filename = '/var/www/html/'.$id.'/'.$filename1 ;
$ddir = '/var/www/html/'.$id ;
$inp = $ddir."/in.txt";
shell_exec("mkdir $id");
shell_exec("sudo chmod 777 /var/www/html/$id");
$doc_file = $ddir."/dockerfile" ;
$doc = "FROM gcc:latest
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN gcc -o myapp ".$filename1."
CMD [\"./myapp\"]";
   $fil = fopen($inp,"w");
   fclose($inp);
   $file = fopen( $filename, "w" );
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $file, $code);
   fclose( $file );
   $filee = fopen( $doc_file, "w" );
   if( $filee == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $filee, $doc);
   fclose( $filee );
    $out_file = $ddir."/error.txt" ;
   $output = $ddir."/a.txt";
    $fil = fopen($out_file,"w");
   fclose($out_file);
   $fil = fopen($output,"w");
   fclose($output);
    shell_exec("sudo chmod 777 $output");
    shell_exec("sudo chmod 777 $out_file");
    $startcon = "sudo docker build -t $id $ddir > $out_file ";
    shell_exec("$startcon");
    $cm = "sudo grep \"".$filename1.":\" /var/www/html/".$id."/error.txt 2>&1";
    $a = shell_exec("$cm");
        if(isset($a))
         echo $a;
        else
         echo 1;
    
 //  echo shell_exec("ls -l");
?>
