<?php
      $id = $_COOKIE['unq_id'];
      $inp = $_POST['inp'];
      $ddir = '/var/www/html/'.$id ;
      $in = $ddir."/in.txt";
      $output = $ddir."/a.txt";
       $fil = fopen($in,"w");
       fwrite( $fil, $inp);
       fclose($fil);
       // $iu = "sudo cat /var/www/html/".$id."/in.txt";
       // echo shell_exec("$iu ");
       // echo  "sudo docker run -i --rm ".$id." < ".$in." > ".$output ;
      $lol = "sudo docker run -i --rm ".$id." < ".$in." > ".$output;
        shell_exec("$lol");
      $ou = "sudo cat /var/www/html/".$id."/a.txt";
      $cmd1 = "sudo docker rm $(sudo docker ps -a -f status=exited -q)";
      $cmd2 = "sudo rm -r ".$id;
      $cmd = "sudo docker rmi ".$id;
   shell_exec(" $cmd ");
      shell_exec("yes | sudo docker system prune");
      shell_exec(" $cmd1 ");
      echo shell_exec("$ou");
       shell_exec(" $cmd2 ");
       
?>
