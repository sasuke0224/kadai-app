<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('/css/reset.css') }}" />

    <title>kadai-app | 投稿</title>
</head>
<!-- 投稿画面 -->

<body class="">
    <x-header></x-header>
    <div class="page post-page">
        <form class="form" action="/post" method="post">
            @csrf
            <textarea name="postContent" id="post_text" cols="30" rows="5" placeholder="いまどうしてる?"></textarea>
            <div class="post-button">
                <button class="button-white" id="btnSubmit" type="submit">投稿する</button>
                @error('postContent')
                <div class="mt-3">
                    <p class="text-red-500">
                        {{ $message }}
                    </p>
                </div>
                @enderror
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('/js/app.js') }}"></script>
<script>
    /*ここに前期のjavascriptの課題を活用してアラートを出す*/
    window.onload = function () {
        btnSubmit.addEventListener('click', function (event) {
            const btnSubmit = document.getElementById('btnSubmit');
            const post_text = document.getElementById('post_text');
            const max_length = 140;
            const str = (post_text.value).length

            let message = [];
            if (post_text.value == '') {
                message.push('1文字以上記入してください');
            }
            if (str > max_length) {
                message.push('140文字以内にしてください');
            }
            if (message.length > 0) {
                alert(message);
                return;
            }
            alert('投稿完了');
        });
    };
</script>
<style scoped>
    .post-page .form {
        display: flex;
        flex-direction: column;
    }

    .post-page .post-button {
        text-align: end;
        margin: 20px 20px 0 0;
    }

    .post-page button {
        height: 35px;
        width: 90px;
    }
</style>

</html>