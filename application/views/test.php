
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="<?php echo(base_url('assets/jquery-2.1.4.min.js')) ?>"></script>
	<script src="<?php echo(base_url('assets/loader/jquery-loader.js')) ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo(base_url("assets/loader/loader-style.css")) ?>">
	<script type="text/javascript">
	$(document).ready(function() {
		$('#save').click(function() {
		/*url:url of our function which is required 
		  form_id: form id is unique id of form which is required
		  button_id:  is optional paremeter ,our function assumed 
					that if we call save function then id should 
					be save otherwise we have to pass save button id*/
			if(save('test/save','save_form'))
			{
				$(":text").val("");
			}

			//update('test/update','save_form',12);
		});
		
	});
</script>
</head>
<body>
	<form action="" method="POST" role="form" id="save_form">
		<legend>Form title</legend>
		<div class="form-group">
			<label for="">label</label>
			<input type="text" name="name" class="form-control" id="name" placeholder="Input field">
			<span></span>
		</div>
		<button type="button" class="btn btn-primary" id="save">Save</button>
	</form>
</body>
</html>

<script type="text/javascript">
		//function for save form data
		function save(url,form_id,button_id='') {
			$data = {
                autoCheck:  32,
                bgOpacity: 0.8,    
                fontColor: '#000',  
                title: 'Saving.....',
                imgUrl:'<?php echo(base_url("assets/loader/images/loading32x32.gif")) ?>' 
            };
            $.loader.open($data);
			disable_button(form_id,'save',button_id);
			$.ajax({
				url: '<?php echo(site_url("'+url+'")) ?>',
				type: 'POST',
				dataType: 'json',
				data:$('#'+form_id).serialize(),
				success:function(data)
				{
					$.loader.close(true);
					enable_button(form_id,'save',button_id);
					if(data.status==true)
                    {
                        alert(data.message);
                        return true;
                    }
                    else
                    {
                        $.each(data, function(index, val) {
                             $('#'+form_id+' #'+val.error_string).next().html(val.input_error);
                            $('#'+form_id+' #'+val.error_string).parent().parent().addClass('has-error');
                        });
                        return false;
                    }
				},
				error:function(data)
				{
					enable_button(form_id,'save',button_id);
					$.loader.close(true);
					display_errors(data);
					return false;
				}
			});
		}
		//function for update form data
		function update (url,form_id,id,button_id='') {

			disable_button(form_id,'update',button_id);

			$.ajax({
				url: '<?php echo(site_url("'+url+'")) ?>'+'/'+id,
				type: 'POST',
				dataType: 'json',
				data:$('#'+form_id).serialize(),
				success:function(data)
				{
					enable_button(form_id,'update',button_id);
					if(data.status==true)
                    {
                        alert(data.message);
                    }
                    else
                    {
                        
                        $.each(data, function(index, val) {
                             $('#'+val.error_string).next().html(val.input_error);
                            $('#'+val.error_string).parent().parent().addClass('has-error');
                        });
                    }
				},
				error:function(data)
				{
					enable_button(form_id,'update',button_id);
					display_errors(data);
				}
			});
		}
		//function for disable form button
		function disable_button(form_id,button_type,button_id='') 
		{
			if(button_type==='save' && button_id==='')
			{
				$('#'+form_id+' #save').prop('disabled',true);
			}
			else if(button_type==='update' && button_id==='')
			{
				$('#'+form_id+' #update').prop('disabled',true);
			}
			else if(button_type==='save' && button_id!=='')
			{
				$('#'+form_id+' #'+button_id).prop('disabled',true);
			}
			else if(button_type==='update' && button_id!=='')
			{
				$('#'+form_id+' #'+button_id).prop('disabled',true);
			}
		}
		//function for enable form button
		function enable_button(form_id,button_type,button_id='') 
		{
			if(button_type==='save' && button_id==='')
			{
				$('#'+form_id+' #save').prop('disabled',false);
			}
			else if(button_type==='update' && button_id==='')
			{
				$('#'+form_id+' #update').prop('disabled',false);
			}
			else if(button_type==='save' && button_id!=='')
			{
				$('#'+form_id+' #'+button_id).prop('disabled',false);
			}
			else if(button_type==='update' && button_id!=='')
			{
				$('#'+form_id+' #'+button_id).prop('disabled',false);
			}
		}
		//function for handling form error......display codeigniter native error into alert box
		function display_errors (data) 
		{
			var str = data.responseText;
			var pos = str.indexOf("<h4>");
			if(pos!==-1)
			{
				alert(str.slice(pos));
			}
			else
			{
				var pos = str.indexOf("<h1>");
				alert(str.slice(pos));
			}
			
		}
		
</script>

