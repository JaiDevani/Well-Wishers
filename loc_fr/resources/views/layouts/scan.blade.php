<!-- Auto filling -->
@extends('layouts.app')

@section('content')
<div class="container" style="margin-left:500px; text-align:center; width:800px;">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Scanning and Auto Filling</h6>
				</div>
				<div class="ui-block-content">
					<!-- Personal Information Form  -->
					<form action="{{route('auto_fill_post')}}" method="POST" enctype="multipart/form-data">
						@csrf
						<div class="row">
							<div class="col col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="form-group label-floating">
									<label class="control-label">Upload the Form</label>
									<input type="file" name="uform" accept="image/*">
								</div>
								<button class="btn btn-secondary btn-lg full-width"  type="submit" style="width:200px; ">Upload</button>		
						</div>
					</form>
					<!-- ... end Personal Information Form  -->
				</div>
			</div>
		</div>
	</div>

@endsection



							
                            
							