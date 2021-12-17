@extends("main")
@section("content")
    <div class="p-4">
    <table id="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama pemesan</th>
                <th>Durasi</th>
                <th>Total</th>
                <th>Email</th>
                <th>Hotel</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            @foreach($data as $k)
                <?php $count++ ?>
                <tr>
                    <td>{{$count}}</td>
                    <td>{{$k->user->name}}</td>
                    <td>{{$k->durasi}}</td>
                    <td>Rp. {{$k->total}}</td>
                    <td>{{$k->user->email}}</td>
                    <td>{{$k->hotel->name}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
@endsection

@section("script")
    <script>
        $(document).ready( function () {
            $('#table').DataTable();
        } );
    </script>
@endsection