<a href="/game" class="btn btn-outline-success btn-xs">Play Game</a>

<div class="cardhh mt-5 wow zoomIn" data-wow-delay="0.2s">
    <div class="row text-center">
        <div class="col-md-6">
            <h3> Travel Master</h3>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Your Score</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($user_game1 as $res)
                                <tr class="gradeU">
                                    <td>{{$res->score}}</td>
                                    <td>{{$res->time}}</td>


                                </tr>
                            @endforeach


                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Highest Score</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($game1 as $res)
                                <tr class="gradeU">
                                    <td>{{$res->score}}</td>
                                    <td>{{$res->time}}</td>


                                </tr>
                            @endforeach


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>


        </div>
        <div class="col-md-6">
            <h3> Mission Finder</h3>
            <hr>
            <div class="row">


                <div class="col-md-6">
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Your Score</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($user_game2 as $res)
                                <tr class="gradeU">
                                    <td>{{$res->score}}</td>
                                    <td>{{$res->time}}</td>


                                </tr>
                            @endforeach


                            </tbody>


                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Highest Score</th>
                                <th>Time</th>


                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($game2 as $res)
                                <tr class="gradeU">
                                    <td>{{$res->score}}</td>
                                    <td>{{$res->time}}</td>


                                </tr>
                            @endforeach


                            </tbody>


                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
