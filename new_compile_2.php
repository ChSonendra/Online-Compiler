<?php
$id = $_COOKIE['unq_id'];
$ext = $_POST['lang'];
$code = $_POST['code_clean'];
$ddir = '/var/www/html/'.$id ;

//initial file system creation
function initial_file_system($ddir,$code,$filename,$doc_file,$doc){
   $inp = $ddir."/in.txt";  //input file
    $error = $ddir."/error.txt" ;  //error file
   $output = $ddir."/a.txt";   //output file
      // code file writing
   $file = fopen( $filename, "w" );
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $file, $code);
   fclose( $file );
      // doc file writing 
   $file = fopen( $doc_file, "w" );
   if( $file == false ) {
      echo ( "Error in opening new file" );
      exit();
   }
   fwrite( $file, $doc);
   fclose( $file );
   //input error and output file writing
  $fil = fopen($inp,"w");
   fclose($inp);
  $fil = fopen($error,"w");
   fclose($error);
  $fil = fopen($output,"w");
   fclose($output);
  shell_exec("sudo chmod 777 $output");
  shell_exec("sudo chmod 777 $error");
  shell_exec("sudo chmod 777 $inp");
  return 1;
    }
    
   //Starting container to build a docker image for respective program 
function compile_the_code($id,$ddir,$filename1){
    $error = $ddir."/error.txt" ;  //error file
    $startcon = "sudo docker build -t ".$id." ".$ddir." > ".$error ;
    shell_exec("$startcon");
    $cm = "sudo grep \"".$filename1.":\" /var/www/html/".$id."/error.txt 2>&1";
    $a = shell_exec("$cm");
    if(isset($a))
      return $a;
  else
      return 1;
       }
       
    //identifying the requirements of User
    //if it is C or CPP
if($ext == 'c' || $ext == 'cpp'){
$filename1 = $id.'.'.$ext;
$filename = '/var/www/html/'.$id.'/'.$filename1 ;
shell_exec("mkdir $id");
shell_exec("sudo chmod 777 /var/www/html/$id");
$doc_file = $ddir."/dockerfile" ;
$doc = "FROM gcc:latest
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN gcc -o myapp ".$filename1."
CMD [\"./myapp\"]";
$i = initial_file_system($ddir,$code,$filename,$doc_file,$doc);
if($i == 1){
$p = compile_the_code($id,$ddir,$filename1);
echo $p;
}
}
     //if it is JAVA
else if($ext == 'java'){
$filename1 = 'Main.'.$ext;
$filename = '/var/www/html/'.$id.'/'.$filename1 ;
shell_exec("mkdir $id");
shell_exec("sudo chmod 777 /var/www/html/$id");
$doc_file = $ddir."/dockerfile" ;
$doc = "FROM openjdk:latest
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
RUN javac Main.java
CMD [\"java\", \"Main\"]";
$i = initial_file_system($ddir,$code,$filename,$doc_file,$doc);
if($i == 1){
$p = compile_the_code($id,$ddir,$filename1);
echo $p;
}
}
?>
