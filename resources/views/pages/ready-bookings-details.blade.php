@extends('layout')
@section('content')

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <h1 class="page-header">Lead Details</h1>
            </div>
            <div class="col-lg-12 col-xs-12">
                @include('includes.messages')
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        User Info
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Full Name : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>E-mail : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'email') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>Phone : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'phone') {{ $fd->value }} @endif @endforeach</span>
                        </div>
   <div class="form-group">
                            <label>1st Choice : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>2nd Choice : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }} @endif @endforeach</span>               
                        </div>

			            <div class="form-group">
                            <label>3rd Choice : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }} @endif @endforeach</span>                          
				        </div>
			<div class="form-group">
                            <button class="btn btn-info btn-offer" data-toggle="modal" data-target="#send-mail-client"><i class="fa fa-envelope"></i>  &nbsp;&nbsp;Send E-mail</button>
                        </div>
                                            </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Booking Info
                    </div>
                    <div class="panel-body">
                    	<div class="form-group">
                            <label>Submit Time : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'total-budget') {{ date('m-d-Y H:i A', strtotime($fd->created_at)) }} @endif @endforeach</span>
                        </div>
			<div class="form-group">
                            <label>Requested Date : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>Preferred Time : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'time-requested') {{ $fd->value }} @endif @endforeach</span>
                        </div>
			<div class="form-group">
                            <label>Total Budget : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        
                        <div class="form-group">
                            <label># of guests : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label># of adults : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'number-of-adults') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label># of children : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'number-of-children') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>Departure Port : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'departure-port-requested') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                                         </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Additional Info
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label>Itinerary Req. : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'itinerary-requested') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>Previous Experience : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'previous-experience') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                        <div class="form-group">
                            <label>Additional Notes : </label>
                            <span>@foreach($data as $fd) @if($fd->key == 'additional-notes') {{ $fd->value }} @endif @endforeach</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Invite Boat Owners
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/change-status') }}">
                            {{ csrf_field() }}
                        <div class="form-group">
                            <label>HBR Notes :</label>
                            <input class="form-control" type="text" name="our_notes" placeholder="Our Notes">
                        </div>
                        <div class="form-group">
                            <label>Primary Communication Via :</label>
                            <select class="form-control" name="com_via">
                                <option value="phone">Phone</option>
                                <option value="email">E-mail</option>
                                <option value="text">Text</option>
                            </select>
                        </div>
                            @foreach($data as $fd)
                                @if($fd->key == 'boat-choice1')
                                    @if($fd->value != '')
                                        @foreach($boats as $boat)
                                            @if($boat->id.'. '.$boat->name == $fd->value)
                                                <div class="breadcrumb">
                                                <div class="form-group">
                                                    <label><span class="fa fa-ship"></span>&nbsp; Choice #1 : {{ $fd->value }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                    <br>
                                                    <button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps{{ $boat->id }}"><span class="fa fa-envelope"></span> &nbsp; @if($sent_mails->isNotEmpty()) @foreach($sent_mails as $sm) @if($sm->boat_id == $boat->id) {{ 'E-mail Again' }} @else {{ 'Send E-mail' }} @endif @endforeach @else {{ 'Send E-mail' }} @endif</button>
                                                </div>
                                            @if(in_array($boat->id, $offer_boats))
                                                <div class="form-group">
                                                    <label>Agreement Status : <span class="@foreach($offers as $oo) @if($oo->user_id == $boat->id) @if($oo->status == 'Accepted') {{ 'text-success' }} @else {{ 'text-danger' }} @endif @endif @endforeach">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->status }} @endif @endforeach</span></label>
                                                    <br>
                                                    <label>Additional Notes : <span class="text-info">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->ad_notes }} @endif @endforeach</span></label>
                                                </div>
                                                @endif
                                                </div>
                                                <hr>
                                                @endif
                                        @endforeach
                                    @endif
                                @endif
                                @if($fd->key == 'boat-choice2')
                                    @if($fd->value != '')
                                            @foreach($boats as $boat)
                                                @if($boat->id.'. '.$boat->name == $fd->value)
                                                    <div class="breadcrumb">
                                                    <div class="form-group">
                                                        <label><span class="fa fa-ship"></span>&nbsp; Choice #2 : {{ $fd->value }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                        <br>
                                                        <button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps{{ $boat->id }}"><span class="fa fa-envelope"></span> &nbsp; @if($sent_mails->isNotEmpty()) @foreach($sent_mails as $sm) @if($sm->boat_id == $boat->id) {{ 'E-mail Again' }} @else {{ 'Send E-mail' }} @endif @endforeach @else {{ 'Send E-mail' }} @endif</button>
                                                    </div>
                                                    @if(in_array($boat->id, $offer_boats))
                                                        <div class="form-group">
                                                            <label>Agreement Status : <span class="@foreach($offers as $oo) @if($oo->user_id == $boat->id) @if($oo->status == 'Accepted') text-success @else text-danger @endif @endif @endforeach">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->status }} @endif @endforeach</span></label>
                                                            <br>
                                                            <label>Additional Notes : <span class="text-info">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->ad_notes }} @endif @endforeach</span></label>
                                                        </div>
                                                    @endif
                                                    </div>
                                                    <hr>
                                                    @endif
                                            @endforeach
                                    @endif
                                @endif
                                @if($fd->key == 'boat-choice3')
                                    @if($fd->value != '')
                                            @foreach($boats as $boat)
                                                @if($boat->id.'. '.$boat->name == $fd->value)
                                                    <div class="breadcrumb">
                                                    <div class="form-group">
                                                        <label><span class="fa fa-ship"></span>&nbsp; Choice #3 : {{ $fd->value }}&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                                        <br>
                                                        <button type="button" class="btn btn-info btn-offer" data-toggle="modal" data-target="#myModalps{{ $boat->id }}"><span class="fa fa-envelope"></span> &nbsp; @if($sent_mails->isNotEmpty()) @foreach($sent_mails as $sm) @if($sm->boat_id == $boat->id) {{ 'E-mail Again' }} @else {{ 'Send E-mail' }} @endif @endforeach @else {{ 'Send E-mail' }} @endif</button>
                                                    </div>
                                                    @if(in_array($boat->id, $offer_boats))
                                                        <div class="form-group breadcrumb">
                                                            <label>Agreement Status : <span class="@foreach($offers as $oo) @if($oo->user_id == $boat->id) @if($oo->status == 'Accepted') text-success @else text-danger @endif @endif @endforeach">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->status }} @endif @endforeach</span></label>
                                                            <br>
                                                            <label>Additional Notes : <span class="text-info">@foreach($offers as $oo) @if($oo->user_id == $boat->id) {{ $oo->ad_notes }} @endif @endforeach</span></label>
                                                        </div>
                                                    @endif
                                                    </div>
                                                    <hr>
                                                    @endif
                                            @endforeach
                                    @endif
                                @endif
                            @endforeach
                            <br>
                        <div class="form-group">
                            <label>Make Own Inquiry :</label>
                            <div class="input-group">
                                <select class="form-control input-lg" name="invite_boat" id="change-boat">
                                    @foreach($boats as $boat)
                                        <option value="{{ $boat->id }}">{{ $boat->name }}</option>
                                    @endforeach
                                </select>
                                <span class="input-group-btn">
                                    <button type="button" id="send-mail" class="btn btn-info btn-mail" data-toggle="modal" data-target="#myModalps1"><span class="fa fa-envelope"></span> &nbsp; Send E-mail</button>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label>Status :</label>
                            <select class="form-control input-lg" name="status">
                                <option value="Requested" @if($fd->key == 'status' && $fd->value == 'Requested') selected @endif>Requested</option>
                                <option value="Made Contact - Waiting" @if($fd->key == 'status' && $fd->value == 'Made Contact - Waiting') selected @endif>Made Contact - Waiting</option>
                                <option value="Invited Captains" @if($fd->key == 'status' && $fd->value == 'Invited Captains') selected @endif>Invited Captains</option>
                                <option value="Gave Client Availability" @if($fd->key == 'status' && $fd->value == 'Gave Client Availability') selected @endif>Gave Client Availability</option>
                                <option value="Sold" @if($fd->key == 'status' && $fd->value == 'Sold') selected @endif>Sold</option>
                                <option value="Dead" @if($fd->key == 'status' && $fd->value == 'Dead') selected @endif>Dead</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="req_id" value="@if($fd->key == 'status') {{ $fd->sn_no }} @endif">
                            <button class="btn btn-info btn-offer pull-right" type="submit">Make Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Payments
                    </div>
                    <div class="panel-body">
                        <form>

<div class="form-group">
                            <label>Winner of Client :</label>
                            <select class="form-control input-lg" name="winner" id="change-boat">
                                @foreach($boats as $boat)
                                    <option value="{{ $boat->id }}">{{ $boat->owner }} - {{ $boat->name }}</option>
                                @endforeach
                            </select>
                        </div>
   <div class="form-group">


                                <label>Date Booked :</label>
                                <input class="form-control" type="datetime" name="date_booked">
                            </div>  
                            <div class="form-group">
                                <label>Total Hours :</label>
                                <input class="form-control" type="number" name="total_hours" min="4" placeholder="4">
                            </div>
				
					<div class="form-group">
                                <label>Base $ Rate For Time :</label>
                                <input class="form-control" type="number" name="base_rate">
                            </div>
				<div class="form-group">
                                <label>Fuel $ :</label>
                                <input class="form-control" type="number" name="fuel_rate">
                            </div>

				<div class="form-group">
                                <label>Gratuity :</label>
                                <input class="form-control" type="number" name="gratuity_rate">
                            </div>
				
				<div class="form-group">
                                <label>APA :</label>
                                <input class="form-control" type="number" name="apa">
                            </div>


                            <div class="form-group">
                                <label>Total Commissionable :</label>
                                <input class="form-control" type="text" name="total_commission" placeholder="Total Commissionable">
                            </div>
                            <div class="form-group">
                                <label>Commission Rate :</label>
                                <input class="form-control" type="number" name="commission_rate">
                            </div>
                            <div class="form-group">
                                <label>Total Earned :</label>
                                <input class="form-control" type="text" name="total_earned" placeholder="Total Earned">
                            </div>
				                                 
			                <div class="form-group">
                                <label>Date Paid :</label>
                                <input class="form-control" type="datetime" name="date_paid">
                            </div>
                            
                            <div class="form-group">
                                <label>Auto-update Calender :</label>
                                <input class="form-control" type="text" name="update_calender" placeholder="Auto-update Calender">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-info btn-offer pull-right" type="submit">Save Payments</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-12">

            <p class="back-link">© 2018. All rights reserved</p>

        </div>
    </div>

    @endsection