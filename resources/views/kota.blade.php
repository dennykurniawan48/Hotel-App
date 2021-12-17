@extends("main")
@section("content")
    <div class="p-4">
        <button class="bg-blue-500 p-2 text-base text-white rounded modal-open">Tambah kota</button>
    </div>
    <div class="p-4">
    <table id="table">
        <thead>
            <tr>
                <th style="width:15%">No</th>
                <th style="width:85%">Kota</th>
            </tr>
        </thead>
        <tbody>
            <?php $count = 0; ?>
            @foreach($data as $k)
                <?php $count++ ?>
                <tr>
                    <td class="text-center">{{$count}}</td>
                    <td class="text-center">{{$k->nama}}</td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold"></p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
      <div>
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
        Nama kota
      </label>
      <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" type="text" placeholder="nama kota">
        <p class="py-2 text-red-500" id="errorkota"></p>  
    </div>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button id="save" class="px-4 bg-transparent p-3 rounded-lg text-indigo-500 hover:bg-gray-100 hover:text-indigo-400 mr-2">Add kota</button>
          <button id="close" class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Close</button>
        </div>
        
      </div>
    </div>
  </div>
@endsection

@section("script")
    <script>
        $(document).ready( function () {
            $('#table').DataTable();

            document.getElementById("save").addEventListener("click", () => {
                if(document.getElementById('nama').value){
                    axios.post('/api/kota', {
                        nama: document.getElementById('nama').value
                    })
                    .then(function (response) {
                        console.log(response);
                        var closemodal = document.getElementById('close')
                        closemodal.click();
                        location.reload();
                    })
                    .catch(function (error) {
                        console.log(error);
                        document.getElementById('errorkota').innerHTML = "Error tambah data" 
                    });
                }else{
                    document.getElementById('errorkota').innerHTML = "Nama kota tidak boleh kosong" 
                }
            });
        } );
    </script>
    
     <script>
    var openmodal = document.querySelectorAll('.modal-open')
    for (var i = 0; i < openmodal.length; i++) {
      openmodal[i].addEventListener('click', function(event){
    	event.preventDefault()
    	toggleModal()
      })
    }
    
    const overlay = document.querySelector('.modal-overlay')
    overlay.addEventListener('click', toggleModal)
    
    var closemodal = document.querySelectorAll('.modal-close')
    for (var i = 0; i < closemodal.length; i++) {
      closemodal[i].addEventListener('click', toggleModal)
    }
    
    document.onkeydown = function(evt) {
      evt = evt || window.event
      var isEscape = false
      if ("key" in evt) {
    	isEscape = (evt.key === "Escape" || evt.key === "Esc")
      } else {
    	isEscape = (evt.keyCode === 27)
      }
      if (isEscape && document.body.classList.contains('modal-active')) {
    	toggleModal()
      }
    };
    
    
    function toggleModal () {
      const body = document.querySelector('body')
      const modal = document.querySelector('.modal')
      modal.classList.toggle('opacity-0')
      modal.classList.toggle('pointer-events-none')
      body.classList.toggle('modal-active')
    }
    
     
  </script>
@endsection