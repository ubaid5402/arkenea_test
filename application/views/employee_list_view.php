<!DOCTYPE html>
<html>
   <head>
      <title> Employee List </title>
   </head>
   <body>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
      <script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <div class="container">
      <div class="row">
      <div class="col-md-12">
      <h4>Employee List</h4><br>
      <div class="table-responsive">
      <a class="btn btn-success" href="<?php echo base_url('employee/add') ?>">+ Add Employee</a><br><br>
      <table id="myTable" class="table table-bordred">
         <thead>
            <th>Employee Id</th>
            <th>Employee Name</th>
            <th>Employee Email</th>
            <th>Employee Address</th>
            <th>Employee DOB</th>
            <th>Employee Phone</th>
            <th>Employee Image</th>
            <th>Edit</th>
            <th>Delete</th>
         </thead>
         <tbody>
         	<?php foreach ($get_employee as $key => $value) { ?>
            <tr>
            	<td><?php echo $value->emp_id ?></td>
            	<td><?php echo $value->emp_name ?></td>
            	<td><?php echo $value->emp_email ?></td>
            	<td><?php echo $value->emp_address ?></td>
            	<td><?php echo $value->emp_dob ?></td>
            	<td><?php echo $value->emp_phone ?></td>
            	<td><img style="width: 20%" class="img-thumbnail" src="<?php echo base_url() ?>uploads/image/<?php echo $value->emp_image ?>"></td>
            	<td><a class="btn btn-success" href="<?php echo base_url('employee/edit/'.$value->emp_id) ?>">Edit</a></td>
            	<td><a onclick="return delete_data()" class="btn btn-danger" href="<?php echo base_url('employee/delete/'.$value->emp_id) ?>">Delete</a></td>
            </tr>
        	<?php } ?>
         </tbody>
      </table>
      <script type="text/javascript">
            $('#myTable').DataTable({
            	language: {
			        searchPlaceholder: "Search employee name"
			    }
            });

            function delete_data(){
            var status = confirm("Do you really want to delete");

            if(status){
            	return true;
            }else{
            	return false;
            }
        	}

      </script>
   </body>
</html>