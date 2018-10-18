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

            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Requested">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>Requested<br><span class="badge badge-info">{{ $stat1 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Made Contact - Waiting">
                            <button class="btn btn-info btn-lg btn-block btn-load">Made<br>Contact -<br>Waiting<br><span class="badge badge-info">{{ $stat2 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Invited Captains">
                            <button class="btn btn-info btn-lg btn-block btn-load">Invited<br>Captains<br><span class="badge badge-info">{{ $stat3 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Gave Client Availability">
                            <button class="btn btn-info btn-lg btn-block btn-load">Gave<br>Client<br>Availability<br><span class="badge badge-info">{{ $stat4 }}</span></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Sold">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>Sold<br><span class="badge badge-info">{{ $stat5 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form method="get" action="{{ url('/bookings/'.$link) }}">
                            <input type="hidden" name="sort" value="{{ $sort }}">
                            <input type="hidden" name="status" value="Dead">
                            <button class="btn btn-info btn-lg btn-block btn-load"><br>Dead<br><span class="badge badge-info">{{ $stat6 }}</span><br></button>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        @if($slug == 'rb') {{ 'Ready to Book' }} @endif

                        @if($slug == 'rfc') {{ 'Ready for Contracts' }} @endif

                        @if($slug == 'hc') {{ 'Home Contact' }} @endif

                        @if($slug == 'ipi') {{ 'Internal Phone Inquiry' }} @endif

                        @if($slug == 'sc') {{ 'Bachelorette Party' }} @endif

                        @if($slug == 'cf') {{ 'Our Boats' }} @endif

                    </div>

                    <div class="panel-body table-responsive">

                        <form class="col-sm-6 form-inline" method="get" action="{{ url('/bookings/'.$link) }}">

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

                        <a class="pull-right" href="{{ url('/excel/download/'.$slug) }}"><button class="btn btn-info btn-mail"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;Export Excel</button></a>

                        <br>

                        <br>

                        <br>

                        <table class="table table-hover clearfix data-table">

                            <thead>

                            @if($slug == 'rfc')

                                <tr>

                                    <th>No</th>

                                    <th>Lead #</th>

                                    <th>Submit Time</th>

                                    <th>Full Name</th>

                                    <th>1st Choice</th>

                                    <th>Date Req.</th>

                                    <th>Total Budget</th>

                                    <th># of Guests</th>

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

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->sn_no }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">{{ date('m-d-Y H:i A', strtotime($d->created_at)) }}</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'status') {{ $fd->value }} @endif @endforeach</td>

                                    <td><a href="{{ url('/bookings/details/'.$d->sn_no) }}"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-remove" data-toggle="modal" data-target="#delete-item{{ $d->sn_no }}"></i></td>

                                </tr>

                            @endforeach

                            @else

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

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->sn_no }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">{{ date('m-d-Y H:i A', strtotime($d->created_at)) }}</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }} @endif @endforeach</td>

                                    <td class="link-go" rel="{{ $d->sn_no }}">@foreach($d->form_data as $fd) @if($fd->key == 'status') {{ $fd->value }} @endif @endforeach</td>

                                    <td><a href="{{ url('/bookings/details/'.$d->sn_no) }}"><i class="fa fa-folder-open"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-remove" data-toggle="modal" data-target="#delete-item{{ $d->sn_no }}"></i></td>

                                </tr>

                            @endforeach

                                @endif

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





        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>

    </div><!--/.row-->

    </div>	<!--/.main-->



    @endsection