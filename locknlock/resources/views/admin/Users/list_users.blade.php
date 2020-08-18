@extends('admin_layout')
@section('content')

<div class="card">
    <div class="card-header">
        <strong class="card-title">Basic Table</strong>
    </div>
    <div class="card-body">
        <?php 
            $message = Session::get('message');
            if ($message) {
                echo '<span>'. $message .'</span>';
                Session::put('message', null);
            }
         ?>
        <table class="table">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Name</th>
                    <th width="25%">Email</th>
                    <th width="20%">Phone</th>
                    <th width="5%">Level</th>
                    <th width="15%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $key => $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    @if( $user->level == 1)
                        <td>admin</td>
                    @else
                        <td>user</td>
                    @endif
                    <td>
                        <button type="submit">
                            <a href="{{URL::to('admin/users/edit-users/'.$user->id)}}" title="">Edit</a>
                        </button>
                        <button type="submit">
                            <a onclick="return confirm('Are you sure?')" href="{{URL::to('admin/users/delete-users/'.$user->id)}}" title="">Delete</a>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop