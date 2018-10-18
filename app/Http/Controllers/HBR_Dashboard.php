<?php

namespace App\Http\Controllers;

use App\Boats;
use App\Exports\ExportData;
use App\Offers;
use App\Payment;
use App\SentMails;
use Illuminate\Http\Request;
use App\User;
use App\IncomingData;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Mail;
use Auth;
use Maatwebsite\Excel\Facades\Excel;

class HBR_Dashboard extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * paginate - custom library function for paginate
    */
    public function paginate($items, $perPage = 15, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => 'page',
        ]);
    }

    /**
     * Dashboard - function for dashboard
    */
    public function dashboard(Request $request){
        $collection = new Collection();
        $page = null;
        if(isset($request->page)){
            $page = $request->page;
        }
        $sort = 'desc';
        $status = '';
        $req_count = $proc_count = 0;
        if(isset($request->sort)){
            $sort = $request->sort;
        }
        if(isset($request->status)){
            $status = $request->status;
        }
        $stat1 = $stat2 = $stat3 = $stat4 = $stat5 = $stat6 = 0;

        if(Auth::user()->role == 'other'){
            $boats = Boats::where('email', Auth::user()->email)->get();
            foreach($boats as $boat){
                $leads = SentMails::where('boat_id', $boat->id)->get();
                foreach($leads as $lead){
                    $lead_data = IncomingData::where('sn_no', $lead->req_id)
                        ->get();
                    $lead->lead_data = $lead_data;
                    $collection->push($lead);
                }
            }
        }else{
            $leads = IncomingData::where(['key' => '_wpcf7'])
                ->orderBy('id', $sort)
                ->get();
            foreach($leads as $fd){
                $form_data = IncomingData::where(['sn_no' => $fd->sn_no])->get();
                foreach($form_data as $dd){
                    if($dd->key == 'status'){
                        if($dd->value == 'Requested'){
                            $stat1++;
                        }
                        if($dd->value == 'Made Contact - Waiting'){
                            $stat2++;
                        }
                        if($dd->value == 'Invited Captains'){
                            $stat3++;
                        }
                        if($dd->value == 'Gave Client Availability'){
                            $stat4++;
                        }
                        if($dd->value == 'Sold'){
                            $stat5++;
                        }
                        if($dd->value == 'Dead'){
                            $stat6++;
                        }
                    }
                }
            }
            if(isset($request->status)){
                $status = $request->status;
                $leads = IncomingData::where(['key' => 'status'])
                    ->where('value', $status)
                    ->orderBy('id', $sort)
                    ->get();
            }
            foreach($leads as $fd){
                $form_data = IncomingData::where(['sn_no' => $fd->sn_no])->get();
                $fd->lead_data = $form_data;
                $collection->push($fd);
                foreach($form_data as $dd){
                    if($dd->key == 'status'){
                        $proc_count++;
                        if($dd->value == 'requested'){
                            $req_count++;
                        }
                    }
                }
            }
        }

        $form_4759 = $this->paginate($collection, 100, $page);
        $slug = 'home';
        return view('pages.dashboard', [
            'data' => $form_4759,
            'sort' => $sort,
            'status' => $status,
            'slug' => $slug,
            'stat1' => $stat1,
            'stat2' => $stat2,
            'stat3' => $stat3,
            'stat4' => $stat4,
            'stat5' => $stat5,
            'stat6' => $stat6,
            'modals' => 'pages.modals.dashboard-modals'
        ]);
    }

    /**
     * CreateUsers - function for creating users for the upboard
    */
    public function createUsers(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $data = null;
        $errors = array();
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->password !== $request->repass){
                $errors[] = 'Passwords didn\'t match !!';
            }
            $user = new User();
            if(!$user->validate($data)){
                $user_e = $user->errors();
                foreach ($user_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(empty($errors)){
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->role = $request->role;
                $user->save();
                return redirect()
                    ->to('/create-users')
                    ->with('success', 'The user is created successfully!!');
            }else{
                return redirect()
                    ->to('/create-users')
                    ->withErrors($errors)
                    ->withInput();
            }
        }
        $slug = 'addmin';
        return view('pages.create-users', [
            'slug' => $slug,
            'modals' => 'pages.modals.create-users-modals',
            'data' => $data
        ]);
    }

    /**
     * Users List - shows all the users
     */
    public function usersList(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            if($request->password !== $request->repass){
                return redirect()
                    ->to('/users-list')
                    ->with('error', 'Password didn\'t match!! Please try again!!');
            }
            $user = User::find($request->user_id);
            $user->name = $request->name;
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()
                ->to('/users-list')
                ->with('success', 'User info edited successfully!!');
        }
        $users = User::all();
        $slug = 'users';
        return view('pages.users-list', [
            'slug' => $slug,
            'modals' => 'pages.modals.users-list-modals',
            'users' => $users
        ]);
    }

    /**
     * Delete users - delete function for a particular user
     */
    public function deleteUser(Request $request, $id){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            User::destroy($id);
            return redirect()
                ->to('/users-list')
                ->with('success', 'User deleted successfully!!');
        }else{
            return redirect()
                ->to('/users-list')
                ->with('error', 'Method not allowed!!');
        }
    }

    /**
     * ReadyBookingsDetails - function for showing details of a particular lead
    */
    public function readyBookingsDetails(Request $request, $id){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $data = IncomingData::where(['sn_no' => $id])->get();
        $boats = Boats::all();
        $sent_mails = SentMails::where(['req_id' => $id])->get();
        $offers = Offers::where(['req_id' => $id])
            ->get();
        $offer_boats = array();
        foreach($offers as $of){
            $offer_boats[] = $of->user_id;
        }
        $payment = Payment::where('lead_id', $id)->first();
        return view('pages.ready-bookings-details', [
            'data' => $data,
            'boats' => $boats,
            'sent_mails' => $sent_mails,
            'offers' => $offers,
            'offer_boats' => $offer_boats,
            'payment' => $payment,
            'slug' => 'bookings',
            'modals' => 'pages.modals.ready-bookings-details-modals',
            'js' => 'pages.js.ready-bookings-details-js'
        ]);
    }

    /**
     * allBookings - function to show all the data from contact forms
     */
    public function allBookings(Request $request, $link){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $page = null;
        if(isset($request->page)){
            $page = $request->page;
        }
        $collection = new Collection();
        $stat1 = $stat2 = $stat3 = $stat4 = $stat5 = $stat6 = 0;
        $sort = 'desc';
        $status = '';
        if(isset($request->sort)){
            $sort = $request->sort;
        }
        $form_id = $slug = '';
        if($link == 'rb'){
            $form_id = '5466';
            $slug = 'rb';
        }
        if($link == 'rfc'){
            $form_id = '5917';
            $slug = 'rfc';
        }
        if($link == 'hc'){
            $form_id = '5667';
            $slug = 'hc';
        }
        if($link == 'ipi'){
            $form_id = '5656';
            $slug = 'ipi';
        }
        if($link == 'sc'){
            $form_id = '1319';
            $slug = 'sc';
        }
        if($link == 'cf'){
            $form_id = '4759';
            $slug = 'cf';
        }
        $form_4759 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => $form_id])
            ->orderBy('id', $sort)
            ->get();
        if(isset($request->status)){
            $status = $request->status;
        }
        foreach($form_4759 as $fd){
            $form_data = IncomingData::where(['sn_no' => $fd->sn_no])->get();
            $fd->form_data = $form_data;
            if($status != ''){
                foreach($form_data as $ll){
                    if($ll->key == 'status' && $ll->value == $status){
                        $collection->push($fd);
                    }
                }
            }else{
                $collection->push($fd);
            }
            foreach($form_data as $dd){
                if($dd->key == 'status'){
                    if($dd->value == 'Requested'){
                        $stat1++;
                    }
                    if($dd->value == 'Made Contact - Waiting'){
                        $stat2++;
                    }
                    if($dd->value == 'Invited Captains'){
                        $stat3++;
                    }
                    if($dd->value == 'Gave Client Availability'){
                        $stat4++;
                    }
                    if($dd->value == 'Sold'){
                        $stat5++;
                    }
                    if($dd->value == 'Dead'){
                        $stat6++;
                    }
                }
            }
        }
        return view('pages.bookings', [
            'data' => $this->paginate($collection, 100, $page),
            'slug' => $slug,
            'modals' => 'pages.modals.bookings-modals',
            'sort' => $sort,
            'status' => $status,
            'stat1' => $stat1,
            'stat2' => $stat2,
            'stat3' => $stat3,
            'stat4' => $stat4,
            'stat5' => $stat5,
            'stat6' => $stat6,
            'link' => $link
        ]);
    }

    /**
     * Boats - this is the function for showing and adding boats info
    */
    public function boats(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $boats = Boats::all();
        if($request->isMethod('post')){
            $add = new Boats();
            $add->name = $request->name;
            $add->owner = $request->owner;
            $add->email = $request->email;
            $add->phone = $request->phone;
            $add->notes = $request->notes;
            $add->commission = $request->commission;
            if($add->save()){
                return redirect()
                    ->to('/boats')
                    ->with('success', 'Boat added successfully!');
            }else{
                return redirect()
                    ->to('/boats')
                    ->with('error', 'Boat couldn\'t added! Please try again!')
                    ->withInput();
            }
        }
        return view('pages.boats', [
            'data' => $boats,
            'slug' => 'boats',
            'modals' => 'pages.modals.boats-modals',
            'js' => 'pages.js.boats-js'
        ]);
    }

    public function editBoat(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            $boat = Boats::find($request->boat_id);
            $boat->name = $request->name;
            $boat->owner = $request->owner;
            $boat->email = $request->email;
            $boat->phone = $request->phone;
            $boat->notes = $request->notes;
            $boat->commission = $request->commission;
            $boat->boat_rep = $request->boat_rep;
            $boat->boat_rep_email = $request->boat_rep_email;
            $boat->boat_rep_phone = $request->boat_rep_phone;
            if($boat->save()){
                return redirect()
                    ->to('/boats')
                    ->with('success', 'Boat has been edited successfully!');
            }else{
                return redirect()
                    ->to('/boats')
                    ->with('error', 'Something went wrong! Please try again');
            }
        }
    }

    public function deleteBoat(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            if(Boats::destroy($request->boat_id)){
                return redirect()
                    ->to('/boats')
                    ->with('success', 'Boat has been deleted successfully!');
            }else{
                return redirect()
                    ->to('/boats')
                    ->with('error', 'Something went wrong! Please try again');
            }
        }
    }

    public function payment(Request $request){
        if($request->isMethod('post')){
            $pay = new Payment();
            $pay->lead_id = $request->lead_id;
            $pay->winner = $request->winner;
            $pay->date_booked = $request->date_booked;
            $pay->total_hour = $request->total_hour;
            $pay->base_rate = $request->base_rate;
            $pay->fuel = $request->fuel;
            $pay->gratuity = $request->gratuity;
            $pay->apa = $request->apa;
            $pay->total_com = $request->total_com;
            $pay->com_rate = $request->com_rate;
            $pay->total_earn = $request->total_earn;
            $pay->date_paid = $request->date_paid;
            $pay->paid_via = $request->paid_via;
            $pay->com_via = $request->com_via;
            $pay->auto_up = $request->auto_up;
            if($pay->save()){
                return redirect()
                    ->to('/bookings/details/'.$request->lead_id)
                    ->with('success', 'Payment info was saved!');
            }else{
                return redirect()
                    ->to('/bookings/details/'.$request->lead_id)
                    ->with('error', 'Something went wrong! Please try again!');
            }
        }
    }

    public function sendMail(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            $data = array();
            $form_data = IncomingData::where(['sn_no' => $request->req_id])->get();
            $data['req_id'] = $request->req_id;
            foreach($form_data as $fd){
                if($fd->key == 'full-name'){
                    $data['full_name'] = $fd->value;
                }
                if($fd->key == 'date-requested'){
                    $data['date_req'] = $fd->value;
                }
                if($fd->key == 'time-requested'){
                    $data['time_req'] = $fd->value;
                }
                if($fd->key == 'total-budget'){
                    $data['total_budget'] = $fd->value;
                }
                if($fd->key == 'number-of-guests'){
                    $data['no_guests'] = $fd->value;
                }
                if($fd->key == 'number-of-adults'){
                    $data['no_adults'] = $fd->value;
                }
                if($fd->key == 'number-of-children'){
                    $data['no_child'] = $fd->value;
                }
                if($fd->key == 'departure-port-requested'){
                    $data['req_dep'] = $fd->value;
                }
                if($fd->key == 'itinerary-requested'){
                    $data['itinerary'] = $fd->value;
                }
                if($fd->key == 'previous-experience'){
                    $data['prev_ex'] = $fd->value;
                }
                if($fd->key == 'boat-choice1'){
                    $data['boat1'] = $fd->value;
                }
                if($fd->key == 'boat-choice2'){
                    $data['boat2'] = $fd->value;
                }
                if($fd->key == 'boat-choice3'){
                    $data['boat3'] = $fd->value;
                }
                if($fd->key == 'additional-notes'){
                    $data['ad_notes'] = $fd->value;
                }
            }
            $data['name'] = $request->owner;
            $data['email'] = $request->email;
            $data['subject'] = $request->subject;
            $data['body'] = $request->email_body;

            Mail::send('emails.email', $data, function($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->subject('HBR Inquiry - '.$data['date_req'].', '.$data['time_req'].', '.$data['no_guests'].', '.substr($data['full-name'], 0, 5));
                $message->from('hbravailability@hamptonsboatrental.com','Hamptons Boat Rental - Inquiry');
            });

            if(Mail::failures()){
                return redirect()
                    ->to('/bookings/details/'.$request->req_id)
                    ->with('error', 'E-mail was not sent! Please try again');
            }else{
                $mail_check = SentMails::where(['boat_id' => $request->boat_id])
                    ->where(['req_id' => $request->req_id])
                    ->first();
                if(empty($mail_check)){
                    $sent_mail = new SentMails();
                    $sent_mail->boat_id = $request->boat_id;
                    $sent_mail->req_id = $request->req_id;
                    $sent_mail->save();
                    $status = IncomingData::where('key', 'status')
                        ->where('sn_no', $request->req_id)
                        ->get();
                    $status->value = 'Invited Captains';
                    $status->save();
                }
                return redirect()
                    ->to('/bookings/details/'.$request->req_id)
                    ->with('success', 'E-mail was sent successfully!');
            }
        }
    }

    public function sendMailClient(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            $data = array();
            $data['name'] = $request->owner;
            $data['email'] = $request->email;
            $data['subject'] = $request->subject;
            $data['body'] = $request->email_body;

            Mail::send('emails.email-client', $data, function($message) use ($data) {
                $message->to($data['email'], $data['name'])
                    ->subject($data['subject']);
                $message->from('hbravailability@hamptonsboatrental.com','Hamptons Boat Rental - Inquiry');
            });

            if(Mail::failures()){
                return redirect()
                    ->to('/bookings/details/'.$request->req_id)
                    ->with('error', 'E-mail was not sent! Please try again');
            }else{
                return redirect()
                    ->to('/bookings/details/'.$request->req_id)
                    ->with('success', 'E-mail was sent successfully!');
            }
        }
    }
    
    public function changeStatus(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        if($request->isMethod('post')){
            $status = IncomingData::where(['key' => 'status'])
                ->where(['sn_no' => $request->req_id])
                ->first();
            if(empty($status)){
                $stat = new IncomingData();
                $stat->sn_no = $request->req_id;
                $stat->key = 'status';
                $stat->value = $request->status;
                $stat->save();
            }else{
                $status->value = $request->status;
                $status->save();
            }
            return redirect()
                ->to('/bookings/details/'.$request->req_id)
                ->with('success', 'Status changed successfully!');
        }
    }

    public function leadDetails(Request $request, $id){
        $errors = array();
        $boat = $owner_id = $boat_id = null;
        $mail = SentMails::where(['req_id' => $id])->get();
        foreach($mail as $m){
            $boat = Boats::find($m->boat_id);
            $owner = User::where(['email' => $boat->email])
                ->first();
            if(!empty($owner)){
                $boat_id = $m->boat_id;
                $owner_id = $owner->id;
            }
        }
        if(Auth::user()->role == 'other' && $owner_id != Auth::id()){
            return redirect()
                ->to('/')
                ->with('error', 'This page doesn\'t exist!');
        }
        $checker = Offers::where(['user_id' => $boat_id])
            ->where(['req_id' => $id])
            ->first();
        $data = IncomingData::where(['sn_no' => $id])->get();
        foreach($data as $d){
            if($d->value == 'Sold' || $d->value == 'Dead'){
                return redirect()
                    ->to('/')
                    ->with('error', 'This page doesn\'t exist!');
            }
        }
        $boats = Boats::all();
        if($request->isMethod('post')){
            $check = $request->all();
            $offer = new Offers();
            if(!$offer->validate($check)){
                $offer_e = $offer->errors();
                foreach ($offer_e->messages() as $k => $v){
                    foreach ($v as $e){
                        $errors[] = $e;
                    }
                }
            }
            if(empty($errors)){
                $offer->user_id = $request->user_id;
                $offer->req_id = $request->req_id;
                $offer->status = $request->status;
                $offer->ad_notes = $request->ad_notes;
                $offer->save();
                return redirect()
                    ->to('/')
                    ->with('success', 'The offer was processed successfully!!');
            }else{
                return redirect()
                    ->to('/lead-details/'.$request->req_id)
                    ->withErrors($errors)
                    ->withInput();
            }
        }
        return view('pages.lead-details', [
            'data' => $data,
            'slug' => 'lead',
            'id' => $id,
            'boat_id' => $boat_id,
            'exc' => $checker
        ]);
    }

    public function boatOwners(Request $request){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $owners = User::where(['role' => 'other'])
            ->orWhere(['email' => 'joeialacci@gmail.com'])
            ->get();
        foreach($owners as $owner){
            $boats = Boats::where('email', $owner->email)->get();
            $owner->boats = $boats;
            foreach($boats as $boat){
                $leads = SentMails::where('boat_id', $boat->id)->get();
                foreach($leads as $lead){
                    $lead_details = IncomingData::where('sn_no', $lead->req_id)->get();
                    $lead->details = $lead_details;
                }
                $owner->leads = $leads;
            }
        }
        $formData = Offers::paginate(100);
        foreach($formData as $fd){
            $form_data = IncomingData::where(['sn_no' => $fd->req_id])->get();
            $fd->form_data = $form_data;
            $theBoat = Boats::find($fd->user_id);
            $fd->boat = $theBoat;
            $owner = User::where('email', $theBoat->email)->first();
            $fd->owner = $owner;
        }
        return view('pages.owners-leads', [
            'data' => $owners,
            'formData' => $formData,
            'slug' => 'owners'
        ]);
    }

    public function delete(Request $request){
        if($request->isMethod('post')){
            if(Auth::user()->role == 'other'){
                return redirect()
                    ->to('/')
                    ->with('error', 'You don\'t have authorization to access this page!');
            }
            $form_data = IncomingData::where(['sn_no' => $request->sn_no])->get();
            foreach($form_data as $fd){
                IncomingData::destroy($fd->id);
            }
            $sent = SentMails::where('req_id', $request->sn_no)->get();
            if(!empty($sent)){
                foreach($sent as $s){
                    SentMails::destroy($s->id);
                }
            }
            $offers = Offers::where('req_id', $request->sn_no)->get();
            if(!empty($offers)){
                foreach($offers as $o){
                    Offers::destroy($o->id);
                }
            }
            return redirect()
                ->to('/')
                ->with('success', 'The lead was deleted successfully!');
        }
    }

    public function ownerLeads(Request $request, $id){
        if(Auth::user()->role == 'other'){
            return redirect()
                ->to('/')
                ->with('error', 'You don\'t have authorization to access this page!');
        }
        $page = null;
        if(isset($request->page)){
            $page = $request->page;
        }
        $collection = new Collection();
        $choice = $stat = '';
        $owner = User::find($id);
        $boats = Boats::where('email', $owner->email)->get();
        if(isset($request->choice) && !isset($request->stat)){
            foreach($boats as $boat){
                $boat->choice = $request->choice;
                $all = IncomingData::where(function ($q) use ($boat){
                    $q->where('key', 'boat-choice'.$boat->choice)
                        ->where('value', $boat->id.'. '.$boat->name);
                    })
                    ->get();
                foreach($all as $a){
                    $details = IncomingData::where('sn_no', $a->sn_no)->get();
                    $a->boat_name = $boat->name;
                    $a->details = $details;
                    $collection->push($a);
                }
            }
        }elseif(isset($request->stat) && !isset($request->choice)){
            if($request->stat == 'requested'){
                foreach($boats as $boat){
                    $leads = SentMails::where('boat_id', $boat->id)->get();
                    foreach($leads as $lead){
                        $lead_details = IncomingData::where('sn_no', $lead->req_id)->get();
                        $lead->sn_no = $lead->req_id;
                        $lead->boat_name = $boat->name;
                        $lead->details = $lead_details;
                        $collection->push($lead);
                    }
                }
            }else{
                foreach($boats as $boat){
                    $leads = Offers::where('user_id', $id)
                        ->where('status', $request->stat)
                        ->get();
                    foreach($leads as $lead){
                        $lead_details = IncomingData::where('sn_no', $lead->req_id)->get();
                        $lead->sn_no = $lead->req_id;
                        $lead->boat_name = $boat->name;
                        $lead->details = $lead_details;
                        $collection->push($lead);
                    }
                }
            }
        }elseif(isset($request->stat) && isset($request->choice)){
            if($request->stat == 'requested'){
                foreach($boats as $boat){
                    $leads = SentMails::where('boat_id', $boat->id)->get();
                    foreach($leads as $lead){
                        $checker = IncomingData::where('sn_no', $lead->req_id)
                            ->where('key', 'boat-choice'.$request->choice)
                            ->where('value', $boat->id.'. '.$boat->name)
                            ->first();
                        if(!empty($checker)){
                            $lead_details = IncomingData::where('sn_no', $lead->req_id)->get();
                            $lead->sn_no = $lead->req_id;
                            $lead->boat_name = $boat->name;
                            $lead->details = $lead_details;
                            $collection->push($lead);
                        }
                    }
                }
            }else{
                foreach($boats as $boat){
                    $leads = Offers::where('user_id', $id)
                        ->where('status', $request->stat)
                        ->get();
                    foreach($leads as $lead){
                        $checker = IncomingData::where('sn_no', $lead->req_id)
                            ->where('key', 'boat-choice'.$request->choice)
                            ->where('value', $boat->id.'. '.$boat->name)
                            ->first();
                        if($checker != null){
                            $lead_details = IncomingData::where('sn_no', $lead->req_id)->get();
                            $lead->sn_no = $lead->req_id;
                            $lead->boat_name = $boat->name;
                            $lead->details = $lead_details;
                            $collection->push($lead);
                        }
                    }
                }
            }
        }else{
            foreach($boats as $boat){
                $all = IncomingData::where(function ($q) use ($boat){
                    $q->where('key', 'boat-choice1')
                        ->where('value', $boat->id.'. '.$boat->name);
                    })
                    ->orWhere(function ($q) use ($boat){
                        $q->where('key', 'boat-choice2')
                            ->where('value', $boat->id.'. '.$boat->name);
                    })
                    ->orWhere(function ($q) use ($boat){
                        $q->where('key', 'boat-choice3')
                            ->where('value', $boat->id.'. '.$boat->name);
                    })
                    ->get();
                foreach($all as $a){
                    $details = IncomingData::where('sn_no', $a->sn_no)->get();
                    $a->boat_name = $boat->name;
                    $a->details = $details;
                    $collection->push($a);
                }
            }
        }

        return view('pages.owner-leads', [
            'data' => $this->paginate($collection, 100, $page),
            'slug' => 'owners'
        ]);
    }

    public function downloadExcel(Request $request, $link){
        return Excel::download(new ExportData($link), 'hamptons-boat-rental-upboard-data.xlsx');
    }

}
