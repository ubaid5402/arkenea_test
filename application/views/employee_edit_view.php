<!DOCTYPE html>
<html>
<head>
    <title> Add Employee </title>
</head>
<body>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">    
            
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Update Employee</div>
            </div>  
            <div class="panel-body" >
                    <form  class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo base_url('employee/edit/'.$emp_by_id->emp_id) ?>">
                        <div id="div_id_username" class="form-group required">
                            <label for="name" class="control-label col-md-4  requiredField"> Full Name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="name" maxlength="30" name="name" placeholder="Your name" style="margin-bottom: 10px" type="text" value="<?php echo set_value('name',$emp_by_id->emp_name) ?>" />
                                <span class="text-danger"><?php echo form_error('name') ?></span>
                            </div>
                        </div>
                        <div id="div_id_email" class="form-group required">
                            <label for="email" class="control-label col-md-4  requiredField"> E-mail<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="email" name="email" placeholder="Your email address" style="margin-bottom: 10px" type="text" value="<?php echo set_value('email',$emp_by_id->emp_email) ?>" />
                                <span class="text-danger"><?php echo form_error('email') ?></span>
                            </div>     
                        </div>
                        <div id="div_id_name" class="form-group required"> 
                            <label for="phone" class="control-label col-md-4  requiredField"> Phone<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <input class="input-md textinput textInput form-control" id="phone" name="phone" placeholder="Your Phone Number" maxlength="10" style="margin-bottom: 10px" type="text" value="<?php echo set_value('phone',$emp_by_id->emp_phone) ?>" />
                                <span class="text-danger"><?php echo form_error('phone') ?></span>
                            </div>
                        </div>
                        <div id="div_id_name" class="form-group required"> 
                            <label for="phone" class="control-label col-md-4  requiredField"> Address<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8 "> 
                                <textarea class="input-md textinput textInput form-control" id="address" name="address" placeholder="Your Address"style="margin-bottom: 10px" /><?php echo set_value('address',$emp_by_id->emp_address) ?></textarea>
                                <span class="text-danger"><?php echo form_error('address') ?></span>
                            </div>
                        </div>
                        <div id="div_id_company" class="form-group required"> 
                            <label for="dob" class="control-label col-md-4  requiredField"> DOB<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="dob" name="dob" placeholder="dd-mm-yyyy" readonly style="margin-bottom: 10px" type="text" value="<?php echo set_value('dob',$emp_by_id->emp_dob) ?>" />
                                 <span class="text-danger"><?php echo form_error('dob') ?></span>
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="image" class="control-label col-md-4  requiredField"> Image<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="image" name="image" placeholder="skills catagory" style="margin-bottom: 10px" type="file" />
                                 <span class="text-danger"><?php echo form_error('image') ?></span>
                                 <span class="text-danger"><?php echo isset($file_error) ? $file_error : "" ?></span>
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="image" class="control-label col-md-4  requiredField"> </label>
                            <div class="controls col-md-8 ">
                            <img style="width: 20%" class="img-thumbnail" src="<?php echo base_url() ?>uploads/image/<?php echo $emp_by_id->emp_image ?>">
                            <input type="hidden" name="old_image" value="<?php echo $emp_by_id->emp_image ?>">
                            </div>
                        </div>
                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Save" class="btn btn-primary btn btn-info" id="submit-id-signup" />
                            </div>
                        </div> 
                            
                    </form>
            </div>
        </div>
    </div> 
</div>

<script type="text/javascript">
    $("#dob").datepicker({
        format: 'dd-mm-yyyy',
        endDate: '+0d',
        autoclose: true
    });
</script>

</body>
</html>    