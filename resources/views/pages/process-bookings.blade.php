@extends('layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-6 col-xs-12">
                <h1 class="page-header">
                    @if($slug == 'bookings') {{ 'Ready to Book' }} @endif
                    @if($slug == 'rfc') {{ 'Ready for Contracts' }} @endif
                    @if($slug == 'hc') {{ 'Home Contact' }} @endif
                    @if($slug == 'ipi') {{ 'Internal Phone Inquiry' }} @endif
                    @if($slug == 'sc') {{ 'Bachelorette Party' }} @endif
                    @if($slug == 'cf') {{ 'Our Boats' }} @endif
                </h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($slug == 'bookings') {{ 'Ready to Book' }} @endif
                        @if($slug == 'rfc') {{ 'Ready for Contracts' }} @endif
                        @if($slug == 'hc') {{ 'Home Contact' }} @endif
                        @if($slug == 'ipi') {{ 'Internal Phone Inquiry' }} @endif
                        @if($slug == 'sc') {{ 'Bachelorette Party' }} @endif
                        @if($slug == 'cf') {{ 'Our Boats' }} @endif
                    </div>
                    <div class="panel-body table-responsive">
                        <form class="col-sm-6 form-inline" method="get" action="{{ url('/ready-bookings') }}">
                            <div class="form-group">
                                <select class="form-control input-lg" name="sort">
                                    <option value="desc" @if($sort == 'desc') selected @endif>DESC</option>
                                    <option value="asc" @if($sort == 'asc') selected @endif>ASC</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info btn-mail" type="submit" value="Sort">
                            </div>
                        </form>
                        <br>
                        <br>
                        <br>
                        <table class="table table-hover clearfix data-table">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Submit Time</th>
                                <th>Full Name</th>
                                <th>Date Req.</th>
                                <th>Total Budget</th>
                                <th># of Guests</th>
                                <th>1st Choice</th>
				<th>2nd Choice</th>
				<th>3rd Choice</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; ?>
                            @foreach($data as $d)
                                @foreach($d->form_data as $fd)
                                    @if($fd->key == 'status' && $fd->value == 'sent')
                                        <tr class="clickable" data-toggle="modal" data-target="#myModalpr{{ $d->sn_no }}">
                                            <td>{{ $i++ }}</td>
                                            <td>{{ date('Y-m-d H:i A', strtotime($d->created_at)) }}</td>
                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>
                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>
                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>
                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'no-of-guests') {{ $fd->value }} @endif @endforeach</td>
                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }}@endif @endforeach</td> 
					<td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }}@endif @endforeach</td> 

					<td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }}@endif @endforeach</td> 

                                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'status') {{ $fd->value }} @endif @endforeach</td>
                                            <td><a href="{{ url('/ready-bookings/'.$d->sn_no) }}"><button class="btn btn-info btn-offer">Go for Inquiry</button></a></td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ $data->links() }}
            </div>
        </div>


        <div class="col-sm-12">
            <p class="back-link">© 2018. All rights reserved</p>
        </div>
    </div><!--/.row-->
    </div>	<!--/.main-->

@endsection