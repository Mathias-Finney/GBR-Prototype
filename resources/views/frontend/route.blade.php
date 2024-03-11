<x-guest-layout>

    
    <div class="routes-page">
        <div class="route-head mt-5">
            <h1>ROUTE SCHEDULES AND FARES</h1>
        </div>
        <div class="route-form">
            <form class="row">
                <div class="col-md-4 mt-4">
                    <label for="travel-from" class="form-label">Traveling From</label>
                    <input type="text" name="" class="form-control border-primary" id="travel-From" placeholder="Coming from" value="">
                </div>
                <div class="col-md-4 mt-4">
                    <label for="travel-to" class="form-label">Traveling To</label>
                    <input type="text" name="" class="form-control border-primary" id="travel-to" placeholder="Going to" value="">
                </div>
                <div class="col-md-4 mt-4">
                    <label for="travel-date" class="form-label">Travel Date</label>
                    <input type="date" name="" class="form-control border-primary" id="travel-date" placeholder="When are you traveling" value="">
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
                    <th scope="col">Time</th>
                    <th scope="col">Fare(GHc)</th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody class="table-group-divider">
                  <tr>
                    <th scope="row">1</th>
                    <td>ACCRA(CIRCLE)</td>
                    <td>HO</td>
                    <td>5:00am</td>
                    <td>80.00</td>
                    <td class="text-success"><a href="#">Book</a></td>
                  </tr>
                  <tr>
                    <th scope="row">1</th>
                    <td>ACCRA(CIRCLE)</td>
                    <td>HO</td>
                    <td>5:00am</td>
                    <td>80.00</td>
                    <td class="text-success"><a href="#">Book</a></td>
                  </tr>
                  
                </tbody>
              </table>

        </div>
        <div class="page-footer">
        @include('frontend.footer')
        </div>

    </div>
</x-guest-layout>
