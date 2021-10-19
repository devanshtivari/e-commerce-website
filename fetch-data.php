<?php
$conn = mysqli_connect("localhost", "root", "", "products");
          
// Check connection
if($conn === false){
    die("ERROR: Could not connect. " 
        . mysqli_connect_error());
}

$db=$conn;
// fetch query
function fetch_data(){
 global $db;
  $query="SELECT * from items ORDER BY stars DESC";
  $exec=mysqli_query($db, $query);
  if(mysqli_num_rows($exec)>0){
    $row= mysqli_fetch_all($exec, MYSQLI_ASSOC);
    return $row;  
        
  }else{
    return $row=[];
  }
}
$fetchData= fetch_data();
show_data($fetchData);
function show_data($fetchData){
 if(count($fetchData)>0){
      $sn=1;
      foreach($fetchData as $data){ 
  echo '<div class="card m-1" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">'.$data['name'].'</h5>
    <h6 class="card-subtitle mb-2 text-muted">'.$data['price'].'</h6>
    <p class="card-text">'.$data['description'].'</p>
    <h6 class="card-subtitle mb-2 text-muted">'.$data['order_date'].'</h6>
    <h6 class="card-subtitle mb-2 text-muted">'.$data['stars'].'</h6>
  </div>
</div>';
       
  $sn++; 
     }
}else{
     
  echo "<tr>
        <td colspan='7'>No Data Found</td>
       </tr>"; 
}
  echo "</table>";
}
?>