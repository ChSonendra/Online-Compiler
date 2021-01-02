
<!DOCTYPE html>
<html>
<head>
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial;
  padding: 10px;
  background: #f1f1f1;
}
textarea {
  resize: none;
}

#w3review {
background-color:#1C1C1C;
color:#F2F5A9;
padding-left:20px;
padding-top:20px;
font-style:bold;
content:overflow;}
/* Header/Blog Title */
.header {
  padding: 30px;
  text-align: center;
  background: white;
  content:overflow;
}

.header h1 {
  font-size: 30px;
}

/* Style the top navigation bar */
.topnav {
  overflow: hidden;
  background-color: #333;
}

/* Style the topnav links */
.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

/* Change color on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  background-color: #f1f1f1;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
  background-color: white;
  padding: 20px;
  margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 1200px) {
   .rightcolumn {   
    width: 100%;
    padding: 0;
  }
  .leftcolumn {   
    width: 100%;
    padding: 0;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .topnav a {
    float: none;
    width: 100%;
  }
}
</style>
</head>
<body>
<div style="margin-bottom:4px;border-radius:10px;" id="unq_id" class="header">
  <h1>Enter your full name to let us identify you... and provide you with better services</h1>
  <p id="paraa" ><input style="height:60px;width:60%;padding:30px;font-size:30px;border:none;border-bottom:1px solid black;" id="name" type="text" placeholder="your name" />
  <button onclick="gen_un_id()" style="height:52px;width:130px;padding:5px;font-size:10px;border:none;">Submit and start coding</button></p>
</div>
<div class="header">
  <h1>Here will be your problem statement... </h1>
  <p></p>
</div>
<div style="height:50px;background-color:blue;color:white;padding:2px;"  class="header">
  <p>Language : 
  <input type="radio" id="lang" name="lang" value="c" />C
  <input type="radio" id="lang" name="lang" value="cpp" />C++
  <input type="radio" id="lang" name="lang" value="java" />Java - <span style="color:black;"> (use class name as 'Main') </span>
  </p>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
	<textarea id="w3review" height="400px" width="60%" name="w3review" rows="30" cols="110">

  </textarea>
   </div>
  </div>
  <div class="rightcolumn">
    
    <div class="card">
      <h3>results</h3>
     <p><textarea id="lol_yeah" name="w3review" rows="10" cols="35" readonly></textarea></p>
     <p><input type="text" id="inp" placeholder="input here please"/> <a id="inputt" onclick="runi()" style="background-color:#FA23ff;padding:3px;padding-left:15px;padding-right:15px;text-align:center;border-radius:10px;">Run With Input</a></p>
    </div>
    <div style="margin-top:-30px;" class="card">
   <h3 id="compile2" onclick="compile();"style="background-color:#FA2353;padding:12px;text-align:center;border-radius:10px;">Compile</h3>
    <h3 id="compile1" onclick="Run_program();"style="background-color:#FA2353;padding:12px;text-align:center;border-radius:10px;">Run without Input</h3>
    </div>
  </div>
</div>

<div class="footer">
  <h2>ONLINE COMPILER AS SAS (Software As Service ) MODEL... --  SONENDRA KUMAR</h2>
</div>
<script>src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"</script>
<script>


	    function gen_un_id() {
	   name = document.getElementById("name").value;
		var n = "name="+name;
    var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
          document.getElementById("paraa").innerHTML = "your unique id is \""+this.responseText+"\" it is valid for 3 hours";
		  setTimeout(() => { document.getElementById("unq_id").style.display = "none" ; }, 3000);
    }
  };
  xhttp.open("POST", "unq.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(n); 
  }
  
	    function compile() {
	    document.getElementById("compile1").disabled = true;
	   code = document.getElementById("w3review").value;
	   
	 var code = encodeURIComponent(code);
	   lang = document.querySelector('input[name=lang]:checked').value ;
	   document.getElementById("compile2").innerHTML = "compiling... wait";
		var n = "code_clean="+code+"&lang="+lang;
		
		var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
   if(this.responseText == 1){
   document.getElementById("compile1").disabled = false;
      document.getElementById("compile2").innerHTML = "Compiled Successfully";
      document.getElementById("lol_yeah").value = "Compiled Successfully...Running If your program requires input please provide the input and then Click 'Run with Input' button" ;
     // Run_program();  
    }
       else
       {    document.getElementById("lol_yeah").value = this.responseText ;
           document.getElementById("compile2").innerHTML = "compile and run";
           }
		}
  };
  xhttp.open("POST", "new_compile_2.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(n); 
  }
    function Run_program() {
    document.getElementById("compile1").innerHTML = "Running... wait";
	  // inp = document.getElementById("inp").value;
	  document.getElementById("compile2").disabled = true;
	    document.getElementById("inputt").disabled = true;
	//	var n = "inp="+inp;
		var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.getElementById("compile2").disabled = false;
	    document.getElementById("inputt").disabled = false;
	    document.getElementById("compile2").innerHTML = "Compile and Run";
	    document.getElementById("compile1").innerHTML = "Run without Input";
           document.getElementById("lol_yeah").value = this.responseText ;
		}
  };
  xhttp.open("POST", "runi_io.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(); 
  }
   function runi() {
    document.getElementById("compile1").innerHTML = "Running... wait";
	   inp = document.getElementById("inp").value;
	  document.getElementById("compile2").disabled = true;
	    document.getElementById("inputt").disabled = true;
	var n = "inp="+inp;
	
		var xhttp = new XMLHttpRequest();
     xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            document.getElementById("compile2").disabled = false;
	    document.getElementById("inputt").disabled = false;
	    document.getElementById("compile2").innerHTML = "Compile";
	      document.getElementById("compile1").innerHTML = "run without input";
           document.getElementById("lol_yeah").value = this.responseText ;
		}
  };
  xhttp.open("POST", "run_io_pr.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     xhttp.send(n); 
  }
		
 


  </script>
<?php  if(isset($_COOKIE['unq_id'])){
	   
	echo '<script>
          document.getElementById("unq_id").style.display = "none" ;
          document.getElementById("compile2").disabled = true ;
		  var unqid = "'.$_COOKIE['unq_id'].'";
 </script>';
	 
	 }
	  ?>
</body>
</html>

