<?php
    include('connection.php');

    $query = "SELECT * FROM client";
        
        $data = mysqli_query($conn, $query);   
    ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Display Record</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="heading"><h2><mark>Display Record</h2></mark></div>   
    <center><table class="table table-bordered" cellspacing="7">
        <thead>
           <th>ID</th>
           <th>Image</th>
           <th>Name</th>
           <th>Gender</th>
           <th>Email</th>
           <th>Mobile</th>
           <th>Caste</th>
           <th>Languages</th>
           <th>Address</th>
           <th>Operations</th>
        </thead>
        <tbody>
            <?php 
                       
            while($result = mysqli_fetch_assoc($data))
            {
                             
            echo "<tr>
            <th>". $result['id'] ."</th>
            <th><img src='". $result['image'] ."' height='60px'; width='60px';</th>
            <td>". $result['fname']. " " . $result['lname']. "</td>
            <td>". $result['gender']. "</td>
            <td>". $result['email']." </td>
            <td>". $result['phone_number']."</td>
            <td>". $result['caste']."</td>
            <td>". $result['language']."</td>
            <td>". $result['address']."</td>
            <td><a href='update_detail.php?id=$result[id]'><input type='submit' value='Update' class='update'></a>
            <a href='delete.php?id=$result[id]'><input type='submit' value='Delete' class='delete' onclick=' return checkdelete()'></a></td>
            
            </tr>";            
            }
          ?>
        </tbody>
        </table>
    </center>
    </body>
</html>
<script>
    function checkdelete(){
        return confirm('Are you sure want to delete this data ?');
    }
</script>