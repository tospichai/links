<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="absolute h-full w-full flex flex-col items-center justify-center">
        <div class="w-[80%] max-w-[400px] flex items-center flex-col">
            <div class="text-6xl mb-8">
                Links{}
            </div>
            <div class="px-3 w-full mb-3">
                <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="text" name="email" placeholder="E-mail or username">
            </div>
            <div class="px-3 w-full mb-3">
                <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password" name="password" placeholder="Password">
            </div>
            <div class="px-3 w-full mb-5">
                <button type="submit" class="py-3 px-5 w-full bg-slate-800 rounded-lg text-white">Login</button>
            </div>
            <div>Or</div>
            <div class="px-3 w-full mb-5">
            <a href="{{ route('facebook.login') }}">
                <div class="bg-slate-800 p-3 rounded-lg text-white mt-3 flex justify-center items-center gap-1">
                    <i class="fa-brands fa-square-facebook pr-1 mb-1"></i> Login with Facebook
                </div>
            </a>
            </div>
            <div class="mb-2">Not signed up yet? <span class="font-bold underline">Sign up</span></div>
            <div class="font-bold underline">Forgot password?</div>
            
        </div>
    </div>
</body>

</html>