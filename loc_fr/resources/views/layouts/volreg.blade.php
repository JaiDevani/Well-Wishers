<!-- volunteer registeration -->
<?php use App\school;?>
@extends('layouts.app')

@section('content')

<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Volunteer Information</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Personal Information Form  -->
					
					<form action="{{route('volunteerpostdetails')}}" method="POST">
						@csrf
						<div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
				            <div class="form-group label-floating">
									<label class="control-label">Your Occupation</label>
									<input class="form-control" name="designation" placeholder="" type="text" value="UI/UX Designer" style="width:200%;"
									>
								</div>
								
					
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">Your Birthday</label>
									<input name="datetimepicker" value="10/24/1984" />
									<span class="input-group-addon">
										<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
									</span>
								</div>
							
								<div class="form-group label-floating">
										<label class="control-label">Your Preferred WorkPlace</label>
										<select name="workplace" required>
											@foreach((school::all()) as $sc)
											   <option value="{{$sc->name}}">{{$sc->name}}</option>
											@endforeach
										</select>
									</div>
						
								<div class="form-group label-floating">
									<label class="control-label"> Work Duration</label>
									<input name="datetimepicker2" value="10/24/2019" />
									<span class="input-group-addon">
									<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
								 </span>
								</div> 
									<div class="form-group label-floating">
									<label class="control-label">Domain of Projects</label>
									<select name="domain" required>
  									     <option value="Education">Education</option>
    									 <option value="Women">Women Empowerment</option>
     									 <option value="Enviorment">Environment</option>
										  <option value="Senior Welfare">Senior Welfare</option>
										 
   										</select>
								</div>
								   <div class="form-group label-floating">
									<label class="control-label">Projects</label>
									<select name="projects" required>
  									     <option value="100 Smiles">100 Smiles</option>
    									 <option value="womaniya">Womaniya</option>
     									 <option value="teamchange">Team Change</option>
										  <option value="greeenschool">Green School</option>
										  <option value="hellonature">Hello Nature</option>
   										</select>
								
								</div>
					
						       
					            
					
								<div class="form-group label-floating is-empty">
									<label class="control-label">Current Education</label>
									<input class="form-control" name="education" placeholder="" type="text" style="width:200%;">
								</div>
								
								
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-secondary btn-lg full-width" style="width:500px; ">Restore all Attributes</button>
							</div>
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width" style="width:500px; ">Save all Changes</button>
							</div>
					
						</div>
					</form>
					
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>
	</div>
</div>
@endsection