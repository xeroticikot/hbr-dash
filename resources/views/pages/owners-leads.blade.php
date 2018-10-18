@extends('layout')

@section('content')



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        All Owner Feedbacks

                    </div>

                    <div class="panel-body table-responsive">

                        <table class="table table-hover clearfix data-table">

                            <thead>

                            <tr>

                                <th>No</th>

                                <th>Name</th>

                                <th>Boat Name</th>

                                <th>Submit Time</th>

                                <th>Full Name</th>

                                <th>Date Requested</th>

                                <th>Time Preferred</th>

                                <th>Total Budget</th>

                                <th># Guest</th>

                                <th>Status</th>

                                <th>Winner</th>

                                <th>Details</th>

                                <th>Mail Sent Time</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php $j = 1; ?>
                            @foreach($formData as $fd)
                                <tr>
                                    <td>{{ $j++ }}</td>
                                    <td>{{ $fd->boat->name }}</td>
                                    <td>{{ $fd->owner->name }}</td>
                                    <td>{{ date('m-d-Y H:i A', strtotime($fd->created_at)) }}</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'full-name') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'date-requested') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'time-requested') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'total-budget') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'number-of-guests') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'status') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($fd->form_data as $d) @if($d->key == 'winner') {{ $d->value }} @endif @endforeach</td>
                                    <td><a href="{{ url('/bookings/details/'.$fd->req_id) }}">Details</a></td>
                                    <td>{{ date('d M Y', strtotime($fd->created_at)).' at '.date('H:i a', strtotime($fd->created_at)) }}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-sm-12">

                {{ $formData->links() }}

            </div>

        </div>

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Boat Owners

                    </div>

                    <div class="panel-body table-responsive">

                        <table class="table table-hover clearfix data-table">

                            <thead>

                            <tr>

                                <th>No</th>

                                <th>Name</th>

                                <th>Boat Name</th>

                                <th>All Leads</th>

                                <th>1st Choice Leads</th>

                                <th>2nd Choice Leads</th>

                                <th>3rd Choice Leads</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $d->name }}</td>
                                    <td>@foreach($d->boats as $boat){{ $boat->name }} <br> @endforeach</td>
                                    <td>
                                        <a href="{{ url('/owners/'.$d->id) }}">View all</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?stat=requested') }}">Requested</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?stat=Accepted') }}">Accepted</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?stat=Denied') }}">Denied</a><br>
                                    </td>
                                    <td>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=1') }}">View all</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=1&stat=requested') }}">Requested</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=1&stat=Accepted') }}">Accepted</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=1&stat=Denied') }}">Denied</a><br>
                                    </td>
                                    <td>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=2') }}">View all</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=2&stat=requested') }}">Requested</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=2&stat=Accepted') }}">Accepted</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=2&stat=Denied') }}">Denied</a><br>
                                    </td>
                                    <td>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=3') }}">View all</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=3&stat=requested') }}">Requested</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=3&stat=Accepted') }}">Accepted</a><br>
                                        <a href="{{ url('/owners/'.$d->id.'?choice=e&stat=Denied') }}">Denied</a><br>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>

    </div><!--/.row-->

    </div>	<!--/.main-->



@endsection