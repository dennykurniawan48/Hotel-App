@extends("main")
@section("content")
<div class="p-4">
    <div>
  <div class="md:grid md:grid-cols-3 md:gap-6">
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form action="/addhotel" method="post" enctype="multipart/form-data">
        <div class="shadow sm:rounded-md sm:overflow-hidden">
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
            <div class="grid grid-cols-3 gap-6">
              @csrf
              <div class="col-span-3 sm:col-span-2">
                <label for="nama" class="block text-sm font-medium text-gray-700">
                  Nama Hotel
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="nama" id="nama" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 border-2" placeholder="Nama Hotel">
                </div>
                @if($errors->has('nama'))
                <div class="text-red-500">{{ $errors->first('nama') }}</div>
                @endif
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                  Alamat
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="text" name="alamat" id="alamat" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 border-2" placeholder="Alamat">
                </div>
                @if($errors->has('alamat'))
                <div class="text-red-500">{{ $errors->first('alamat') }}</div>
              @endif
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                  Harga
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="number" name="biaya" id="biaya" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 border-2" placeholder="Biaya per malam">
                </div>
                @if($errors->has('biaya'))
                <div class="text-red-500">{{ $errors->first('biaya') }}</div>
              @endif
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                  Latitude
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="string" name="latitude" id="latitude" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 border-2" placeholder="Latitude">
                </div>
                @if($errors->has('latitude'))
                <div class="text-red-500">{{ $errors->first('latitude') }}</div>
              @endif
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="alamat" class="block text-sm font-medium text-gray-700">
                  Longitude
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                  <input type="string" name="longitude" id="longitude" class="p-2 focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 border-2" placeholder="Longitude">
                </div>
                @if($errors->has('longitude'))
                <div class="text-red-500">{{ $errors->first('longitude') }}</div>
              @endif
              </div>
            </div>

            <div class="grid grid-cols-3 gap-6">
              <div class="col-span-3 sm:col-span-2">
                <label for="company_website" class="block text-sm font-medium text-gray-700">
                  Kota
                </label>
                <div class="mt-1 flex rounded-md shadow-sm">
                <select
                        id="kota"
                        name="kota"
                        autoComplete="country-name"
                        className="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                      >
                      @foreach($data as $d)
                        <option value="{{$d->id}}">{{$d->nama}}</option>
                      @endforeach
                      </select>
                </div>
              </div>
            </div>

            <div>
              <label for="about" class="block text-sm font-medium text-gray-700">
                Fasilitas
              </label>
              <div class="mt-1">
                <textarea id="fasilitas" name="fasilitas" rows="3" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border-gray-300 border-2 p-2 rounded-md" placeholder="fasilitas"></textarea>
              </div>
              @if($errors->has('fasilitas'))
                <div class="text-red-500">{{ $errors->first('fasilitas') }}</div>
              @endif
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700">
                Photo
              </label>
              <div class="mt-1 flex items-center">
             
                <input type="file" name="foto" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"></input>
              </div>
              @if($errors->has('foto'))
                <div class="text-red-500">{{ $errors->first('foto') }}</div>
              @endif
            </div>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button id="btnaddhotel" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Save
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>    
    </div>
@endsection

@section("script")
    
    <script>
        $(document).ready( function () {
            $('#table').DataTable();

            $('#btnaddhotel').click(function() {
                console.log("Hello");
            });
        } );
    </script>
@endsection