@extends('layout')

@section('content')



    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">



        <div class="row">

            <div class="col-lg-12">

                <h1 class="page-header">Home - All Leads</h1>

            </div>

        </div><!--/.row-->

        <div class="row">
            <div class="col-sm-12">
                @include('includes.messages')
            </div>
        </div>

        @if(Auth::check() && Auth::user()->role != 'other')

        <div class="row">

            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Requested">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>1. Requested<br><span class="badge badge-info">{{ $stat1 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Made Contact - Waiting">
                            <button class="btn btn-info btn-lg btn-block btn-load">2. Made<br>Contact -<br>Waiting<br><span class="badge badge-info">{{ $stat2 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Invited Captains">
                            <button class="btn btn-info btn-lg btn-block btn-load">3. Invited<br>Captains<br><span class="badge badge-info">{{ $stat3 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Gave Client Availability">
                            <button class="btn btn-info btn-lg btn-block btn-load">4. Gave<br>Client<br>Availability<br><span class="badge badge-info">{{ $stat4 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Sold">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>5. Sold<br><span class="badge badge-info">{{ $stat5 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/') }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Dead">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>9. Dead<br><span class="badge badge-info">{{ $stat6 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>



        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        All Web Database Inquiries - {{ $status }}

                    </div>

                    <div class="panel-body table-responsive">

                        <form class="col-sm-6 form-inline" method="get" action="{{ url('/') }}">

                            <div class="form-group">

                                <select class="form-control input-lg" name="sort">

                                    <option value="desc" @if($sort == 'desc') selected @endif>DESC</option>

                                    <option value="asc" @if($sort == 'asc') selected @endif>ASC</option>

                                </select>

                            </div>

                            <div class="form-group">
                                <input type="hidden" name="status" value="{{ $status }}">
                                <input class="btn btn-info btn-mail" type="submit" value="Sort">

                            </div>

                        </form>

                        <a class="pull-right" href="{{ url('/excel/download/all') }}"><button class="btn btn-info btn-mail"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Export Excel</button></a>

                        <br>

                        <br>

                        <br>

                        <table class="table table-hover clearfix data-table">

                            <thead>

                            <tr>

                                <th>No</th>

                                <th>Lead #</th>

                                <th>Submit Time</th>

                                <th>Full Name</th>

                                <th>Date Req.</th>

                                <th>Total Budget</th>

                                <th># of Guests</th>

                                <th>1st Choice</th>
				
                                <th>2nd Choice</th>

                                <th>3rd Choice</th>

                                <th>Status</th>

                                <th>Actions</th>

                            </tr>

                            </thead>

                            <tbody>

                            <?php $i = 1; ?>

                            @foreach($data as $d)
                                <tr class="clickable link-gos{{ $d->sn_no }}" data-href="{{ url('/bookings/details/'.$d->sn_no) }}">

                                    <td>{{ $i++ }}</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'full-name') {{ $fd->sn_no }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">{{ date('m-d-Y H:i A', strtotime($d->created_at)) }}</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->lead_data as $fd) @if($fd->key == 'status') {{ $fd->value }} @endif @endforeach</td>

                                    <td><a href="{{ url('/bookings/details/'.$d->sn_no) }}"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-remove" data-toggle="modal" data-target="#delete-item{{ $d->sn_no }}"></i></td>

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

                {{ $data->appends(['sort' => $sort, 'status' => $status])->links() }}

            </div>

        </div>

        @else

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">

                        <div class="panel-heading">

                            All Leads

                        </div>

                        <div class="panel-body table-responsive">
                            <table class="table table-hover clearfix data-table">

                                <thead>

                                <tr>

                                    <th>No</th>

                                    <th>Submit Time</th>

                                    <th>Full Name</th>

                                    <th>Date Req.</th>

                                    <th>Total Budget</th>

                                    <th># of Guests</th>

                                    <th>Actions</th>

                                </tr>

                                </thead>

                                <tbody>

                                <?php $i = 1; ?>

                                @foreach($data as $d)

                                    @foreach($d->lead_data as $fd)
                                        @if($fd->key == 'status' && !in_array($fd->value, ['Sold', 'Dead']))
                                            <tr class="clickable link-gos{{ $d->req_id }}" data-href="{{ url('/lead-details/'.$d->req_id) }}">

                                                <td>{{ $i++ }}</td>

                                                <td class="link-go" rel="{{ $d->req_id }}">{{ date('m-d-Y H:i A', strtotime($d->created_at)) }}</td>

                                                <td class="link-go" rel="{{ $d->req_id }}">@foreach($d->lead_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>

                                                <td class="link-go" rel="{{ $d->req_id }}">@foreach($d->lead_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>

                                                <td class="link-go" rel="{{ $d->req_id }}">@foreach($d->lead_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>

                                                <td class="link-go" rel="{{ $d->req_id }}">@foreach($d->lead_data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</td>

                                                <td><a href="{{ url('/lead-details/'.$d->req_id) }}"><i class="fa fa-folder-open"></i></a></td>

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

            @endif

        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>

    </div>	<!--/.main-->



    @endsection