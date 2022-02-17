<table class="table">
    <caption>League Table</caption>
    <thead>
    <tr>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Teams</td>
        <td>PTS</td>
        <td>P</td>
        <td>W</td>
        <td>D</td>
        <td>L</td>
        <td>GD</td>
    </tr>
    @foreach($leaguetables as $leaguetable)
        <tr>
            <td>{{$leaguetable->team_name}}</td>
            <td>{{$leaguetable->pts}}</td>
            <td>{{$leaguetable->p}}</td>
            <td>{{$leaguetable->w}}</td>
            <td>{{$leaguetable->d}}</td>
            <td>{{$leaguetable->l}}</td>
            <td>{{$leaguetable->gd}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
