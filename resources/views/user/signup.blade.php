<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 新規登録</title>
</head>
<!-- ログイン画面 -->

<body class="">
    <x-header></x-header>
    <div class="page signup-page">
        <form class="form" action="/signup" name="signup" method="post">
            @csrf
            <div class="form-item username">
                <label for="username">ユーザーネーム</label>
                <input type="text" id="username" name="username" />
            </div>@error('username')
            <div class="mt-3">
                <p class="text-red-500">
                    {{ $message }}
                </p>
            </div>
            @enderror
            <div class="form-item email">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" />
            </div>@error('email')
            <div class="mt-3">
                <p class="text-red-500">
                    {{ $message }}
                </p>
            </div>
            @enderror
            <div class="form-item password">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" />

            </div>@error('password')
            <div class="mt-3">
                <p class="text-red-500">
                    {{ $message }}
                </p>
            </div>
            @enderror

            <div class="signup-button">
                <button class="button-white" id="btnSubmit" type="button">新規登録</button>

            </div>
        </form>
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    //前期のjavascript
    window.onload = function () {
        btnSubmit.addEventListener('click', function (event) {
            const submit = document.getElementById('submit')
            const email = document.getElementById('email');
            const password = document.getElementById('password');
            const emailreg = /^[a-zA-Z0-9]{1}[a-zA-Z0-9_.+-]*@{1}[a-zA-Z0-9_.+-]+.[a-zA-Z0-9]+$/;
            const Passreg = /^[a-zA-Z0-9.?/-]{8,}$/;

            let message = [];
            if (email.value == '') {
                message.push('メールアドレスが未入力です')
            } else if (!emailreg.test(email.value)) {
                message.push('メールアドレスの形式が不正です')
            }
            if (password.value == '') {
                message.push('パスワードが未入力です');
            } else if (!Passreg.test(password.value)) {
                message.push('8文字以上の半角英数字､記号で入力してください')
            }
            if (message.length > 0) {
                alert(message);
                return;
            }
            document.signup.submit()
        });
    };
</script>
<style scoped>
    .signup-page {
        display: flex;
        justify-content: center;
    }

    .signup-page .title {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }

    .signup-page .form {
        width: 60vw;
    }

    .signup-page input {
        height: 30px;
        border-radius: 10px;
        background-color: lightgray;
    }

    .signup-page .form-item {
        display: flex;
        flex-direction: column;
        margin-top: 10px;
    }

    .signup-page .singup-button {
        text-align: center;
        margin-top: 10px;
    }

    .signup-page button {
        width: 50%;
        height: 30px;
        font-size: 18px;
    }

    .signup-page .error-message {
        margin-top: 5px;
        font-size: 10px;
    }
</style>

</html>