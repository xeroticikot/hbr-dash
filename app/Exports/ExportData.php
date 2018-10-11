<?php

namespace App\Exports;

use App\BlackData;
use App\IncomingData;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportData implements FromCollection, WithHeadings
{
    private $link;

    public function __construct($link){
        $this->link = $link;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $col = new Collection();
        $form_id = '';
        if($this->link == 'rb'){
            $form_id = '5466';
        }
        if($this->link == 'rfc'){
            $form_id = '5917';
        }
        if($this->link == 'hc'){
            $form_id = '5667';
        }
        if($this->link == 'ipi'){
            $form_id = '5656';
        }
        if($this->link == 'sc'){
            $this->form_id = '1319';
        }
        if($this->link == 'cf'){
            $form_id = '4759';
        }
        if($this->link == 'all'){
            $inData = IncomingData::where(['key' => '_wpcf7'])->get();
        }else{
            $inData = IncomingData::where(['key' => '_wpcf7'])
                ->where('value', $form_id)
                ->get();
        }
        foreach($inData as $ind){
            $fetch = new BlackData();
            $fetch->sub_time = null;
            $fetch->full_name = null;
            $fetch->email = null;
            $fetch->phone = null;
            $fetch->bc1 = null;
            $fetch->bc2 = null;
            $fetch->bc3 = null;
            $fetch->tb = null;
            $fetch->dr = null;
            $fetch->nog = null;
            $fetch->noa = null;
            $fetch->noc = null;
            $fetch->dp = null;
            $fetch->iti = null;
            $fetch->prevex = null;
            $fetch->addnotes = null;
            $formData = IncomingData::where('sn_no', $ind->sn_no)->get();
            foreach($formData as $in){
                if($in->key == 'full-name'){
                    $fetch->sub_time = date('m-d-Y H:i A', strtotime($ind->created_at));
                }
                if($in->key == 'full-name'){
                    $fetch->full_name = $in->value;
                }
                if($in->key == 'email'){
                    $fetch->email = $in->value;
                }
                if($in->key == 'phone'){
                    $fetch->phone = $in->value;
                }
                if($in->key == 'boat-choice1'){
                    $fetch->bc1 = $in->value;
                }
                if($in->key == 'boat-choice2'){
                    $fetch->bc2 = $in->value;
                }
                if($in->key == 'boat-choice3'){
                    $fetch->bc3 = $in->value;
                }
                if($in->key == 'total-budget'){
                    $fetch->tb = $in->value;
                }
                if($in->key == 'date-requested'){
                    $fetch->dr = $in->value;
                }
                if($in->key == 'number-of-guests'){
                    $fetch->nog = $in->value;
                }
                if($in->key == 'number-of-adults'){
                    $fetch->noa = $in->value;
                }
                if($in->key == 'number-of-children'){
                    $fetch->noc = $in->value;
                }
                if($in->key == 'departure-port-requested'){
                    $fetch->dp = $in->value;
                }
                if($in->key == 'itinerary-requested'){
                    $fetch->iti = $in->value;
                }
                if($in->key == 'previous-experience'){
                    $fetch->prevex = $in->value;
                }
                if($in->key == 'additional-notes'){
                    $fetch->addnotes = $in->value;
                }
            }
            $col->push($fetch);
        }
        return $col;
    }

    public function headings(): array
    {
        return [
            'Submit Time',
            'Full Name',
            'E-mail',
            'Phone',
            '1st Choice',
            '2nd Choice',
            '3rd Choice',
            'Requested Date',
            'Total Budget',
            'No. of Guests',
            'No. of Adult',
            'No. of Children',
            'Departure Port',
            'Itinerary Requested',
            'Previous Experience',
            'Additional Notes',
        ];
    }

}
