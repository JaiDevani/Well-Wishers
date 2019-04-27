<!-- Projects lists -->
<?php use App\project; ?>
@extends('layouts.app')

@section('content')

	<div class="container">
		<div class="row">
				@foreach((project::all()) as $project )
			<div class="col-lg-4">

				<!-- Product Item -->
				
				<div class="shop-product-item" style="background-color:white; border-radius:5px; padding:10px;" id="block{{$project->project_id}}">
					<div class="product-thumb">
					<img src="images/{{$project->diplay}}" alt="product">
					</div>
					<div class="product-content">
						<div class="block-title">
						<a href="66-OlympusCompanyPageMerchandiseGrid.html#" class="h5 title">{{$project->name}}</a>
						<p>{{$project->description}}</p>
						</div>	<br>	
                        <div class="block-title" style="float:right; margin-left:100px; ">
                    		<a href="#" class="btn btn-purple bg-blue"  id="more_comments" data-toggle="modal" data-target="#form_popup{{$project->project_id}}" style="cursor:pointer;">Donate!</a>
						</div>
					</div>
				</div>
				
				<!-- ... end Product Item -->
				<div class="modal fade" id="form_popup{{$project->project_id}}" tabindex="-1" role="dialog" aria-labelledby="form_popup" aria-hidden="true">
					<div class="modal-dialog window-popup form_popup" role="document" style="width:500px;">
						<div class="modal-content">
							<a href="03-Newsfeed.html#" class="close icon-close" data-dismiss="modal" aria-label="Close">
								<svg class="olymp-close-icon"><use xlink:href="{{asset('svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
							</a>
							<div class="modal-header">
								<h6 class="title">Amount details</h6>
							</div>
				
							<div class="modal-body">
								<ul class="comments-list style-2" id="comment_list">
										<li class="comment-item" id="comment_m">
											<form action="{{route('paymentpost')}}" method="POST">   
												@csrf
											<div class="post__author author vcard" style="display:inline-block;">
                                           	<h4>Project:</h4>
                                            <input class="form-control" name="project" placeholder="" type="text" value="{{$project->name}}" readonly>
                                        	<h4>Amount(₹):</h4>
                                            <input class="form-control" placeholder="" type="text" value="" name="amount">
                                            <button class="btn btn-purple bg-blue" id="more_comments" style="float:right;" type="submit">Donate</a>	
											</div>
											</form>     
										</li>
								</ul>
							</div>
						</div>
					</div>
					
				</div>
				
			</div>
			@endforeach
		</div>
	</div>
			
@endsection