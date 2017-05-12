@extends('admin-layout')
@section('admin-album-view')
	<div class="row center "> 
		<h4 class=" text-color ">  {{ $title }} </h4>
		<div class="col s12 all-parent-card">
			@foreach ($images as $image)
		
				  	<div class="col s12 l4 m6">
				  		<div class="parent-card lighten-2 z-depth-5 card-color">
						  	<div class="row center inner-card">
							  	<div class="col s12">

								<div class="col s12 card-img-parent">
							  		<img data-id="{{ $image->id }}" class="img{{ $image->id }} img-prev responsive-img card-img-max-heigth" src="{{ $image->path }}" data-url="{{ $image->path }}" > 
							    	
							  	</div>
							    	
										<div class="input-field col s12">
										
       
								          	<input  id="d{{ $image->id }}" data-id="{{ $image->id }}" 
								          	 		 data-url="{{ $image->path }}"  id="description-img-{{ $image->id }}" 
								          	 		 type="text" 
								          	 		 class="input-grey validate text-color description{{ $image->id }} description" 
								          	 		 value="{{$image->description}}" >
								          	<label class="label{{ $image->id }}"for="d{{ $image->id }}">comment</label>
								        </div>
								</div>

								<div class="col s12">

								    @if ($image->confirmed == 1)
									  
								    	<a data-id="{{ $image->id }}" class="confirmed-btn confirmed-btn{{$image->id}} waves-effect waves-light btn on da">{{trans('interface.yes')}}<i class="material-icons right">done</i></a>

							        	<a data-id="{{ $image->id }}" class="not-confirmed-btn not-confirmed-btn{{ $image->id }} waves-effect waves-light btn off not">Нет &nbsp; &nbsp;<i class="fa fa-times"></i></a>

									@elseif ($image->confirmed == 2)

									  
									    <a data-id="{{ $image->id }}" class="confirmed-btn confirmed-btn{{ $image->id }} waves-effect waves-light btn off da">{{trans('interface.yes')}}<i class="material-icons right">done</i></a>

									    <a data-id="{{ $image->id }}" class="not-confirmed-btn not-confirmed-btn{{ $image->id }} waves-effect waves-light btn on not">Нет &nbsp; &nbsp;<i class="fa fa-times"></i></a>
									@else
									   
									   <a data-id="{{ $image->id }}" class="confirmed-btn confirmed-btn{{ $image->id }} waves-effect waves-light btn off da">{{trans('interface.yes')}}<i class="material-icons right">done</i></a>

									    <a data-id="{{ $image->id }}" class="not-confirmed-btn not-confirmed-btn{{ $image->id }}  waves-effect waves-light btn  off not">Нет &nbsp; &nbsp;<i class="fa fa-times"></i></a>
									@endif
							    </div> 	
							       
							    
						    </div>
					    </div>
				    </div>
			@endforeach
		</div>

			{{-- view --}}	
			<tbody>
				<table id="FixedBlack">
				    <tr>
				      <td class="my-no-padding">
						 		<div id="view" class="card-color on z-depth-4 row center" >

						 			<div class="col s12 hide-on-med-and-up" >

										{{--buttons--}}
										<div id="small-nav-buttons" class="row n-m-b">
								 			<div  class="col s4 back"> 
												<a class="nav-color-btn waves-effect waves-light btn view-btn-s">
													<i class="fa fa-chevron-left"></i>
												</a>
											</div>

											<div class="col s4 exit"> 
												<a class="nav-color-btn waves-effect waves-light btn view-btn-s">
													<i class="prefix fa fa-times"></i>
												</a>
											</div>

											<div class="col s4 view-img"> 
												<a class="nav-color-btn waves-effect waves-light btn view-btn-s">
													<i class="fa fa-chevron-right"></i>
												</a>
											</div>
										</div>
							
										<div class="col s12 m12 l12 img-parent-h-s" style="  text-align: center;">
											<img class="view-img responsive-img img-max-h-s" data-id="" style="vertical-align: middle;">
										</div>

										<div id = "small-elements" class="col s12 parent-view"></div>
									</div>			

									{{-- large  --}}
									<div class="col s12 hide-on-small-only">

									<div class="col s12 abs">

										<div class="exit xx"> 
											<a class="nav-color-btn waves-effect waves-light btn view-btn ">
												<i class="prefix fa fa-times"></i>
											</a>
										</div>


							 			<div class="back ll"> 
											<a class="nav-color-btn waves-effect waves-light btn view-btn ">
												<i class="fa fa-chevron-left"></i>
											</a>
										</div>


										<div class="next rr"> 
											<a class="nav-color-btn waves-effect waves-light btn view-btn ">
												<i class="fa fa-chevron-right"></i>
											</a>
										</div>
									</div>	
							

										<div id="parent-img"class="col s12 m12 l12 img-parent-h" style="text-align: center;">
											<img class="view-img responsive-img img-max-h" data-id="" style="vertical-align: middle;">
										</div>

										<div id = "elements" class="col  s10 offset-s1 parent-view"></div>
									</div>

								</div>
				    	</td>
				    </tr>
				</table>
			</tbody>	 
	</div>

		<script type="text/javascript">
		$(document).ready(function(){

			// переключение по скролу
			var device=false;
			function iOS() {

			  var iDevices = [
			    'iPad Simulator',
			    'iPhone Simulator',
			    'iPod Simulator',
			    'iPad',
			    'iPhone',
			    'iPod'
			  ];

			  while (iDevices.length) {
			    if (navigator.platform === iDevices.pop()){ return device = true; }
			  }

			  return device = false;
			}


			$('#FixedBlack').on('mousewheel', '#view', function (e) {
				if(!device) {

					if (e.deltaY>0) {
				        next();
				    } else {
				        previous();
				    }
				    e.preventDefault();
				}
	
			});

//			console.log(navigator.platform);

			size = function () {
				var vWidth = $(window).width();
				var vHeight = $(window).height();
				var viewHeight = $('#view').height();
				var viewWidth = $('#view').width();

				
				var smallNavButtons = $('#small-nav-buttons').height();
				var elementsHeights = $('#small-elements').height();
				var elementsHeight = $('#elements').height();
				var xxWidth = $('.xx').width();

				var heightParentImg = viewHeight - elementsHeight-vHeight*0.02;
				var heightImg = viewHeight - elementsHeight;
				var heightParentImgs = viewHeight - elementsHeights- smallNavButtons;
				var heigImgs = (viewHeight - elementsHeights- smallNavButtons)*1.05;

				$('.xx').css({ 'margin-left': ((viewWidth-xxWidth)*0.94)+'px' })

				$('.img-parent-h').css( {'line-height':heightParentImg+'px'} );
				$('.img-parent-h').css( {'height':heightImg+'px'} );
				$('.img-max-h').css( {'max-height':heightImg+'px', 'margin-top':(vHeight*0.02)+'px' } );

				$('.img-parent-h-s').css( {'line-height':heightParentImgs+'px'} );
				$('.img-parent-h-s').css( {'height':heightParentImgs+'px'} );
				$('.img-max-h-s').css( {'max-height':heigImgs+'px', 'margin-top':(vHeight*0.01)+'px' } );	
			};

				$(".exit").click(function() {
					$("#FixedBlack").fadeOut(500); 
					$(".parent-view").empty();
					$('body').css({'overflow':'visible'});
				});

				//создание массива
				var all_array_ids=[];
				$('.description').each(function() {
					all_array_ids.push($(this).data('id'));
				});
			
				ajaxconfirm = function ( confirm, description,id ) {

	                var data = {'user_edit':1, 'confirmed': confirm, 'description': description, 'id':id };
//					console.log ('данные улетели',data);

	                $.ajax({
	                    type: "POST",
	                    url : "/image/confirmed",
	                    data : data,
	                    headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
	                    success : function(data){
	                    	var id=data.id;
	                    	var confirmed=data.confirmed;

	                    	if(confirmed == 1) {
								$('.confirmed-btn'+id).removeClass("off");
								$('.confirmed-btn'+id).addClass("on");
								$('.view-confirmed-btn').removeClass("off");
								$('.view-confirmed-btn').addClass("on");
								$('.not-confirmed-btn'+id).removeClass("on");
								$('.not-confirmed-btn'+id).addClass("off");
								$('.view-not-confirmed-btn').removeClass("on");
								$('.view-not-confirmed-btn').addClass("off");

							}
							else if(confirmed  == 2) {
								$('.confirmed-btn'+id).removeClass("on");
								$('.confirmed-btn'+id).addClass("off");
								$('.view-confirmed-btn').removeClass("on");
								$('.view-confirmed-btn').addClass("off");
								$('.not-confirmed-btn'+id).removeClass("off");
								$('.not-confirmed-btn'+id).addClass("on");
								$('.view-not-confirmed-btn').removeClass("off");
								$('.view-not-confirmed-btn').addClass("on");
							}
							else {
								console.log('а нахуя?');
							}
	                    }
	                },"json");
				};

				// события по description
        		$(document).on('focusout', '.description',function(){
        			var id =  $(this).data('id');
        			var description = $(this).val();
        			if ( $('.confirmed-btn'+id).hasClass( 'off') ) {
        				var confirm = 2;
        			}
        			else {
        				var confirm = 1;
        			};
        			ajaxconfirm( confirm, description, id );
        		});
        		$(document).on('focusout', '.view-description',function(){
					var id =  $(this).data('id');
        			var description =  $(this).val();
        			
        			if (description=='') {
        				$('.description'+id).val(description);
        				$('.label'+id).removeClass('active');
        			} else {
        				$('.description'+id).val(description);	
        				$('.label'+id).addClass('active');
        			};
        			
        			
        			if ( $('.confirmed-btn'+id).hasClass( 'off') ) {
        				var confirm = 2;
        			}
        			else {
        				var confirm = 1;
        			};
        			ajaxconfirm( confirm, description, id );
        		});

				//confirmed-btn
				$(document).on('click', '.confirmed-btn',function(){
					console.log('klick confirmed-btn');
					if ( $(this).hasClass( 'off' )) {
						var id =  $(this).data('id');
        				var confirm=1;
        				var description = $('.description'+id).val();
        				ajaxconfirm(confirm,description,id );
					} 
					else {
						var id =  $(this).data('id');
        				var confirm=2;
        				var description = $('.description'+id).val();
        				ajaxconfirm( confirm, description,id );
					};	
				});

				//not-confirmed-btn
				$(document).on('click', '.not-confirmed-btn',function(){
					
					if ( $(this).hasClass( 'off' )) {
						var id =  $(this).data('id');
        				var confirm=2;
        				var description = $('.description'+id).val();
        				ajaxconfirm(confirm,description,id );
					} 
					else {
						var id =  $(this).data('id');
        				var confirm=1;
        				var description = $('.description'+id).val();
        				ajaxconfirm( confirm, description,id );
					};	
				});

				//view-confirmed-btn
				$(document).on('click', '.view-confirmed-btn',function(){
					
					if ( $(this).hasClass( 'off' )) {
						var id =  $(this).data('id');
        				var confirm=1;
        				var description = $('.view-description').val();
        				ajaxconfirm(confirm, description, id );
					} 
					else {
						var id =  $(this).data('id');
        				var confirm=2;
        				var description = $('.view-description').val();
        				ajaxconfirm( confirm, description, id );
					};	
				});

				//view-not-confirmed-btn
				$(document).on('click', '.view-not-confirmed-btn',function(){
					
					if ( $(this).hasClass( 'off' )) {
						var id =  $(this).data('id');
        				var confirm=2;
        				var description = $('.description'+id).val();
        				ajaxconfirm(confirm,description,id );
					} 
					else {
						var id =  $(this).data('id');
        				var confirm=1;
        				var description = $('.description'+id).val();
        				ajaxconfirm( confirm, description,id );
					};	
				});

			//создание view
			$('.all-parent-card').on('click', '.img-prev',function(){
				var id=$(this).data('id');
				var description = $('.description'+id).val();
				var url = $('.img'+id).data('url');

				var vWidth = $(window).width();
				var vHeight = $(window).height();

				$('#FixedBlack').width(vWidth);
				$('#FixedBlack').height(vHeight);

				$('#view').width(vWidth);
				$('#view').height(vHeight*0.98);


				$('body').css({'overflow':'hidden'});
				$("#FixedBlack").fadeIn('slow');
				$("#view").fadeIn('slow');
	      		$(".view-img").fadeIn('slow'); 

				$('.view-img').attr("src", url);
				$('.view-img').data('id', id);		

				$('.parent-view').append('<div class=\"view-input-field input-field col s12\"><input  data-id=\"'+id+'\"  type=\"text\" class=\"input-grey text-color view-description validate\" value=\"'+description+'\"></div>');

				if ( $('.confirmed-btn'+id).hasClass( 'off') ) {
					$('.parent-view').append('<a data-id=\"'+id+'\" class=\"view-confirmed-btn waves-effect waves-light btn  off da\"><i class=\"material-icons right\">done</i>{{trans('interface.yes')}}</a>');
				}
				else {
					$('.parent-view').append('<a data-id=\"'+id+'\" class=\"view-confirmed-btn waves-effect waves-light btn  on da\"><i class=\"material-icons right\">done</i>{{trans('interface.yes')}} </a>');
				};

				if ( $('.not-confirmed-btn'+id).hasClass( 'off') ) {
					$('.parent-view').append('<a data-id=\"'+id+'\" class=\"view-not-confirmed-btn waves-effect waves-light btn  off not\">{{trans('interface.no')}} &nbsp; &nbsp;<i class=\"fa fa-times\"></i></a>');
				}
				else {
					$('.parent-view').append('<a data-id=\"'+id+'\" class=\"view-not-confirmed-btn waves-effect waves-light btn  on not\">{{trans('interface.no')}} &nbsp; &nbsp;<i class=\"fa fa-times\"></i></a>');
				};

				size();
			
			});

			// реайз вьюхи
			$(window).resize(function() {
				var vWidth = $(window).width();
				var vHeight = $(window).height();
				$('#FixedBlack').width(vWidth);
				$('#FixedBlack').height(vHeight);
				$('#view').width(vWidth);
				$('#view').height(vHeight*0.96);
				size();
			});


			
		
			// круговое переключение вперед
			$(document).on('click', '.view-img',function() {
				next();
			});

            $(document).keydown(function(e){
                if(e.keyCode == 37) {
                    previous();
                }
                if(e.keyCode == 39) {
                    next();
                }
            });

			$(document).on('click', '.next' ,function() {
				next();
			});

			// круговое переключение назад
			$(document).on('click', '.back',function() {
				previous();
			});



			next = function () {
				var id=$('.view-img').data('id');
				var index=all_array_ids.indexOf(id);
				id=all_array_ids[index];
				
				if (id==all_array_ids[all_array_ids.length-1]) {
					id=all_array_ids[0];
				}
				else {
					id=all_array_ids[index+1];	
				}
				
				var src = $('.img'+id).attr('src');
				$('.view-img').data('id',id);
				$('.view-img').attr('src',src);
				$('.view-description').val( $('.description'+id).val() );
				$('.view-description').data('id',id);

				if ( $('.confirmed-btn'+id).hasClass( 'off') ) {
					$('.view-confirmed-btn').removeClass("on");
					$('.view-confirmed-btn').addClass("off");
		       		$('.view-confirmed-btn').data('id',id);	
				}
				else {
					$('.view-confirmed-btn').removeClass("off");
					$('.view-confirmed-btn').addClass("on");
					$('.view-confirmed-btn').data('id',id);	
				};

				if ( $('.not-confirmed-btn'+id).hasClass( 'off') ) {
					$('.view-not-confirmed-btn').removeClass("on");
					$('.view-not-confirmed-btn').addClass("off");
					$('.view-not-confirmed-btn').data('id',id);
				}
				else {
					$('.view-not-confirmed-btn').removeClass("off");
					$('.view-not-confirmed-btn').addClass("on");
					$('.view-not-confirmed-btn').data('id',id);
				};

			};

				previous = function () {
					var id=$('.view-img').data('id');
					var index=all_array_ids.indexOf(id);
					id=all_array_ids[index];

					if (id==all_array_ids[0]) {
						id=all_array_ids[all_array_ids.length-1];
					}
					else {
						id=all_array_ids[index-1];
					}
					
					var src = $('.img'+id).attr('src');
					$('.view-img').data('id',id);
					$('.view-img').attr('src',src);
					$('.view-description').val( $('.description'+id).val() );
					$('.view-description').data('id',id);

					if ( $('.confirmed-btn'+id).hasClass( 'off') ) {
						$('.view-confirmed-btn').removeClass("on");
						$('.view-confirmed-btn').addClass("off");
			       		$('.view-confirmed-btn').data('id',id);	
					}
					else {
						$('.view-confirmed-btn').removeClass("off");
						$('.view-confirmed-btn').addClass("on");
						$('.view-confirmed-btn').data('id',id);	
					};

					if ( $('.not-confirmed-btn'+id).hasClass( 'off') ) {
						$('.view-not-confirmed-btn').removeClass("on");
						$('.view-not-confirmed-btn').addClass("off");
						$('.view-not-confirmed-btn').data('id',id);
					}
					else {
						$('.view-not-confirmed-btn').removeClass("off");
						$('.view-not-confirmed-btn').addClass("on");
						$('.view-not-confirmed-btn').data('id',id);
					};
				};		
		});
	</script>
@stop