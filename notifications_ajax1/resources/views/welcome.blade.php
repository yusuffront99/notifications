<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<title>Bootstrap AJax Notify</title>
	</head>
<body>
	<nav class="navbar navbar-default">
    <div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">yusuffront99</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="label label-pill label-danger count" style="border-radius:10px;"></span> <span class="glyphicon glyphicon-globe" style="font-size:18px;"></span></a>
				<ul class="dropdown-menu"></ul>
			</li>
		</ul>
    </div>
	</nav>
	<div style="height:10px;"></div>
	<div class="row">	
		<div class="col-md-3">
		</div>
		<div class="col-md-6 well">
			<div class="row">
                <div class="col-lg-12">
                    <center><h2 class="text-primary">PHP Fb-like Notification using AJAX Bootstrap</h2></center>
					<hr>
				<div>
					<form class="form-inline" method="POST" id="add_form">
						<div class="form-group">
							<label>Firstname:</label>
							<input type="text" name="firstName" id="firstName" class="form-control">
						</div>
						<div class="form-group">
							<label>Lastname:</label>
							<input type="text" name="lastName" id="lastName" class="form-control">
						</div>
						<div class="form-group">
							<input type="submit" name="addnew" id="addnew" class="btn btn-primary" value="Add">
						</div>
					</form>
				</div>
                </div>
            </div><br>
			<div class="row">
			<div id="userTable"></div>
			</div>
		</div>
		<div class = "col-md-3">
		</div>
	</div>
</body>
<script type = "text/javascript">
$(document).ready(function(){
 
	function unsen_notif(view = '')
	{
		$.ajax({
			url:"fetch.php",
			method:"POST",
			data:{view:view},
			dataType:"json",
			success:function(data)
			{
			$('.dropdown-menu').html(data.notification);
			if(data.unseen_notification > 0){
			$('.count').html(data.unseen_notification);
			}
			}
		});
	}
 
	unsen_notif();
 
	$('#add_form').on('submit', function(event){
		event.preventDefault();
		if($('#firstName').val() != '' && $('#lastName').val() != ''){
		var form_data = $(this).serialize();
		$.ajax({
			url:"addnew.php",
			method:"POST",
			data:form_data,
			success:function(data)
			{
			$('#add_form')[0].reset();
			unsen_notif();
			}
		});
		}
		else{
			alert("Enter Data First");
		}
	});
 
	$(document).on('click', '.dropdown-toggle', function(){
	$('.count').html('');
	unsen_notif('yes');
	});
 
	setInterval(function(){ 
		unsen_notif();; 
	}, 5000);
 
});
</script>
</html>