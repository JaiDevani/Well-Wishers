<!-- \member detail entry -->
<?php use App\school;?>
@extends('layouts.app')

@section('content')

<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Add teachers</h6>
				</div>
				<div class="ui-block-content">
					<!-- Personal Information Form  -->
					
					<form action="{{route('uploadTeacher')}}" method="POST">
						@csrf
						 <div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								
                            <div class="form-group label-floating">
									<label class="control-label">Name</label>
									<input class="form-control" placeholder="" type="text" value="" style="width:200%;"
                                     name="name">
							</div>

                            <div class="form-group label-floating is-empty">
                                <label class="control-label"></label>
                                <input id="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Your Email" type="email" name="email" value="{{ old('email') }}" required>
                            </div>
												
								<div class="form-group label-floating is-empty">
									<label class="control-label">Contact Number </label>
									<input class="form-control" placeholder="" name="mobile_no" type="text" style="width:200%;">
								</div> 
								
                                <div class="form-group label-floating">
									<label class="control-label">School Name</label>
									<select name="membername" required>
										@foreach((school::all()) as $u)
										<option value="{{$u->school_id}}">{{$u->name}}</option>
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