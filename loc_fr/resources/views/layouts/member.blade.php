<!-- \member detail entry -->
<?php use App\Temp_User;?>
@extends('layouts.app')

@section('content')

<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Member Details</h6>
				</div>
				<div class="ui-block-content">

					
					<!-- Personal Information Form  -->
					
					<form action="{{route('uploadData')}}" method="POST">
						@csrf
						 <div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								
                            <div class="form-group label-floating">
									<label class="control-label">Designation</label>
									<input class="form-control" placeholder="" type="text" value="UI/UX Designer" style="width:200%;"
                                     name="designation">
                                     <div class="form-group date-time-picker label-floating">
									<label class="control-label">Your Birthday</label>
									<input name="birth_date" value="10/24/1984" />
									<span class="input-group-addon">
										<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
									</span>
								</div>
							</div>

								<div class="form-group label-floating">
										<label class="control-label">Location:</label>
										<select name="branch" required>
									    	<option value="M.G. Road, Goregaon west">M.G. Road, Goregaon west</option>
											<option value="Malad West">Malad West</option>
											<option value="Borivali West">Borivali West</option>
											<option value="Charni Road East">Charni Road East</option>			 
										</select>
								</div> 
												
								<div class="form-group label-floating is-empty">
									<label class="control-label">Salary</label>
									<input class="form-control" placeholder="" name="salary" type="text" style="width:200%;">
								</div>
                                <div class="form-group label-floating">
									<label class="control-label">Join Date</label>
									<input  value="10/24/2019"  name="join_date"/>
									<span class="input-group-addon">
									<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
								 </span>
								</div>
								<div class="form-group label-floating">
									<label class="control-label">Up to Date</label>
									<input name="datetimepicker" value="10/24/2019"  name="work_duration"/>
									<span class="input-group-addon">
									<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
								 </span>
                                </div>  
								
                                <div class="form-group label-floating">
									<label class="control-label"> Member Name</label>
									<select name="membername" required>
										@foreach((Temp_User::where('type','Member')->get()) as $user)
										<option value="{{$user->name}}">{{$user->name}}</option>
										@endforeach			 
   									</select>
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