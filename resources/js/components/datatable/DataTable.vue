<template>
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
</template>

<script>
export default {
    name: 'DataTable',
    // data () {
    //     return {
    //         headingTtl: "タスク一覧表示画面​"
    //     }
    // },
}
</script>
