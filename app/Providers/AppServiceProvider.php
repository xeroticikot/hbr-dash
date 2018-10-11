<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\IncomingData;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $form_1 = $form_2 = $form_3 = $form_4 = $form_5 = $form_6 = 0;
        $form_5466 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '5466'])
            ->get();
        foreach($form_5466 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_1++;
                }
            }
        }

        $form_5917 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '5917'])
            ->get();
        foreach($form_5917 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_2++;
                }
            }
        }

        $form_5667 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '5667'])
            ->get();
        foreach($form_5667 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_3++;
                }
            }
        }

        $form_5656 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '5656'])
            ->get();
        foreach($form_5656 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_4++;
                }
            }
        }

        $form_1319 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '1319'])
            ->get();
        foreach($form_1319 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_5++;
                }
            }
        }

        $form_4759 = IncomingData::where(['key' => '_wpcf7'])
            ->where(['value' => '4759'])
            ->get();
        foreach($form_4759 as $data){
            $form_data = IncomingData::where(['sn_no' => $data->sn_no])->get();
            foreach($form_data as $fd){
                if($fd->key == 'status' && $fd->value == 'Requested'){
                    $form_6++;
                }
            }
        }

        View::share('form_1', $form_1);
        View::share('form_2', $form_2);
        View::share('form_3', $form_3);
        View::share('form_4', $form_4);
        View::share('form_5', $form_5);
        View::share('form_6', $form_6);

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
