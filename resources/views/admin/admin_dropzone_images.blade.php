	<div class="container">
		<input id="token" type="hidden" name="_token" value="{{{ csrf_token() }}}" />
		{{-- <input id="album_id" type="hidden"  value="{{ $album_id }}" />
		<h3 class="center"> Загрузить фотографии в  "{{ $title }}"</h3> --}}
		<div class="col s12">
			<div class="back-btn center">
				<a  href="{{ asset( '/admin/albums') }}" class="waves-effect waves-light btn-large z-depth-3"><i class="material-icons left">replay</i>вернуться</a>
			</div>
		</div>
		<div id="image-upload"  class="dropzone parent-card card teal lighten-5 z-depth-3"  ></div>	
	</div>

	<div class="row center">
		<div class="col s12">
			<h3><i class="fa fa-arrow-down"></i> Уже в альбоме <i class="fa fa-arrow-down"></i></h3>
		</div>
		@if ($instance->title)
			<h3 class="center"> Загрузить фотографии в </h3>
		@endif
{{-- 		@foreach ($images as $image)
			<div class="col s12 m4 l3 card{{ $image->id }} ">
			    <div class="thumbnail card-panel parent-card teal lighten-5 z-depth-3">
			    	<div class="row center">
				    	<p class="center">{{$image->original_file_name}}</p>
						<div class="col s12 m12 l12 add-img-max-h-p ">	
						    <img class="zoomer responsive-img edit-img-max-h" src="{{ $image->path }}"  alt="">
					    </div>
					</div>
			    </div>
			</div>
		@endforeach --}}
	</div>
	<script  src="{{asset('js/dropzone.js')}}"></script>
	<script type="text/javascript">

		Dropzone.autoDiscover = false;

		Dropzone.options.imageUpload = {

		    paramName: "image", 
		    uploadMultiple: false,
		    maxFilesize: 2, 
		    parallelUploads: 2, 
		    addRemoveLinks: true,
		    dictRemoveFile: 'Удалить',
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
		            // On successful upload do whatever :-)		         
					console.log( response );				        
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
