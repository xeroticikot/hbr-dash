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
                        <div class="form-group">
                            <label>HBR Notes Regarding Customer : </label>
                            <textarea name="ex_notes" placeholder="HBR Notes Regarding Customer" cols="16" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-offer pull-right">Add Note</button>
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
                                <option value="">.....</option>
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
                                    <option value="">.....</option>
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
                            <button type="button" class="btn btn-info btn-delete" data-toggle="modal" data-target="#delete-item">Delete</button>
                            <button class="btn btn-info btn-offer pull-right" type="submit">Make Changes</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Booking + Payments Details
                    </div>
                    <div class="panel-body">
                        <form method="post" action="{{ url('/payment') }}">
                            {{ csrf_field() }}

<div class="form-group">
                            <label>Winner of Client :</label>
                            <select class="form-control input-lg" name="winner" id="change-boat" @if(!empty($payment)) {{ 'disabled'  }} @endif>
                                <option value="">.....</option>
                                @foreach($boats as $boat)
                                    <option value="{{ $boat->id }}" @if(!empty($payment) && $payment->winner == $boat->id) {{ 'selected' }} @endif>{{ $boat->owner }} - {{ $boat->name }}</option>
                                @endforeach
                            </select>
                        </div>
   <div class="form-group">


                                <label>Date Booked :</label>
                                <input class="form-control" type="datetime" name="date_booked" @if(!empty($payment)) value="{{ $payment->date_booked }}" readonly @endif>
                            </div>  
                            <div class="form-group">
                                <label>Total Hours :</label>
                                <input class="form-control" type="number" name="total_hour" min="4" placeholder="4" @if(!empty($payment)) value="{{ $payment->total_hour }}" readonly @endif>
                            </div>
				
					<div class="form-group">
                                <label>Base $ Rate For Time :</label>
                                <input class="form-control" type="number" name="base_rate" @if(!empty($payment)) value="{{ $payment->base_rate }}" readonly @endif>
                            </div>
				<div class="form-group">
                                <label>Fuel $ :</label>
                                <input class="form-control" type="number" name="fuel" @if(!empty($payment)) value="{{ $payment->fuel }}" readonly @endif>
                            </div>

				<div class="form-group">
                                <label>Gratuity :</label>
                                <input class="form-control" type="number" name="gratuity" @if(!empty($payment)) value="{{ $payment->gratuity }}" readonly @endif>
                            </div>
				
				<div class="form-group">
                                <label>APA :</label>
                                <input class="form-control" type="number" name="apa" @if(!empty($payment)) value="{{ $payment->apa }}" readonly @endif>
                            </div>


                            <div class="form-group">
                                <label>Total Commissionable :</label>
                                <input class="form-control" type="text" name="total_com" placeholder="Total Commissionable" @if(!empty($payment)) value="{{ $payment->total_com }}" readonly @endif>
                            </div>
                            <div class="form-group">
                                <label>Commission Rate :</label>
                                <input class="form-control" type="number" name="com_rate" @if(!empty($payment)) value="{{ $payment->com_rate }}" readonly @endif>
                            </div>
                            <div class="form-group">
                                <label>Total Earned :</label>
                                <input class="form-control" type="text" name="total_earn" placeholder="Total Earned" @if(!empty($payment)) value="{{ $payment->total_earn }}" readonly @endif>
                            </div>
				                                 
			                <div class="form-group">
                                <label>Date Paid :</label>
                                <input class="form-control datepicker" type="datetime" name="date_paid" @if(!empty($payment)) value="{{ $payment->date_paid }}" readonly @endif>
                            </div>

                            <div class="form-group">
                                <label>Booking Paid Via :</label>
                                <select class="form-control input-lg" name="paid_via" @if(!empty($payment)) {{ 'disabled'  }} @endif>
                                    <option value="">.....</option>
                                    <option value="Wired" @if(!empty($payment) && $payment->paid_via == 'Wired') {{ 'selected' }} @endif>Wired</option>
                                    <option value="Paypal" @if(!empty($payment) && $payment->paid_via == 'Paypal') {{ 'selected' }} @endif>Paypal</option>
                                    <option value="Credit Card" @if(!empty($payment) && $payment->paid_via == 'Credit Card') {{ 'selected' }} @endif>Credit Card</option>
                                    <option value="Venmo" @if(!empty($payment) && $payment->paid_via == 'Venmo') {{ 'selected' }} @endif>Venmo</option>
                                    <option value="ACH" @if(!empty($payment) && $payment->paid_via == 'ACH') {{ 'selected' }} @endif>ACH</option>
                                    <option value="Chase Quick Pay" @if(!empty($payment) && $payment->paid_via == 'Chase Quick Pay') {{ 'selected' }} @endif>Chase Quick Pay</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Commission Paid Via :</label>
                                <select class="form-control input-lg" name="com_via" @if(!empty($payment)) {{ 'disabled'  }} @endif>
                                    <option value="">.....</option>
                                    <option value="Wired" @if(!empty($payment) && $payment->com_via == 'Wired') {{ 'selected' }} @endif>Wired</option>
                                    <option value="Paypal" @if(!empty($payment) && $payment->com_via == 'Paypal') {{ 'selected' }} @endif>Paypal</option>
                                    <option value="Credit Card" @if(!empty($payment) && $payment->com_via == 'Credit Card') {{ 'selected' }} @endif>Credit Card</option>
                                    <option value="Venmo" @if(!empty($payment) && $payment->com_via == 'Venmo') {{ 'selected' }} @endif>Venmo</option>
                                    <option value="ACH" @if(!empty($payment) && $payment->com_via == 'ACH') {{ 'selected' }} @endif>ACH</option>
                                    <option value="Chase Quick Pay" @if(!empty($payment) && $payment->com_via == 'Chase Quick Pay') {{ 'selected' }} @endif>Chase Quick Pay</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Auto-update Calender :</label>
                                <input class="form-control" type="text" name="auto_up" placeholder="Auto-update Calender" @if(!empty($payment)) value="{{ $payment->auto_up }}" readonly @endif>
                            </div>
                            @if(empty($payment))
                            <div class="form-group">
                                <input type="hidden" name="lead_id" value="@if($fd->key == 'status') {{ $fd->sn_no }} @endif">
                                <button class="btn btn-info btn-offer pull-right" type="submit">Save Payments</button>
                            </div>
                                @endif
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