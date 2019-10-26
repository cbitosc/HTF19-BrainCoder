<?php
$t='m';
$table='member';
$editPath='./view/MemberEditBox.php';
$insertPath='./view/MemberInsertBox.php';
include_once('./view/head.php');
?>

<button type="button" class="btn btn-info" style="margin-bottom:10px;" onclick="insert()">+新增</button>
<div class="form-inline float-right">
<div class="form-group">
    <label for="field" style="padding-right:10px;" ></label>
    <select class="form-control" id="field">
      <option value="0">ID</option>
      <option value="1">class<option>
      <option value="2">password</option>
      <option value="3">name</option>
      <option value="4">birth</option>
      <option value="5">tel</option>
      <option value="6">address</option>
    </select>
  </div>

<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="searchValue">
<button class="btn btn-outline-success my-2 my-sm-0" onclick="search()">Search</button>
</div>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">class</th>
      <th scope="col">password</th>
      <th scope="col">name</th>
      <th scope="col">birth</th>
      <th scope="col">tele</th>
      <th scope="col">address</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

  <?php 
  $i=0;
  
  if(isset($datas)){
    foreach($datas as $data){
      $pass="";
      for($j=0;$j<strlen($data['Password']);$j++){
        $pass.='*';
      }
  ?>
   <tr>
      <td id="id_<?php echo $i?>"><?php echo $data['M_ID'];?></td>
      <td id="acc_<?php echo $i?>"><?php echo $data['Account'];?></td>
      <td><input type="password" class=" pass_label" id="pass_<?php echo $i?>" value="<?php echo $data['Password'];?>" disabled > 
</td>
      <td id="name_<?php echo $i?>"><?php echo $data['M_Name'];?></td>
      <td id="birth_<?php echo $i?>"><?php echo $data['Birthday'];?></td>
      <td id="tel_<?php echo $i?>"><?php echo $data['M_tel'];?></td>
      <td id="add_<?php echo $i?>" style="overflow:hidden"><?php echo $data['M_Address'];?></td>
      <td>
        <button type="button" class="btn btn-dark " onclick="edit(<?php echo $i?>)"><i class="fas fa-pencil-alt"></i></button>
      <button type="button" class="btn btn-danger" onclick="del(<?php echo $data['M_ID']?>)"><i class="fas fa-trash-alt"></i></button>
    </td>
    </tr>

  <?php
     $i++;}
  }else{?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
    </div>

  
  <?php } ?>
   
  </tbody>
</table>




<script>
function edit(id){
 
  document.getElementById('id no').innerText=document.getElementById('id_'+id).innerText;
  document.getElementById('class').value=document.getElementById('clas_'+id).innerText;
  document.getElementById('password').value=document.getElementById('pass_'+id).value;
  document.getElementById('name').value=document.getElementById('name_'+id).innerText;
  document.getElementById('birth').value=document.getElementById('birth_'+id).innerText;
  document.getElementById('tel').value=document.getElementById('tel_'+id).innerText;
  document.getElementById('address').value=document.getElementById('add_'+id).innerText;
  openModal();
 
} 
</script>
<style>
.pass_label{
  background-color:white;
  border:none;
  max-width:5vw;
}
td:hover>pass_label:hover{
  background-color:transparent;
}
.pass_label:hover{
  background-color:transparent;
}
</style>
<?php include_once('./view/footer.php');?>