@extends('layout')

@section('content')



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">



        <div class="row">

            <div class="col-lg-12">

                <h1 class="page-header">Boats</h1>

            </div>

        </div><!--/.row-->



        <div class="row">

            <div class="col-lg-6">

                @include('includes.messages')

            </div>

        </div><!--/.row-->



        <div class="row">

            <div class="col-lg-4">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Add a Boat

                    </div>

                    <div class="panel-body">

                        <form method="post" action="{{ url('/boats') }}">

                            {{ csrf_field() }}

                            <div class="form-group">

                                <input type="text" name="name" class="form-control" placeholder="Enter Boat Name" autofocus="" required="" value="{{ old('name') }}">

                            </div>

                            <div class="form-group">

                                <input type="text" name="owner" class="form-control" placeholder="Enter Boat Owner" required="" value="{{ old('owner') }}">

                            </div>

                            <div class="form-group">

                                <input type="email" name="email" class="form-control" placeholder="Enter Owner's E-mail" required="" value="{{ old('email') }}">

                            </div>

                            <div class="form-group">

                                <input type="text" name="phone" class="form-control" placeholder="Enter Owner's Phone #" required="" value="{{ old('phone') }}">

                            </div>
			
				<div class="form-group">

                                <input type="text" name="boat_rep" class="form-control" placeholder="Boat Representative" required="" value="{{ old('boat_rep') }}">

                            </div>

			<div class="form-group">

                                <input type="text" name="boat_rep_email" class="form-control" placeholder="Boat Representative Email" required="" value="{{ old('boat_rep_email') }}">

                            </div>

			<div class="form-group">

                                <input type="text" name="boat_rep_phone" class="form-control" placeholder="Boat Representative Phone" required="" value="{{ old('boat_rep_phone') }}">

                            </div>


                            <div class="form-group">

                                <input type="text" name="notes" class="form-control" placeholder="Enter Additional Notes (Optional)" value="{{ old('notes') }}">

                            </div>

                            <div class="form-group">

                                <input type="text" name="commission" class="form-control" placeholder="Enter Commission %" value="{{ old('commission') }}">

                            </div>

                            <div class="form-group">

                                <button type="submit" class="btn btn-info btn-lg btn-block">Add Boat</button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="col-lg-8">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        All Boats

                    </div>

                    <div class="panel-body">

                        <table class="table table-hover">

                            <thead>

                            <tr>

                                <th>No</th>

                                <th>Boat Name</th>
 				
				<th>Boat Owner</th>
 				
				<th>Boat Representative</th>

                                <th>Actions</th>

                            </tr>

                            </thead>

                            <tbody>

                            @foreach($data as $boat)

                            <tr>

                                <td>{{ $boat->id }}</td>

                                <td>{{ $boat->name }}</td>
 				
				<td>{{ $boat->owner }}</td>
  				
				<td>{{ $boat->boat_rep }}</td>

                                <td>

                                    <span class="fa fa-edit" data-toggle="modal" data-target="#myModalps{{ $boat->id }}"></span>

                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                    <span class="fa fa-remove" data-toggle="modal" data-target="#myModalD{{ $boat->id }}"></span>

                                </td>

                            </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        </div>



        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>

    </div>



@endsection