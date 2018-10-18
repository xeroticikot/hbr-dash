@extends('layout')

@section('content')



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        All Leads For This Boat Owner

                    </div>

                    <div class="panel-body table-responsive">

                        <table class="table table-hover clearfix data-table">

                            <thead>

                            <tr>

                                <th>No</th>

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
                            @foreach($data as $bd)
                                <tr>
                                    <td>{{ $j++ }}</td>
                                    <td>{{ $bd->boat_name }}</td>
                                    <td>{{ date('m-d-Y H:i A', strtotime($bd->created_at)) }}</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'full-name') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'date-requested') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'time-requested') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'total-budget') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'number-of-guests') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'status') {{ $d->value }} @endif @endforeach</td>
                                    <td>@foreach($bd->details as $d) @if($d->key == 'winner') {{ $d->value }} @endif @endforeach</td>
                                    <td><a href="{{ url('/lead-details/'.$bd->sn_no) }}">Details</a></td>
                                    <td>{{ date('d M Y', strtotime($bd->created_at)).' at '.date('H:i a', strtotime($bd->created_at)) }}</td>
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

                {{ $data->links() }}

            </div>

        </div>

        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>

    </div><!--/.row-->

    </div>	<!--/.main-->



@endsection