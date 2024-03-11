<x-guest-layout>

    
    <div class="busHiring-page">
        <div class="busHiring-head">
            <h1>BUS HIRING</h1>
        </div>
        
        <div class="busHiring-container row">
            <div class="busHiring-info col-6">
                <div class="busHiring-info1">
                    <h2 class="busHiring-info-head">Bus Hiring:</h2>
                    <p>
                        This is a regular customer request to the company.
                        Bus hire requests include funeral, religious programmes,
                        wedding functions and other activities. Customers’
                        requests are for domestic and international destinations.
                        These services range from a day’s trip to a couple of days.
                        Prominent on the corporate bus hire calendar is the annual
                        National Farmers’ celebrations
                    </p>
                </div>
                <div class="busHiring-info2">
                    <h2 class="busHiring-info-head">Bus Hiring Services For:</h2>
                    <ul>
                        <li>Wedding Functions</li>
                        <li>Schools</li>
                        <li>Personal Tours</li>
                        <li>Religious Functions</li>
                        <li>Funeral Functions</li>
                        <li>Group Traveling</li>
                    </ul>
                </div>
            </div>
            <div class="busHiring-form col-6 shadow">
                <form method="" action="" class="row ">
                    <h2>Request For Bus</h2>
                    <h6 class="mb-2" style="color: #010912;text-align: left;">Fields Mark with <a style="color: red;">*</a> are mandatory.</h6>
                    <hr style="margin-top: 0%;"/>
                    <div class="col-12">
                        <label for="name" class="form-label">Name/Company<a style="color: red;"> *</a></label>
                        <input type="text" name="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : 'border-primary' }}" id="name" placeholder="" value="{{old('name')}}">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="contact_name" class="form-label">Contact Name<a style="color: red;"> *</a></label>
                        <input type="text" name="contactName" class="form-control {{ $errors->has('contactName') ? 'is-invalid' : 'border-primary' }}" id="contact_name" placeholder="" value="{{old('contactName')}}">
                        @error('contactName')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="contact_phone1" class="form-label">Conact Number<a style="color: red;"> *</a></label>
                        <input type="tel" maxlength="9" name="phone1" class="form-control {{ $errors->has('phone1') ? 'is-invalid' : 'border-primary' }}" id="contact_phone1" placeholder="" value="{{old('phone1')}}">
                        @error('phone1')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="contact_phone2" class="form-label">Add. Contact Number</label>
                        <input type="tel" maxlength="9" name="phone2" class="form-control {{ $errors->has('phone2') ? 'is-invalid' : 'border-primary' }}" id="contact_phone2" placeholder="" value="{{old('phone2')}}">
                        @error('phone2')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="contact_email" class="form-label">Contact Email<a style="color: red;"> *</a></label>
                        <input type="text" name="contactEmail" class="form-control {{ $errors->has('contactEmail') ? 'is-invalid' : 'border-primary' }}" id="contact_email" placeholder="" value="{{old('contactEmail')}}">
                        @error('contactEmail')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="from_location" class="form-label">Begining Location<a style="color: red;"> *</a></label>
                        <input type="text" name="fromLocation" class="form-control {{ $errors->has('fromLocation') ? 'is-invalid' : 'border-primary' }}" id="from_location" placeholder="" value="{{old('fromLocation')}}">
                        @error('fromLocation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-6">
                        <label for="to_location" class="form-label">End Location<a style="color: red;"> *</a></label>
                        <input type="text" name="endLocation" class="form-control {{ $errors->has('endLocation') ? 'is-invalid' : 'border-primary' }}" id="to_location" placeholder="" value="{{old('endLocation')}}">
                        @error('endLocation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="departure_date" class="form-label">Departure Date<a style="color: red;"> *</a></label>
                        <input type="date" name="departureDate" class="form-control {{ $errors->has('departureDate') ? 'is-invalid' : 'border-primary' }}" id="departure_date" placeholder="" value="{{old('departureDate')}}">
                        @error('departureDate')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="number_of_busses" class="form-label">No.of Busses<a style="color: red;"> *</a></label>
                        <input type="number" min="1" name="numberOfBusses" class="form-control {{ $errors->has('numberOfBusses') ? 'is-invalid' : 'border-primary' }}" id="number_of_busses" placeholder="" value="{{old('numberOfBusses')}}">
                        @error('numberOfBusses')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-4">
                        <label for="bus_capacity" class="form-label">No.of Seats<a style="color: red;"> *</a></label>
                        <select name="busCapacity" class="form-control {{ $errors->has('busCapacity') ? 'is-invalid' : 'border-primary' }}" id="bus_capacity">
                            <option>-- Select --</option>
                            <option value="" @if(old('busCapacity') == '') selected="selected" @endif>45</option>
                            <option value="" @if(old('busCapacity') == '') selected="selected" @endif>55</option>
                        </select>
                        @error('busCapacity')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-4">
                        <label for="number_of_days" class="form-label">No.of Days<a style="color: red;"> *</a></label>
                        <input type="number" min="1" name="numberOfDays" class="form-control {{ $errors->has('numberOfDays') ? 'is-invalid' : 'border-primary' }}" id="number_of_days" placeholder="" value="{{old('numberOfDays')}}">
                        @error('numberOfDays')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="purpose" class="form-label">Purpose<a style="color: red;"> *</a></label>
                        <textarea name="purpose" class="form-control {{ $errors->has('purpose') ? 'is-invalid' : 'border-primary' }}" id="purpose" value="{{old('purpose')}}"></textarea>
                        @error('purpose')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <button type="button" class="btn"> Submit</button>
                    </div>
                    

                </form>

            </div>

        </div>
        <div class="page-footer">
        @include('frontend.footer')
        </div>

    </div>
</x-guest-layout>
