<div class="predict-result-2 prediction">
    <table class="table-result">
        <caption>4 Week Predictions fo Championship</caption>
        <thead>
        <tr></tr>
        </thead>
        <tbody>
        @foreach($prediction as $result)
            <tr>
                <td width="100px">{{$result->teamname}}</td>
                <td></td>
                <td width="100px">{{$result->percentage}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
