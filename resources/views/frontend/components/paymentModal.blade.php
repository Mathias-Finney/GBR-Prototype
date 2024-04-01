{{-- first modal  --}}
<div class="modal fade modal1" id="staticBackdrop<?php echo $ID; ?>" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-hidden="true" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Summary</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $trip = App\Models\Trip::findOrFail($ID); ?>
                <?php $route = App\Models\Route::findOrFail($trip->route_id); ?>
                <?php $terminal = App\Models\Terminal::findOrFail($route->st_tem_id); ?>
                <?php $bus = App\Models\Bus::findOrFail($trip->bus_id); ?>
                <?php
                $tickets_bought = DB::table('tickets')
                    ->select(DB::raw('COUNT(trip_id) as number_of_tickets_bought'))
                    ->where('tickets.trip_id', '=', $trip->id)
                    ->get();
                
                $tickets_available = $bus->capacity - $tickets_bought[0]->number_of_tickets_bought;
                ?>
                <div class="summary-group ">
                    <div class="summary-header">Traveling From</div>
                    <hr />
                    <div class="summary-info">{{ $terminal->name }} ( {{ $terminal->location }} )</div>
                </div>
                <div class="summary-group">
                    <div class="summary-header">Traveling To</div>
                    <hr class="travelTo-rule" />
                    <div class="summary-info">{{ $route->end_terminal }}</div>
                </div>
                <div class="summary-group">
                    <div class="summary-header">Departure Date</div>
                    <hr />
                    <div class="summary-info">{{ $trip->departure }}</div>
                </div>
                <div class="summary-group">
                    <div class="summary-header">Estimated Time Of Arrival (ETA)</div>
                    <hr class="eta-rule" />
                    <div class="summary-info">{{ $trip->eta }}</div>
                </div>
                <div class="summary-group">
                    <div class="summary-header">Price per Ticket</div>
                    <hr />
                    <div class="summary-info">GHc{{ $route->price }}</div>
                </div>
                <div class="summary-group2">
                    <label for="num_of_tickets" class="form-label">Number Of Tickets</label>
                    <input type="number" min="1" max="{{ $tickets_available }}" name=""
                        class="form-control" id="num_of_tickets{{ $num + 1 }}"
                        placeholder="Enter the Number of Tickets"
                        value="{{ old('numberOfTickets' . $num) ? old('numberOfTickets' . $num) : '1' }}">
                </div>

                <script>
                    var num = {{ $num + 1 }};

                    // Add an event listener to the select element
                    document.getElementById('num_of_tickets' + {{ $num + 1 }}).addEventListener('change', function() {
                        // Retrieve the selected value
                        let selectedValue{{ $num + 1 }} = this.value;
                        let selectedValueB{{ $num + 1 }} = this.value;



                        //total price
                        let totalPrice{{ $num + 1 }} = selectedValue{{ $num + 1 }} * {{ $route->price }};
                        // console.log(totalPrice{{ $num + 1 }});


                        // Assign the selected value to a hidden input field
                        document.getElementById('selectedValueInput' + {{ $num + 1 }}).value =
                            selectedValue{{ $num + 1 }};
                        document.getElementById('selectedValueInputB' + {{ $num + 1 }}).value =
                            selectedValueB{{ $num + 1 }};
                        // document.getElementById('totalPrice').value = totalPrice;

                        // Log the selected value to the console
                        // console.log('Selected value:', selectedValue{{ $num + 1 }});

                        // Update the displayed value
                        document.getElementById('totalPrice' + {{ $num + 1 }}).textContent =
                            totalPrice{{ $num + 1 }};
                        // document.getElementById('displayedValue').textContent = selectedValue;

                    });
                </script>
                <div class="summary-group text-end mt-4">
                    <div class="summary-header">Total Price</div>
                    <input type="hidden" id="selectedValueInput{{ $num + 1 }}" value="1" />
                    <div class="summary-info">GHc<span id="totalPrice{{ $num + 1 }}">{{ $route->price }} </span>
                    </div>

                </div>




            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2<?php echo $ID; ?>"
                    data-bs-toggle="modal">Next</button>
            </div>
        </div>
    </div>
</div>




{{-- second modal  --}}
<div class="modal fade modal2" id="exampleModalToggle2<?php echo $ID; ?>" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalToggleLabel2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Payment</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="post" action="{{ route('trip.pay') }}">
                @csrf
                <div class="modal-body">

                    <div>
                        <input type="hidden" id="selectedValueInputB{{ $num + 1 }}"
                            name="numberOfTickets{{ $num }}"
                            value="{{ old('numberOfTickets' . $num) ? old('numberOfTickets' . $num) : '1' }}" />
                        <input type="hidden" id="tripid" name="tripID{{ $num }}"
                            value="{{ $ID }}" />
                        <input type="hidden" id="loopNumber" name="loopNumber" value="{{ $num }}" />
                        <div class="mb-3">
                            <label for="exampleInputUsername1" class="form-label">Select Network</label>
                            <Select
                                class="form-control {{ $errors->has('payNetwork' . $num) ? 'is-invalid' : 'border-primary' }} "
                                name="payNetwork{{ $num }}">
                                <option value="">Select...</option>
                                <option value="mtn" @if (old('payNetwork'.$num ) === 'mtn') selected @endif>MTN
                                    MOMO</option>
                                <option value="telecel" @if (old('payNetwork'.$num) === 'telecel') selected @endif>
                                    telecel cash</option>
                                <option value="at" @if (old('payNetwork'.$num) === 'at') selected @endif>at
                                    money</option>
                            </Select>
                            @if ($errors->has('payNetwork' . $num))
                                <div class="text-danger">
                                    {{ $errors->first('payNetwork' . $num) }}
                                </div>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="contact_phone1" class="form-label">Phone</label>

                            <div class="input-group">
                                <span
                                    class="input-group-text {{ $errors->has('phone' . $num) ? 'border-danger' : 'border-primary' }}"
                                    id="basic-addon1">+233</span>
                                <input id="contact_phone1" type="tel" maxlength="9"
                                    name="phone{{ $num }}"
                                    class="form-control {{ $errors->has('phone' . $num) ? 'is-invalid' : 'border-primary' }}"
                                    placeholder="" aria-label="Username" aria-describedby="basic-addon1"
                                    value="{{ old('phone' . $num) }}">

                            </div>
                            @if ($errors->has('phone' . $num))
                                <div class="text-danger">
                                    {{ $errors->first('phone' . $num) }}
                                </div>
                            @endif

                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn1" data-bs-target="#staticBackdrop<?php echo $ID; ?>"
                        data-bs-toggle="modal">Previous</button>
                    <button type="submit" class="btn btn2">Purchase</button>
                </div>
            </form>
        </div>
    </div>
</div>
