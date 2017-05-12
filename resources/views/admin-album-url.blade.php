@extends('admin-layout')
@section('admin-album-url') 
	<div class="url-fon html-background">
		<div class="child-card">
			<div class="row">
				<div class="container">
				
					<div class="col s12 parent-card card card-color z-depth-3">
					
						<h4 class="url-header center text-color"> ссылка для "{{ $title }}"</h4>

						<div class="text-wrap center">
							<a href="{{ asset( '/privat/albums/' . $url )}}" class="color-text-href">{{ asset( '/privat/albums/'. $url )}}</a>
						</div>

						<div class="col s12">
							<div class="back-btn center">
								<a  href="{{ asset( '/admin/albums') }}" class="waves-effect waves-light btn-large z-depth-3"><i class="material-icons left">replay</i>вернуться</a>
							</div>
						</div>

					</div>
				</div>
			
			</div>
		</div>
	</div>
@stop