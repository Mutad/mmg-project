<table class="table table-borderless col-sm-3">
    <thead>
        <tr>
            <th>Browser</th>
            <th>Unique Visitors</th>
        </tr>
    </thead>
    <tbody>

        @foreach (Redis::hgetall('visits') as $browser=>$visitors)
        <tr>
            <td>{{$browser}}</td>
            <td>{{$visitors}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
