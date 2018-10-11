Hi, <strong>{{ $name }}</strong>,

@if(isset($full_name)) <p><strong>Full Name : </strong>{{ $full_name }}</p> @endif
@if(isset($date_req)) <p><strong>Date Requested : </strong>{{ $date_req }}</p> @endif
@if(isset($total_budget)) <p><strong>Total Budget : </strong>{{ $total_budget }}</p> @endif
@if(isset($no_guests)) <p><strong># of Guests : </strong>{{ $no_guests }}</p> @endif
@if(isset($no_adults)) <p><strong># of Adults : </strong>{{ $no_adults }}</p> @endif
@if(isset($no_child)) <p><strong># of Children : </strong>{{ $no_child }}</p> @endif
@if(isset($req_dep)) <p><strong>Departure Port Requested : </strong>{{ $req_dep }}</p> @endif
@if(isset($itinerary)) <p><strong>Itinerary Requested : </strong>{{ $itinerary }}</p> @endif
@if(isset($prev_ex)) <p><strong>Previous Experience : </strong>{{ $prev_ex }}</p> @endif
@if(isset($boat1)) <p><strong>Boat Choice #1 : </strong>{{ $boat1 }}</p> @endif
@if(isset($boat2)) <p><strong>Boat Choice #2 : </strong>{{ $boat2 }}</p> @endif
@if(isset($boat3)) <p><strong>Boat Choice #3 : </strong>{{ $boat3 }}</p> @endif
@if(isset($ad_notes)) <p><strong>Additional Notes : </strong>{{ $ad_notes }}</p> @endif

<p>{{ $body }}</p>

<p>Here's the link to the lead - <a href="http://upboard.hamptonsboatrental.com/lead-details/{{ $req_id }}">http://upboard.hamptonsboatrental.com/lead-details/{{ $req_id }}</a></p>