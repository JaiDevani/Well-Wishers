<!-- school details by admin -->
@extends('layouts.app')

@section('content')

<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">School Information</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Personal Information Form  -->
					<form action="{{route('uploadSchool')}}" method="POST">
					
						@csrf
						<div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								
					            <div class="form-group label-floating">
									<label class="control-label">School Name</label>
									<input class="form-control" name="name" placeholder="" type="text" value="" style="width:200%;"
									>
								</div>
							
								<div class="form-group label-floating">
									<label class="control-label">Email</label>
									<input class="form-control" name="email" type="email" placeholder=""  value="" style="width:200%;">
								</div>
								<div class="form-group label-floating">
									<label class="control-label" style="font-size:15px;">Address</label>
									<br>
									<br>
									
									<textarea name="address" cols="30" rows="5">Enter Address here..</textarea>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Contact No</label>
									<input class="form-control" name="contact_no" type="text" placeholder=""  value="" style="width:200%;">
								</div>
								
								
								   
					
						       
					      
								
							
					
								
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width" style="width:500px; ">Submit</button>
							</div>
					
						</div>
					
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>
	</div>
</form>

@endsection
