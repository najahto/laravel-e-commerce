@if(count($errors->all()))
	<ul class="list-group" style="padding: 5px 25px 25px">
	    @foreach($errors->all() as $error)
	        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
	    @endforeach
	</ul>  
@endif