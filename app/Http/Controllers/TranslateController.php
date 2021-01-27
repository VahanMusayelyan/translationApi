<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Http\Request;


class TranslateController extends Controller
{
    use \App\Services\TranslationTrait;

    public function index(Request $request){

        $validatedData = $request->validate([
            'translate' => ['required'],
        ],[
            'translate.required' => 'The field is empty',
        ]);

        $translation = $this->translation($request->translate);
        $response_arr = [];

        if(isset($translation)){
            if($translation === $request->translate){
                $response_arr['success'] = false;
                $response_arr['error'] = 'There is no word written';
            }else{
                $response_arr['success'] = true;
                $response_arr['translation'] = $translation;
            }

        }else{
            $response_arr['success'] = false;
            $response_arr['error'] = 'Something went wrong,please try again';

        }

       return view("welcome",compact("response_arr"));



      
    }

}
