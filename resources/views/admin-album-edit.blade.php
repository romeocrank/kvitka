 @extends('admin-layout')
 @section('admin-album-edit')

	
	<div class="row center">
		<div class="container">

			<input id="token" type="hidden" name="_token" value="{{{ csrf_token() }}}" />
			<input id="album_id" type="hidden"  value="{{ $album_id }}" />

			<h4 class="text-color"> загрузить фотографии в альбом "{{ $album->title }}"</h4>

			<div class="col l4 m4 s12">
				<div class="back-btn center">
					<a  href="{{ asset( '/admin/albums') }}" class="waves-effect waves-light btn-large z-depth-3">вернуться</a>
				</div>
			</div>

			
			<div class="col l4 m4 s12">
				<div class="back-btn center">
					<a class="remove-not-confirmed waves-effect waves-light btn-large z-depth-3"> удалить отк</a>
				</div>
			</div>


			<div class="col l4 m4 s12">
				<div class="back-btn center">
					<a class="removeall waves-effect waves-light btn-large z-depth-3"> удалить все </a>
				</div>
			</div>

			<div class="col s12">
				<div id="image-upload"  class="dropzone card teal lighten-5 z-depth-3"  ></div>	
			</div>
		</div>

	
		<div class="col s12 hide-on-small-only">
			<h4 class="text-color" ><i class="fa fa-arrow-down"></i> Уже в альбоме <i class="fa fa-arrow-down"></i></h4>
		</div>

		<div class="col s12 hide-on-med-and-up">
			<p class="text-color" ><i class="fa fa-arrow-down"></i> Уже в альбоме <i class="fa fa-arrow-down"></i></p>
		</div>
	</div>
	
	<script type="text/javascript">

		Dropzone.autoDiscover = false;

		Dropzone.options.imageUpload = {

		    paramName: "image", 
		    uploadMultiple: false,
		    maxFilesize: 2, 
		    parallelUploads: 2, 
		    // addRemoveLinks: true,
		    // dictRemoveFile: 'Удалить',
		    dictFileTooBig: 'Размер изображения превышает 2MB',
		    

		    accept: function(file, done) {
		        // TODO: Image upload validation
		        done();
		    },


		    sending: function(file, xhr, formData) {
		        // Pass token. You can use the same method to pass any other values as well such as a id to associate the image with for example.
		        formData.append("_token", $('[name="_token"]').val());
		        formData.append("album_id", $('#album_id').val());
		    },

		    init: function() {
		        this.on("success", function(file, response) {

				var head = '<div class=\"col s12 m6 l4 card'+response.id+'\"><div class=\"parent-card grey darken-2  z-depth-3\"><div class=\"row center n-m-b\"><p class=\"center\">'+response.original_file_name+'</p><div class=\"col s12 m12 l12 edit-img-max-h-p \"><a class=\"zoom\" data-url=\"'+response.path+'\" ><img class=\"zoomer responsive-img edit-img-max-h\" src=\"'+response.path+'\"></a></div>';

				if ( response.type == 0) {
					if (response.confirmed==1) {
						var pconf = '<p class=\"conf center n-m-b\"> Одобрена <i class=\"fa fa-check-square-o\"></i> </p>';
					} else if (response.confirmed==2) {
						var pconf =   '<p class=\"conf center n-m-b\"> Отклонена <i class=\"fa fa-times\"></i> </p>';
					} else {
						var pconf = '<p class=\"conf center n-m-b\" style=\"color:red\"> <i class=\"fa fa-exclamation-circle\"></i> не рассмотрена  <i class=\"fa fa-exclamation-circle\"></i></p>';
					}
				} else {
					var pconf ='';
				};

				if (response.description) {
					var center = '<div class=\"col s12\"><div class=\"input-alone\"><input  data-id=\"'+response.id+'\" value=\"'+response.description+'\" type=\"text\" class=\"text-color validate form-control description validate\"></div></div><a  data-id=\"'+response.id+'\"  data-name=\"'+response.original_file_name+'\" class=\"btn btn-cover center btn-remove\">Удалить</a>';
				} else {
					var center = '<div class=\"col s12\"><div class=\"input-alone\"><input  data-id=\"'+response.id+'\" value=\"\" type=\"text\" class=\"text-color validate form-control description validate\"></div></div><a  data-id=\"'+response.id+'\"  data-name=\"'+response.original_file_name+'\" class=\"btn btn-cover center btn-remove\">Удалить</a>';
				}
			
				if (response.id===response.cover) {
					var coverbtn = '<a  data-id=\"'+response.id+'\" data-album=\"'+response.album_id+'\" data-name=\"'+response.original_file_name+'\" class=\"bbt btn btn-cover center teal lighten-1 bbt \">Обложка <i class=\"fa fa-check\"></i></a>';
				} else {
					var coverbtn = '<a  data-id=\"'+response.id+'\" data-album=\"'+response.album_id+'\" data-name=\"'+response.original_file_name+'\" class=\"bbt btn btn-cover center teal lighten-4 bbt \">Обложка </a>';
				}

				var end = '</div></div></div>';
				$('.exist').prepend(head+pconf+center+coverbtn+end); 
		    });

	        this.on("removedfile", function(file) {
				$.ajax({
	                type: 'POST',
	                headers: {
						 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
	                url: '/image/remove_photo',
	                data: {file_name: file.name},
	                dataType: 'html',
	                success: function(data){
	                    var rep = JSON.parse(data);
	                    if(rep.code == 200)
	                    {
	                        photo_counter--;
	                        $("#photoCounter").text( "(" + photo_counter + ")");
	                    }
	 
	                }
	            });
			});
		    }
		};

		var myDropzone = new Dropzone("#image-upload", {
	    	url: '/image/save_photo'
		});
		
	</script>



	<div class="row exist">
		@foreach ($images as $image)
			<div class="col s12 m6 l4 card{{ $image->id }} ">
			    <div class="parent-card  card-color lighten-2 z-depth-3">
			    	<div class="row center n-m-b">
				    	<p class="center">{{$image->original_file_name}}</p>
						<div class="col s12 m12 l12 edit-img-max-h-p ">
					    	<a class="zoom" data-url="{{ $image->path }}" >
						      	<img class="zoomer responsive-img edit-img-max-h" src="{{ $image->path }}"  alt="">
						    </a>
					    </div>
					  
						@if (!$album->type)
						  	@if ($image->confirmed == 1)
							    <p class="conf center n-m-b" style="color:greenyellow; font-weight:bold;"  data-id="{{ $image->id }}" data-name="{{ $image->original_file_name}}" data-confirmed="{{$image->confirmed }}"> Одобрена <i class="fa fa-check-square-o"></i> </p>
							@elseif ($image->confirmed == 2)
							    <p class="conf center n-m-b" style="color:red; font-weight:bold;" data-id="{{ $image->id }}" data-name="{{ $image->original_file_name}}" data-confirmed="{{$image->confirmed }}"> Отклонена <i class="fa fa-times"></i> </p>
							@else
							   <p class="conf center n-m-b" style="color:orange; font-weight:bold;" data-id="{{ $image->id }}" data-name="{{ $image->original_file_name}}" data-confirmed="{{$image->confirmed }}"> <i class="fa fa-exclamation-circle"></i> не рассмотрена  <i class="fa fa-exclamation-circle"></i></p>
							@endif
						@endif
						
						
						<div class="col s12">
							<div class="input-alone">
								<input  data-id="{{ $image->id }}" value="{{$image->description}}" type="text" class="validate form-control description validate">
							</div>
					
						</div>
						
					
							<a  data-id="{{ $image->id }}"  data-name="{{ $image->original_file_name}}" class="btn center btn-remove">Удалить</a>

							@if ($image->id === $album->cover)
								<a  data-id="{{ $image->id }}" data-album="{{ $image->album_id }}" data-name="{{ $image->original_file_name}}" class="btn center btn-cover teal lighten-1">Обложка <i class="fa fa-check"></i></a>
							@else
								<a  data-id="{{ $image->id }}"  data-album="{{ $image->album_id }}" data-name="{{ $image->original_file_name}}" class="btn center btn-cover teal lighten-4">Обложка </i> </a>
							@endif
					
					</div>

			    </div>
			</div>
		@endforeach
	</div>

		<div id="modal-img-view" class="modal">
		    <div class="modal-content">	
	      		<p class="center no-margin">
	      		    <img class="responsive-img admin-img-view" >
	      		</p> 
		    </div>
	    </div>

		<tbody id="parent">
			<table id="FixedBlack"></table>
		</tbody>

		<script type="text/javascript">
			$(document).ready(function(){
				$(document).on('click','.zoom', function() {
					var vWidth = $(window).width();
					var vHeight = $(window).height();
					$('#FixedBlack').width(vWidth);
					$('#FixedBlack').height(vHeight);
					

					if (vWidth>768) {
						$("#FixedBlack").fadeIn('slow');
						$('#modal-img-view').openModal();
					    $('.admin-img-view').attr('src', $(this).data('url') );
				    };
				});

				$("#FixedBlack").on("click", function() {
					$('#modal-img-view').closeModal();
					
				 	$("#FixedBlack").fadeOut(500); 	
				});

				$(document).on('click', '.btn-remove',function() {
					var name =  $(this).data('name');
					var id =  $(this).data('id');
					ajaxremove( name, id );

				});

				$(document).on('focusout','.description', function() {
					var description = $(this).val();
					var id =  $(this).data('id');
					ajaxdescription( description, id );
				});

				ajaxdescription = function ( description, id ) { 
			        var data = { 'description':description, 'id':id}
					console.log ('данные улетели',data);
		            $.ajax({
		                type: "POST",
		                url : "/image/confirmed",
		                data : data,
		                headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
		                success : function(data) {		               	
		                	var id = data.id
		                	console.log('description_id=',id);
		                }
		            },"json");
				};

				ajaxremove = function ( name, id ) { 
			        var data = { 'file_name':name, 'id':id}
					console.log ('данные улетели',data);
		            $.ajax({
		                type: "POST",
		                url : "/image/remove_photo",
		                data : data,
		                headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
		                success : function(data) {		               	
		                	var id = data.id;
		                	$('.card'+id).fadeOut('slow');
		                }
		            },"json");
				};



				// удалить все
				$(document).on('click','.removeall',function() {
					$('.btn-remove').each(function() {
						var name =  $(this).data('name');
						var id =  $(this).data('id');
						ajaxremove( name, id );
					});	
				});

				//удалить отклоненные
				$(document).on('click','.remove-not-confirmed',function() {

					$('.conf').each(function() {

						if ( $(this).data('confirmed') === 2) {
							console.log(this);
							var name =  $(this).data('name');
							var id =  $(this).data('id');
							ajaxremove( name, id );
						};
					});	
				});

				//обложка
				$(document).on('click', '.btn-cover' ,function() {
					var img_id = $(this).data('id');
					var album_id = $(this).data('album');
					ajaxcover(album_id, img_id);
				});

				ajaxcover = function ( album_id, img_id) { 
			        var data = { 'album_id': album_id, 'cover_id':img_id }
					console.log ('данные улетели',data);
		            $.ajax({
		                type: "POST",
		                url : "/album/cover_of_album",
		                data : data,
		                headers: {
				            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				        },
		                success : function(data) {		               	
		                	var id = data.id;
		                	console.log(data);
		              
		                	$( '.btn-cover' ).each(function() {
		     					$(this).empty();

		     					if ( $(this).data('id')==id ) {
		     						console.log( 'v ife',$(this).data('id') );
		                			$(this).removeClass('lighten-4');
		                			$(this).addClass('lighten-1');
		                			$(this).html('Обложка <i class="fa fa-check"></i>');
		                		}
		                		else {
			                		$(this).removeClass('lighten-1');
			                		$(this).addClass('lighten-4');
			                		$(this).html('Обложка <i class="fa fa-times"></i>');
		                		}	
		            		});
		                }
		            },"json");
				};
			});
		</script>

@stop