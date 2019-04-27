<!-- project detials -->
@extends('layouts.app')

@section('content')

<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Project Details</h6>
				</div>
				<div class="ui-block-content">
					<!-- Personal Information Form  -->
					
					<form action="{{route('projectpost')}}" method="POST" enctype='multipart/form-data'>
						@csrf
						<div class="row">
					
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								
					            <div class="form-group label-floating">
									<label class="control-label">Project Name</label>
									<input class="form-control" name="projectname" placeholder="" type="text" value="UI/UX Designer" style="width:200%;"
									>
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
								
								<div class="form-group date-time-picker label-floating">
									<label class="control-label">DATE</label>
									<input name="datetimepicker" value="10/24/1984" />
									<span class="input-group-addon">
										<svg class="olymp-month-calendar-icon icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-month-calendar-icon"></use></svg>
									</span>
								</div>
							

								<div class="form-group label-floating">
									<label class="control-label">Display Image</label>
                                    <input type="file" accept="image/*" name="display" />
								</div>

								<div class="form-group label-floating">
									<label class="control-label">Description</label>
                                    <textarea name="description" cols="30" rows="5">Something about the project..</textarea>
								</div>
							 
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<button class="btn btn-primary btn-lg full-width" style="width:500px;" type="submit">Add Project</button>
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