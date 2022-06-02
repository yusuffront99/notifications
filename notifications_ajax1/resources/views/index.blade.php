<!DOCTYPE html>
<html lang = "en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<meta name="csrf-token" content="{{csrf_token()}}">
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
							<label>Name:</label>
							<input type="text" name="name" id="name" class="form-control">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
						<div class="form-group m-2">
							<label>Report:</label>
							<textarea type="text" name="report" id="report" class="form-control"></textarea>
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
	$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


	function unsen_notif(view = '')
	{
		$.ajax({
			url:"fetch",
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
		if($('#name').val() != '' && $('#email').val() != '' && $('#report').val() !='')
		{
		var form_data = $(this).serialize();
		$.ajax({
			url:"store",
			method:"POST",
			data:form_data,
			success:function(data)
				{
					console.log(data.message);
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