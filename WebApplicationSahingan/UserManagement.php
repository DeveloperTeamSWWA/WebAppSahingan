
<?php
include('UserM.php');
?>
<html>
<head>
   
    <title>User Management</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/user.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header">
<div class="logo"><img src="logo.png" width="70" height="70"></div>
<center>
<h1 class="fonts">SAHINGAN WATER WORKS ASSOCIATION</h1>
</center>
</div>

<div class="buttondiv">
        <a href ="Home.php">
        <button class="button"><b>HOME<b></button><br>
        </a>
       
        <a href ="cashier.php">
        <button class="button"><b>CASHIER<b></button><br>
        </a>
        <a href ="AccountManagement.php">
        <button class="button" ><b>ACCOUNT MANAGEMENT</button><br>
        </a>
         <a href ="MemberInfo.php">
        <button class="button"><b>MEMBER INFO</button><br>
        </a>
        <a href ="UpdateRate.php">
        <button class="button"><b>UPDATE RATE</button><br>
        </a>
        <a href ="Reports.php">
        <button class="button"><b>REPORTS</button><br>
        </a>
        <a href ="index.php">
        <button name="logout" class="button"><b>LOG OUT<b></button><br>
        </a>    
       
</div>
<div class ="inputs">
<div class="wrapback">
           <a href ="AccountManagement.php">
           <button class="backbtn" ><b>BACK</button><br>
           </a>
   </div>
        <form action ="UserManagement.php" method="post">
        <input type = "hidden" name="IDM2" id = "IDM2" value="<?php echo $memberID ?>">
           <input type = "hidden" name = "IDM2script" id= "IDM2script">
          
        <div class="wrapsearchtxt">
             <input type = "text" name="searchIDtxt" class="searchtxt" placeholder="User_ID">
             
            <input type = "submit" name="searchbtn" class="searchbtn" value="Search">
            </div>
            
          
                <br>
                <br>
                <div class="wrapc">
             <input type = "text" name="user_ID" class="searchTerm" id="consumer_id" value="<?php echo $memberID ?>" readonly>
             </div>
             <br>
             <div class="wrapf">
            <input type = "text" name="fname" id="fname" oninput="myFunction()" class="searchTerm" placeholder="Firstname">
            </div>
             <br>
             <div class="wrapl">
             <input type = "text" name="lname" id="lname" class="searchTerm" placeholder="Lastname">
             <br>
             </div>
             <div class="wraps">
             <select id="as" onchange="" class="searchTerm" name="as">
                        <option value="---Select---">---Select---</option>
                        <option name="as" value="Reader">Reader</option>
                  
                        <option  name="as" value="Repairman">Repairman</option>
                        </select>
            <br>
            </div>
           
         
        <div class="wrapcontact">
             <input type = "text" onkeyup="numbersOnly(this)" oninput="myFunction()" name="contacts" id="contacts" maxlength="11" class="searchTerm" placeholder="Contact">
            </div>
            <div class="wrapuser">
            <input type = "text" name="user" id="user" class="searchTerm" placeholder="Username" readonly>
            </div>
            <div class="wrapp">
            <input type = "text" name="pass" id="pass" class="searchTerm" placeholder="Password" readonly>
            </div>
            

    <br>
    <script>
function numbersOnly(input) {
    var regex = /[^0-9]/gi;
    input.value = input.value.replace(regex, "");
}

function myFunction() {
   var user = document.getElementById("consumer_id").value;

  var pass = document.getElementById("contacts").value;

  document.getElementById("user").value = user;
  document.getElementById("pass").value = pass;
}
  
</script>

    
   <div class="wrapinsert">
   <input type = "submit" name="add" class="insertbtn" value="ADD" data-toggle="modal" data-target="#Adduser">
</div>  

<div class="wrapedit">
   <input type = "submit" name="edit" class="editbtn" value="EDIT">
</div>
<div class="wrapdelete">
   <input type = "submit" name="delete" class="deletebtn" value="DELETE">
   
  
</div>

          
<div class="wraperror">
        <h4><?php echo $message; ?></h4>
        </div>
            
        </form>
        

          
      
<div class="wraptable">
        

   <div class="table-responsive">
   <table class="content-table" id = "table" >
   <thead>
     <tr >
     
        <th>ID</th>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Position</th>
      <th>Contact</th>
     
     </tr>
     <thead>
     <?php
     if(isset($_POST['searchbtn'])){
      $reference1 = $database->getReference('Users');
      $count=0;
      $forexist = 0;
      $Search_ID = $_POST['searchIDtxt'];
      if(empty($Search_ID)){
         ?>
       
         <?php
         echo "Input User_ID!";
      }
      else{
      foreach ($getkey as $key){
  
         $count++;
      
      if($Search_ID == $key){
         $forexist = $forexist+1;
         $newkey = $key;
         } 
        
     }
    
     if($forexist == 1){
     
$referenceMember = $database->getReference('Users')->getChild($newkey);
$firstnameT = $referenceMember->getChild('Firstname')->getValue();
$lastnameT = $referenceMember->getChild('Lastname')->getValue();
$as = $referenceMember->getChild('as')->getValue();
$contactsT = $referenceMember->getChild('Contacts')->getValue();

      
         ?>
         <tr>
         <td><?php echo $newkey; ?></td>
         <td><?php echo $firstnameT; ?></td>
         <td><?php echo $lastnameT; ?></td>

         <td><?php echo $as; ?></td>
       
         <td><?php echo $contactsT; ?></td>
   
       
      
         </tr>
         <script>
    var table = document.getElementById('table');
    for(var i = 1; i < table.rows.length; i++)
    {
        table.rows[i].onclick = function()
        {
            document.getElementById("consumer_id").value = this.cells[0].innerHTML;
            document.getElementById("fname").value = this.cells[1].innerHTML;
            document.getElementById("lname").value = this.cells[2].innerHTML;
            document.getElementById("as").value = this.cells[3].innerHTML;
            document.getElementById("contacts").value = this.cells[4].innerHTML;
           
            document.getElementById("IDM2script").value = this.cells[0].innerHTML;
            
   
        };
    }
  
    </script>
         <?php
         

     }else{
        echo "User_ID doesn't exist!";
     }
   }
}


?>

    </table>
   
   </div>
 
   </div>
    </div>
    </div>

</body> 

</html>
