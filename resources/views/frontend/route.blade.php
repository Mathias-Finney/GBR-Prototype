<x-guest-layout>

    
    <div class="routes-page">
        <div class="route-head mt-5">
            <h1>ROUTE SCHEDULES AND FARES</h1>
        </div>
        <div class="route-form">
            <form method="POST" action="{{ route('routepageSearch') }}" class="row">
              @csrf
              <div class="col-md-4 mt-4">
                <div>
                  <label for="travel-from" class="form-label">Traveling From</label>
                  <input type="text" name="startLocation" class="form-control {{ $errors->has('startLocation') ? 'is-invalid' : 'border-primary' }}" id="travel-from" placeholder="Coming from" value="{{ old('startLocation') ? old('startLocation') : $start_terminal}}">
                  @error('startLocation')
                        <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <ul class="list1"></ul>
              </div>
              
              <div class="col-md-4 mt-4">
                <div>
                  <label for="travel-to" class="form-label">Traveling To</label>
                  <input type="text" name="endLocation" class="form-control {{ $errors->has('endLocation') ? 'is-invalid' : 'border-primary' }}" id="travel-to" placeholder="Going to" value="{{ old('endLocation') ? old('endLocation') : $end_terminal}}">
                  @error('endLocation')
                        <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                  <ul class="list2"></ul>
              </div>
              <div class="col-md-4 mt-4">
                  <label for="travel-date" class="form-label">Travel Date</label>
                  <input type="date" name="travelDate" class="form-control {{ $errors->has('travelDate') ? 'is-invalid' : 'border-primary' }}" id="travel-date" placeholder="When are you traveling" value="{{ old('travelDate') ? old('travelDate') : $travel_date}}">
                  @error('travelDate')
                        <div class="text-danger">{{ $message }}</div>
                  @enderror
              </div>
              <div class="col-3"></div>
              <div class="col-6 button-container">
                  <button type="submit" class="btn btn-success">Find</button>
              </div>
              <div class="col-3"></div>
            </form>
        </div>
        <div class="route-table table-responsive">
            <table class="table table-striped table-hover text-center w-100 table-responsive">
                <thead class="table-primary" >
                  <tr class="bg-primary">
                    <th scope="col">#</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Date&Time</th>
                    <th scope="col">Fare(GHc)</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  
                  @for($num = 0; $num < count($data); $num++)
                    <tr>
                      <th scope="row">{{ $num + 1 }}</th>
                      <td>{{ $data[$num]->start_terminal }}</td>
                      <td>{{ $data[$num]->end_terminal }}</td>
                      <td>{{ $data[$num]->departure }}</td>
                      <td>{{ $data[$num]->price }}</td>
                      <td class="text-success">
                        <a class="btn btn-outline-success" href="{{ route('edit.route', $data[$num]->id) }}">Book</a>
                      </td>  
                    </tr>
               
                  @endfor
                 

                 

        
                </tbody>
              </table>

        </div>
        <div class="page-footer">
        @include('frontend.footer')
        </div>

    </div>

    <script type="text/javascript">

      
      var all_terminalsArray = @json($all_terminals->toArray());
    
      
      var allTerminalsNames = [];

      for (var i = 0; i < all_terminalsArray.length; i++) {
      
          var a = Object.values(all_terminalsArray[i]);
          var b = a.toString();
          allTerminalsNames.push(b);
      }
 
      let all_terminals_sort = allTerminalsNames.sort();



      // For the travel from input box
      let travelFrom = document.getElementById("travel-from");

      travelFrom.addEventListener("keyup", (e) => {

        removeElements();
        let inputValue1 = travelFrom.value.toLowerCase();

        // initially remove all elements
        // removeElements();

        for(let i of all_terminals_sort){
          //converting input to lower case and compare with each string
          if(i.toLowerCase().startsWith(inputValue1) && inputValue1 !== "" ) {
            let listItem = document.createElement('li');
            listItem.classList.add('list-items');
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames('" + i + "')");

            //Display matched part in bold
            let word = "<b>" + i.substr(0, inputValue1.length) + "</b>";
            word+= i.substr(inputValue1.length);
            
            listItem.innerHTML = word;
            document.querySelector(".list1").appendChild(listItem);
          }
        }
      });
      function displayNames(value) {
        travelFrom.value = value;
        removeElements();
      }
      function removeElements() {
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
          item.remove();

        });
      }


      // For the travel to input box
      let travelTo = document.getElementById("travel-to");

      travelTo.addEventListener("keyup", (e) => {

        removeElements();
        let inputValue2 = travelTo.value.toLowerCase();

        // initially remove all elements
        // removeElements();

        for(let i of all_terminals_sort){
          //converting input to lower case and compare with each string
          if(i.toLowerCase().startsWith(inputValue2) && inputValue2 !== "" ) {
            let listItem = document.createElement('li');
            listItem.classList.add('list-items');
            listItem.style.cursor = "pointer";
            listItem.setAttribute("onclick", "displayNames2('" + i + "')");

            //Display matched part in bold
            let word = "<b>" + i.substr(0, inputValue2.length) + "</b>";
            word+= i.substr(inputValue2.length);
            
            listItem.innerHTML = word;
            document.querySelector(".list2").appendChild(listItem);
          }
        }
      });
      function displayNames2(value) {
        travelTo.value = value;
        removeElements();
      }
      function removeElements() {
        let items = document.querySelectorAll(".list-items");
        items.forEach((item) => {
          item.remove();

        });
      }


    </script>
</x-guest-layout>
