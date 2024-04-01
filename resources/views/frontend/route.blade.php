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
                        <input type="text" name="startLocation"
                            class="form-control {{ $errors->has('startLocation') ? 'is-invalid' : 'border-primary' }}"
                            id="travel-from" placeholder="Coming from"
                            value="{{ old('startLocation') ? old('startLocation') : $start_terminal }}">
                        @error('startLocation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <ul class="list1"></ul>
                </div>

                <div class="col-md-4 mt-4">
                    <div>
                        <label for="travel-to" class="form-label">Traveling To</label>
                        <input type="text" name="endLocation"
                            class="form-control {{ $errors->has('endLocation') ? 'is-invalid' : 'border-primary' }}"
                            id="travel-to" placeholder="Going to"
                            value="{{ old('endLocation') ? old('endLocation') : $end_terminal }}">
                        @error('endLocation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <ul class="list2"></ul>
                </div>
                <div class="col-md-4 mt-4">
                    <label for="travel-date" class="form-label">Travel Date</label>
                    <input type="date" name="travelDate"
                        class="form-control {{ $errors->has('travelDate') ? 'is-invalid' : 'border-primary' }}"
                        id="travel-date" placeholder="When are you traveling"
                        value="{{ old('travelDate') ? old('travelDate') : $travel_date }}">
                    @error('travelDate')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3"></div>
                <div class="col-6 button-container">
                    <button type="submit" class="btn find-btn">Find</button>

                </div>
                <div class="col-3"></div>
            </form>
        </div>
        <div class="route-table table-responsive">
            <table class="table table-striped table-hover text-center w-100 table-responsive">
                <thead class="table-primary">
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

                    @for ($num = 0; $num < count($data); $num++)
                        <tr>
                            <th scope="row">{{ $num + 1 }}</th>
                            <td>{{ $data[$num]->start_terminal }} ( {{ $data[$num]->location }} )</td>
                            <td>{{ $data[$num]->end_terminal }}</td>
                            <td>{{ $data[$num]->departure }}</td>
                            <td>{{ $data[$num]->price }}</td>
                            <?php $ID = $data[$num]->id ?>
                            
                            <td class="text-success">
                              <button type="button" class="btn btn-outline-success @guest tooltip1 @endguest" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $ID;?>" >
                                Book
                                @guest<span class="tooltiptext">Can't Book Unless You Sign In</span>@endguest
                              </button>
                              
                            </td>
                        </tr>

                        @auth   {{-- payment modal  --}}
                            @include('frontend.components.paymentModal')
                        @endauth


                    @endfor
                </tbody>
            </table>
            
            

        </div>
        <div class="page-footer">
            @include('frontend.footer')
        </div>

    </div>

    {{-- Javascript function for autocomplete search  --}}
    @include('frontend.components.autoCompleteSearchScript')

</x-guest-layout>
