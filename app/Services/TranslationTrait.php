<?php

namespace App\Services;

use Illuminate\Http\Request;

trait TranslationTrait {


    public function translation($text) {


            $apiKey = config('translationconfig.trans_api');
            $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey . '&q=' . rawurlencode($text) . '&source=en&target=hy';

            $handle = curl_init($url);
            curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handle);
            curl_close($handle);
            $responseDecoded = json_decode($response, true);
            $translation = $responseDecoded['data']['translations'][0]['translatedText'];

            return $translation;


    }

}
