@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">Example Form</div>
    <div class="card-body card-block">
    	@if( count($errors) > 0 )
    	<div class="alert alert-danger">
    		@foreach( $errors->all() as $err )
    			{{$err}}<br>
    		@endforeach
    	</div>
    	@endif

    	<?php 
            $message = Session::get('message');
            if ($message) {
                echo '<span>'. $message .'</span>';
                Session::put('message', null);
            }
         ?>
    </div>
        <form action="{{URL::to('admin/users/save-users')}}" method="post" class="">
        	{{csrf_field()}}
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                    <input type="email" id="email" name="email" placeholder="Email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                    <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                    <input type="password" id="password" name="password" placeholder="Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
            	<div class="input-group">
	                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                    <select name="select_level" id="select" class="form-control">
                            <option value="1">admin</option>
                            <option value="0">user</option>
                    </select>
	            </div>
            </div>
            <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
        </form>
    </div>
</div>

@endsection