
 <?php 
    /* ***************** Member List For Aproval ************************** */
    session_start();
    include("../functions.php");
    include("../connection.php");

    $user_data = check_login($con);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>PVDS member list for aproval</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the side navigation */
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #4863A0;
  overflow-x: hidden;
}


/* Side navigation links */
.sidenav a {
  color: white;
  padding: 16px;
  text-decoration: none;
  display: block;
}

/* Change color on hover */
.sidenav a:hover {
  background-color: #ddd;
  color: black;
}

/* Style the content */
.content {
  margin-left: 200px;
  padding-left: 20px;
}
</style>
<!-- ************************************************* HTML ************************************ -->
</head>
<body>

<div class="sidenav">
  <a href="/pvds/member/dashboard.php">PVDS Dashboard</a>
  <a href="/pvds/member/addMember.php">Add Member</a>
  <a href="/pvds/member/memberList.php">Active Member List</a>
  <a href="#">Add Fee</a>
  <li><a href="/pvds/user/logout.php">Log Out</a></li>
</div>

<div class="content">
  <h2>PVDS Dashboard</h2>
 
  <div>

          <style>
              #box{

                  background-color: ;
                  margin: auto;
                  width: 300px;
                  padding: 20px;
              }
              #HeadText{
                  text-align: center;   
                  font-size: 24px;    
                  width: 100%;
              }
          </style>
            
          <t1 id="HeadText">PVDS Member List</t1>
          <table id="box">
              <tr style="text-align: left">
                  <th>SI</th>
                  <th>Picture</th>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Mobile</th>
                  <th>Upzila</th>
                  <th>Zila</th>
                  <th>Status</th>
                  <th>Edit</th>
                  <th>Delete</th>
                  <th>Approve</th>
              </tr>
        <!-- PHP Sqli Qurary for faching data  -->  
          <?php
              /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
              $sql = "SELECT pic, m_name, sex, phone, upzila, zila,action, pvds_id  FROM regi";
              $result = $con-> query($sql);

              if($result-> num_rows > 0){
                $no=0;
                  while($row = $result-> fetch_assoc()){ 
                      $no++;
          ?>        
                      	    <tr>
                                <td><?php echo $no; ?></td>
                                <td><img src="<?php echo $row['pic']; ?>" alt="abc.jpg" height="50px" weidth="50px"></td>
                                <td><?php echo $row['m_name']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td><?php echo $row['upzila']; ?></td>
                                <td><?php echo $row['zila']; ?></td>
                                <td><?php echo $row['action']; ?></td>
                                <td><a href="/pvds/member/edit.php?pvds_id=<?php echo $row['pvds_id']; ?>">EDIT</a></td>
                                <td><a href="/pvds/member/delete.php?pvds_id=<?php echo $row['pvds_id']; ?>" >Delete</a></td>
                                <td><td><a href="/pvds/member/approve.php?pvds_id=<?php echo $row['pvds_id']; ?>">Done</a></td></td>
                              </tr>             
          <?php            
                     
                      
                    }
                  
                  echo "</table>";
              }else{
                  echo "0 result";
              }
              $con-> close();
          ?>
          </table>
  </div>   

</div>

</body>
</html>
