<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                </div>
            @endif
        </div>

        <div class="container">
            <h2 class="text-center bg-light p-3 mb-3">タスク一覧表示画面​</h2>
            <nav class="nav nav-pills nav-fill border border-primary mb-5">
                <a class="nav-item nav-link active" href="#">当日タスク</a>
                <a class="nav-item nav-link" href="#">タスク登録</a>
            </nav>
            <h3 id="today" class="badge badge-primary p-3">2020/10/10</h3>

            <div class="table-responsive">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">親タスク</th>
                            <th scope="col" class="text-center">子タスク</th>
                            <th scope="col" class="text-center">孫タスク</th>
                            <th scope="col" class="text-center">予定工数</th>
                            <th scope="col" class="text-center">残工数</th>
                            <th scope="col" class="text-center">スケジュール</th>
                            <th scope="col" class="text-center">実工数入力</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" id="js-parentTask">
                                <span class="mr-1">JCOM</span>
                                <span class="badge"><button class="btn btn-info" type="button" data-toggle="collapse" data-target="#memo01" aria-expanded="false" aria-controls="memo01">+</button></span>
                            </th>
                            <td id="js-childTask">運用</td>
                            <td id="js-grandchildTask">キャンペーン一覧更新</td>
                            <td id="js-plan-workeffortTime">2h/5h</td>
                            <td id="js-remaining-workeffortTime">5h</td>
                            <td id="js-schedule" class="text-danger">10/10〜12/10</td>
                            <td id="js-actual-workeffortTime">
                                <input type="text" inputmode="numeric" class="form-control" placeholder="実工数を入力してください">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="7">
                                <div class="card">
                                    <div id="memo01" class="card-body collapse">
                                        This is some text within a card body.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="mr-1">JCOM</span>
                                <span class="badge"><button class="btn btn-info" type="button" data-toggle="collapse" href="#memo02" data-target="#memo02" aria-expanded="false" aria-controls="memo02">メモを見る</button></span>
                            </th>
                            <td>運用</td>
                            <td>キャンペーン一覧更新</td>
                            <td>2h/5h</td>
                            <td>5h</td>
                            <td>10/10〜12/10</td>
                            <td>
                                <input type="text" inputmode="numeric" class="form-control w-50 mx-auto" id="exampleFormControlInput1" placeholder="実工数を入力してください">
                            </td>
                        </tr>
                        <tr class="collapse" id="memo02">
                            <td colspan="7">
                                <div class="card">
                                    <div class="card-body">
                                        This is some text within a card body.
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">
                                <span class="mr-1">JCOM</span>
                                <span class="badge"><button class="btn btn-info" type="button" data-toggle="collapse" href="#memo03" data-target="#memo03" aria-expanded="false" aria-controls="memo03">メモを見る</button></span>
                            </th>
                            <td>運用</td>
                            <td>キャンペーン一覧更新</td>
                            <td>2h/5h</td>
                            <td>5h</td>
                            <td>10/10〜12/10</td>
                            <td>
                                <input type="text" inputmode="numeric" class="form-control" id="exampleFormControlInput1" placeholder="実工数を入力してください">
                            </td>
                        </tr>
                        <tr class="collapse" id="memo03">
                            <td colspan="7">
                                <div class="card">
                                    <div class="card-body">
                                        This is some text within a card body.
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center">
                <button id="workeffortSave" type="submit" class="btn btn-primary w-50">実工数保存</button>
            </div>






<!--
            <div class="row">
                <div class="col-6">
                1 of 3
                </div>
                <div class="col-6">
                2 of 3 (wider)
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                1 of 3
                </div>
                <div class="col-6">
                2 of 3 (wider)
                </div>
            </div> -->




        </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
    </body>
</html>
