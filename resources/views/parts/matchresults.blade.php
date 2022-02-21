<table class="table">
    <caption>Match Results</caption>
    <caption>{{$week}} Match Results</caption>
    <thead>
    <tr>
    </tr>
    </thead>
    <tbody>
    @foreach($matchresults as $matchresult)
        <tr>
            <td>{{$matchresult->teamname1}}</td>
            <td>{{$matchresult->goal1 .'-'. $matchresult->goal2}}</td>
            <td>{{$matchresult->teamname2}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>

<div class="inputs">
    <a class="play-all" href="/play-all?week={{$week}}" id="play-all" type="button" value="Play All">
        play-all
    </a>
    <style>
        .play-all {
            background-color: red;
        }
    </style>
    <a href="/next-week?week={{$week+1}}" id="next-week" type="button" value="Next Week">
        next-week
    </a>
</div>

