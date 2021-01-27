<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Google Translate</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">


        <style>
            body {
                font-family: 'Nunito';
                font-size: 14px;
            }
            h4{
                margin: 20px auto;
                text-align: center;
            }
            #translationInp{
                border: 1px solid #5e5eea;
                border-radius: 10px;
                padding: 10px;
                width: 350px;
            }
            #translationInp:focus{
                border: 1px solid #0000c1;
                outline: none;
            }
            .translate_block{
                width: 70%;
                height: auto;
                margin: 0 auto;

            }
        </style>
    </head>
    <body class="antialiased">

        <h4> Google Translate</h4>
        <div class="translate_block">
            <form action="{{route('translation')}}" method="post">
                @csrf
                <input type="input" name="translate" placeholder="Enter text" class="text_input" id="translationInp">
                <button type="submit">Translate</button>
            </form>
            <div class="result">
                @if(!empty($response_arr))
                    @if($response_arr['success'] == true)
                        <p><b>Translated text</b></p>
                        <p><?= $response_arr['translation'] ?></p>
                    @else
                        <p><?= $response_arr['error'] ?></p>
                    @endif
                @endif
            </div>
            @if($errors->any())
                <p>{{ implode('', $errors->all(':message')) }}</p>
            @endif
        </div>




    </body>
</html>
