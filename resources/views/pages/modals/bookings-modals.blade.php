@foreach($data as $d)

    <!-- Modal -->

    <div class="modal fade" id="myModalpr{{ $d->sn_no }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

        <div class="modal-dialog" role="document">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <h4 class="modal-title" id="myModalLabel">Entry Details</h4>

                </div>

                <div class="modal-body">

                    <table class="table table-hover ">

                        <tbody>

                        <tr>

                            <th>Submit Time<span class="pull-right">:</span></th>

                            <td>{{ date('Y-m-d H:i A', strtotime($d->created_at)) }}</td>

                        </tr>

                        <tr>

                            <th>Full Name<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'full-name') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>E-mail<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'email') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Phone<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'phone') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Total Budget<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'total-budget') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Date Requested<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'date-requested') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th># of Guests<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'number-of-guests') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th># of Adults<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'number-of-adults') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th># of Children<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'number-of-children') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Departure Port<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'departure-port-requested') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

			<tr>

                            <th>Size of Boat/Yacht Requested<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-size-requested') {{ $fd->value }} @endif @endforeach</td>

                        </tr>


                        <tr>

                            <th>Itinerary Requested<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'itinerary-requested') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Previous Book<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'previous-experience') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                      <tr>

                            <th>1st Choice<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice1') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

<tr>

                            <th>2nd Choice<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice2') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

<tr>

                            <th>3rd Choice<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'boat-choice3') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        <tr>

                            <th>Additional Notes<span class="pull-right">:</span></th>

                            <td>@foreach($d->form_data as $fd) @if($fd->key == 'additional-notes') {{ $fd->value }} @endif @endforeach</td>

                        </tr>

                        </tbody>

                    </table>

                </div>

                <div class="modal-footer">

                    <a href="{{ url('/bookings/details/'.$d->sn_no) }}"><button type="button" class="btn btn-info btn-mail">Go for Inquiry</button></a>

                    <button type="button" class="btn btn-info btn-mail" data-dismiss="modal">Cancel</button>

                </div>

            </div>

        </div>

    </div>

@endforeach