<table class="table">
    <caption>Match Results</caption>
    <thead>
    <tr>
    </tr>
    </thead>
    <tbody>
    @foreach($matchresults as $matchresult)
        <tr>
            <td>{{$matchresult->teamname1}}</td>
            <td>{{$matchresult->goal1 + $matchresult->goal2}}</td>
            <td>{{$matchresult->teamname2}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
