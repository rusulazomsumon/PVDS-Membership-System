<?php 
    /* *****************  ************************** */
    session_start();
    include('../header.php');
    include("../functions.php");
    include("../connection.php");

    #$user_data = check_login($con);
 ?>

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
    }
</style>

<t1 id="HeadText">Newly Aproved PVDS Member</t1>
<table id="box">
<tr style="text-align: left">
<th>SI</th>
        <th>Picture</th>
        <th>Name</th>
        <th>Sex</th>
        <th>Mobile</th>
        <th>Upzila</th>
        <th>Zila</th>
    </tr>
<!-- PHP Sqli Qurary for faching data  -->  
<?php
              /* Branch Wise Data Show $sql = "SELECT picture, s_name, sex, mobile from student WHERE sex='M'";*/
              $sql = "SELECT pic, m_name, sex, phone, upzila, zila, pvds_id  FROM regi WHERE action='YES'";
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
    <button onclick="window.print()">Print List</button>
    <?php include('../footer.php'); ?> 