    <table class="predict-result-2 prediction table-result">
        <caption>{{$week}} Week Predictions fo Championship</caption>
        <thead>
        <tr></tr>
        </thead>
        <tbody>
        @foreach($prediction as $result)
            <tr>
                <td>{{$result->teamname}}</td>
                <td></td>
                <td>{{$result->percentage}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
