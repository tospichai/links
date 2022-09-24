<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Links
    </title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/341a91bfcf.js" crossorigin="anonymous"></script>
</head>

<body>
    <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="absolute h-full w-full flex flex-col items-center justify-center">
            <div class="w-[80%] max-w-[400px] flex items-center flex-col">
                <div class="text-6xl mb-8">
                    Links{}
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Username</b>
                    <div class="flex">
                        <span class="inline-flex items-center px-3 text-gray-900 bg-slate-200 rounded-l-md font-bold">
                            link.co/
                        </span>
                        <input id="username" class="py-3 px-5 w-full bg-slate-100 rounded-none rounded-r-lg"
                            type="text" name="username" placeholder="username">
                    </div>
                    <div class="text-sm pt-1" id="checkusername" data-check="false">💡 you’ll get both openlink.co and
                        opl.to links for free
                    </div>
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Email</b>
                    <input id="email" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="text" name="email"
                        placeholder="E-mail">
                    <div class="text-sm pt-1" id="checkemail" data-check="false"></div>

                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Phone number (optional)</b>
                    <input class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="number" name="mobile"
                        placeholder="Phone number">
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Password</b>
                    <input id="password" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password"
                        name="password" placeholder="Password">
                    <div class="text-sm pt-1" id="checkpassword" data-check="false"></div>
                </div>
                <div class="px-3 w-full mb-3">
                    <b class="text-xs">Confirm password</b>
                    <input id="confirmpassword" class="py-3 px-5 w-full bg-slate-100 rounded-lg" type="password"
                        name="confirmpassword" placeholder="Confirm password">
                    <div class="text-sm pt-1" id="checkconfirmpassword" data-check="false"></div>
                </div>
                <div class="px-3 w-full mb-1 mt-3 text-center">
                    <div class="text-xs">By continuing, you agree to our terms and conditions.</div>
                </div>
                <div class="px-3 w-full mb-5">
                    <button id="signup" type="submit"
                        class="py-3 px-5 w-full bg-slate-800 rounded-lg text-white disabled:bg-slate-300" disabled>Sign
                        up</button>
                </div>
                <div class="mb-2">Already signed up? <a href="{{ route('login') }}"><span
                            class="font-bold underline">Log
                            in</span></a></div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script>
        function checkCanRegister() {
            if ($('#checkusername').attr('data-check') == 'true' &&
                $('#checkemail').attr('data-check') == 'true' &&
                $('#checkpassword').attr('data-check') == 'true' &&
                $('#checkconfirmpassword').attr('data-check') == 'true'
            ) {
                $("#signup").prop("disabled", false);
            } else {
                $("#signup").prop("disabled", true);
            }
        }

        $("#username").change(function() {
            var regex = /^[A-Za-z0-9_]*$/;
            const username = $(this).val();
            if (regex.test(username)) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('checkusername') }}/?username=' + username,
                    beforeSend: function() {
                        $('#checkusername').html('Checking username!');
                    },
                    success: function(data) {
                        if (data.isAvailable) {
                            $('#checkusername').html(
                                '<span class="text-green-500">The username is available.</span>');
                            $('#checkusername').attr('data-check', 'true');
                        } else {
                            $('#checkusername').html(
                                '<span class="text-red-500">The username is not available.</span>');
                            $('#checkusername').attr('data-check', 'false');
                        }
                        checkCanRegister()
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            } else {
                $('#checkusername').html(
                    '<span class="text-red-500">The username contains invalid characters. Only letters, numbers, periods, and underscores are allowed.</span>'
                );
            }
        });

        $("#email").change(function() {
            var regex = /\S+@\S+\.\S+/;
            const email = $(this).val();
            if (regex.test(email)) {
                $.ajax({
                    type: 'GET',
                    url: '{{ route('checkusername') }}/?email=' + email,
                    beforeSend: function() {
                        $('#checkemail').html('Checking email!');
                    },
                    success: function(data) {
                        if (data.isAvailable) {
                            $('#checkemail').html(
                                '<span class="text-green-500">The email is available.</span>');
                            $('#checkemail').attr('data-check', 'true');
                        } else {
                            $('#checkemail').html(
                                '<span class="text-red-500">The email is not available.</span>');
                            $('#checkemail').attr('data-check', 'false');
                        }
                        checkCanRegister()
                    },
                    error: function() {
                        console.log(data);
                    }
                });
            } else {
                $('#checkemail').html(
                    '<span class="text-red-500">The email format is incorrect.</span>');
            }
        });

        $("#password").change(function() {
            var regex = /^(?=.*\d).{8,}$/;
            const password = $(this).val();
            if (regex.test(password)) {
                $('#checkpassword').html('');
                $('#checkpassword').attr('data-check', 'true');
            } else {
                $('#checkpassword').html(
                    "<span class='text-red-500'>A password should contain more than 8 characters with at least 1 letter and number.</span>"
                );
                $('#checkpassword').attr('data-check', 'false');
            }
            checkCanRegister()
        });

        $("#confirmpassword").change(function() {
            const password = $("#password").val();
            const confirmpassword = $(this).val();
            if (password == confirmpassword) {
                $('#checkconfirmpassword').html('');
                $('#checkconfirmpassword').attr('data-check', 'true');
            } else {
                $('#checkconfirmpassword').html(
                    "<span class='text-red-500'>The password doesn't match.</span>");
                $('#checkconfirmpassword').attr('data-check', 'false');
            }
            checkCanRegister()
        });
    </script>
</body>

</html>
