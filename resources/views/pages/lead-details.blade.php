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

                        Give feedback

                    </div>

                    <form method="post" action="{{ url('/lead-details/'.$id) }}">

                        {{ csrf_field() }}

                        <div class="panel-body">

                            <div class="form-group">

                                <label class="pull-left">Accept/deny the offer.</label>

                                <div class="btn-group pull-right" id="status" data-toggle="buttons">

                                    <label class="btn btn-default btn-on btn-lg active">

                                        <input type="radio" value="Accepted" name="status" @if(!empty($exc)) @if($exc->status == 'Denied') checked="checked" @endif @else checked="checked" @endif>Accept

                                    </label>

                                    <label class="btn btn-default btn-off btn-lg">

                                        <input type="radio" value="Denied" name="status" @if(!empty($exc)) @if($exc->status == 'Denied') checked="checked" @endif @endif>Deny

                                    </label>

                                </div>

                            </div>

                            <br>

                            <br>

                            <br>

                            <div class="form-group">

                                <label>Additional Notes :</label>

                                <textarea class="form-control" name="ad_notes" rows="8" placeholder="Provide your additional notes here..." @if(!empty($exc)) readonly @endif>@if(!empty($exc)) {{ $exc->ad_notes }} @endif</textarea>

                            </div>

                        </div>

                        <input type="hidden" name="user_id" value="{{ $boat_id }}">

                        @if(empty($exc) && Auth::user()->role == 'other')

                        <div class="form-group">

                            <input type="hidden" name="req_id" value="{{ $id }}">

                            <input type="hidden" name="user_id" value="{{ $boat_id }}">

                            <button type="submit" class="btn btn-info btn-offer pull-right">Make Changes</button>

                        </div>

                            @endif

                    </form>

                </div>

            </div>

            <div class="col-lg-6">

                <div class="panel panel-default">

                    <div class="panel-heading">

                        Payment Details

                    </div>

                    <div class="panel-body">

                        <div class="form-group">

                            <label>Offered Amount : <span class="text-info">$5000</span></label>

                        </div>

                        <div class="form-group">

                            <label>Selected Boat : <span class="text-info">31' Regal</span></label>

                        </div>

                        <div class="form-group">

                            <label>Estimated Time : <span class="text-info">24/08/2018 18:00 PM</span></label>

                        </div>

                    </div>

                </div>

            </div>

        </div>



        <div class="clearfix">

            <br>

        </div>



        <div class="col-sm-12">



            <p class="back-link">© 2018. All rights reserved</p>



        </div>

    </div>



@endsection