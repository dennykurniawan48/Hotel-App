@extends("main")
@section("content")
    <div class="p-4">
        <a href="/createhotel" class="bg-blue-500 p-2 text-base text-white rounded">Tambah Hotel</a>
    </div>
    <div class="p-4">
    <table id="table">
        <thead>
            <tr>
                <th style="width:15%">No</th>
                <th style="width:85%">Hotel</th>
                <th style="width:85%">Latitude</th>
                <th style="width:85%">Longitude</th>
                <th style="width:85%">Biaya / malam</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            @foreach($data as $k)
                <?php $count++ ?>
                <tr>
                    <td class="text-center">{{$count}}</td>
                    <td class="text-center">{{$k->name}}</td>
                    <td class="text-center">{{$k->latitude}}</td>
                    <td class="text-center">{{$k->longitude}}</td>
                    <td class="text-center" width="15%">Rp. {{number_format($k->biaya, 2)}}</td>
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