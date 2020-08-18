@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">Example Form</div>
    <div class="card-body card-block">
        @foreach($users as $user)
            <form action="{{URL::to('admin/users/update-users/'. $user->id )}}" method="post" class="">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <input type="text" id="username" name="username" value="{{ $user->name }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-user"></i></div>
                        <select name="select_level" id="select" class="form-control">
                            @if( $user->level == 1 )
                                <option selected value="1">admin</option>
                                <option value="0">user</option>
                            @else
                                <option value="1">admin</option>
                                <option selected value="0">user</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                        <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" readonly="">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                        <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label><input type="checkbox" name="changepass" id="change">Change password</label>
                    <div class="input-group">

                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                        <input type="password" id="password" name="password" placeholder="Password" class="form-control" disabled>
                    </div>
                </div>
                
                <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
            </form>
        @endforeach
    </div>
</div>

<script>
    $(document).ready(function(){
        $('#change').change(function(){
            if( $(this).is(":checked") ){
                $('#password').removeAttr('disabled');
            }else{
                $('#password').attr('disabled','');
            }
        })
    })    
</script>

@endsection