<x-guest-layout>

<style>

.profile-part1{
  border-right: 1px solid #0155C2;
}

.profile-part2{
  border-right: 1px solid #fc7400;
  
}
/* 
.profile-part2 .form-control{
  border-color: #0155C2;
  
} */
.profile-part2 .form-group{
  margin-top: 20px;
  
} 
/* .form-control:focus {
    box-shadow: none;
    border-color: #BA68C8
} */

.profile-button {
    
    box-shadow: none;
    border: none
}

.profile-part2 .profile-button {
    background:#0155C2;
}
.profile-part2 .profile-button:hover {
    background:#fc7400;
}

.profile-part3 .profile-button {
  background:#0155C2;
}

.profile-part3 .profile-button:hover {
  background:#fc7400;
}

.profile-button:focus {
    background: #682773;
    box-shadow: none
}

.profile-button:active {
    background: #682773;
    box-shadow: none
}

.back:hover {
    color: #682773;
    cursor: pointer
}

/* .labels {
    font-size: 11px
} */

.add-experience:hover {
    background: #BA68C8;
    color: #fff;
    cursor: pointer;
    border: solid 1px #BA68C8
}

</style>
{{-- 
<div class="container rounded bg-white mt-5 mb-5 shadow pt-4 pb-4">
<form action="" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-md-3 border-right profile-part1">
        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
          <img class="rounded-circle mt-5" width="150px" height="150px" src="logoorange.jpg">
          <span class=" mt-3" style="width: 88px">
            
            
                <input type="file" class="form-control form-control-sm " aria-label="Upload" name="profile_pic">
            
          </span>
          <span class="font-weight-bold mt-4">
            {{ Auth::user()->name }}
          </span>
          <span class="text-black-50">
            {{ Auth::user()->email }}
          </span>
          <span>
          </span>
        </div>
      </div>
      <div class="col-md-5 border-right profile-part2">
        <div class="p-3 py-5">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="text-right">
              Profile Settings
            </h4>
          </div>
          <div class="row mt-3">

            <div class="col-md-12 form-group">
              <label class="labels">
                Userame
              </label>
              <input type="text" name="username" class="form-control" placeholder="username.." value="{{ old('username') ? old('username') : Auth::user()->username }}">
                @if($errors->has('username'))
                    <div class="alert alert-danger">
                        {{ $errors->first('username') }}
                    </div>
                @endif
            </div>
            <div class="col-md-12 form-group">
              <label class="labels">
                Name
              </label>
              <input type="text" name="name" class="form-control" placeholder="name.." value="{{ old('name') ? old('name') : Auth::user()->name }}">
                @if($errors->has('name'))
                    <div class="alert alert-danger">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
              <label class="labels">
                Email
              </label>
              <input type="text" name="email" class="form-control" placeholder="email@example.com" value="{{ old('email') ? old('email') : Auth::user()->email }}">
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
              <label class="labels">
                Address
              </label>
              <input type="text" name="address" class="form-control" placeholder="address.." value="{{ old('address') ? old('address') : Auth::user()->address }}">
                @if($errors->has('address'))
                    <div class="alert alert-danger">
                        {{ $errors->first('address') }}
                    </div>
                @endif
            </div>

            <div class="col-md-12 form-group">
                <label class="labels">
                    Phone Number
                </label>
                
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1" >+233</span>
                    <input name="phone" type="text" name="phone" class="form-control" placeholder="User's Contact.." aria-label="Username" aria-describedby="basic-addon1" value="{{ old('phone') ? old('phone') : Auth::user()->phone }}">
                    
                </div>
                @if($errors->has('phone'))
                        <div class="alert alert-danger">
                            {{ $errors->first('phone') }}
                        </div>
                @endif
            </div>



            
           
        </div>
          
          <div class="mt-5 text-center">
            <button class="btn btn-primary profile-button" type="submit">
              Save Profile
            </button>
          </div>
        </div>
      </div>
      
    </div>
</form>
  </div>
   --}}

  <div class="container rounded bg-white mt-5 mb-5 shadow pt-4 pb-4">
    <div class="row">
      <form action="" class="col-8" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="row">
            <div class="col-md-5 border-right profile-part1">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="rounded-circle mt-5" width="150px" height="150px" src="logoorange.jpg">
                <span class=" mt-3" style="width: 88px">
                  
                      <input type="file" class="form-control form-control-sm " aria-label="Upload" name="profile_pic">
                  
                </span>
                <span class="font-weight-bold mt-4">
                  {{ Auth::user()->name }}
                </span>
                <span class="text-black-50">
                  {{ Auth::user()->email }}
                </span>
                <span>
                </span>
              </div>
            </div>
            <div class="col-md-7 border-right profile-part2">
              <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h3 class="text-right" style="color:#fc7400;font-weight: 510">
                    Profile Settings
                  </h3>
                </div>
                <div class="row mt-3">
      
                  <div class="col-md-12 form-group">
                    <label class="form-label">
                      Userame
                    </label>
                    <input type="text" name="username" class="form-control" placeholder="username.." value="{{ old('username') ? old('username') : Auth::user()->username }}">
                      @if($errors->has('username'))
                          <div class="alert alert-danger">
                              {{ $errors->first('username') }}
                          </div>
                      @endif
                  </div>
                  <div class="col-md-12 form-group">
                    <label class="form-label">
                      Name
                    </label>
                    <input type="text" name="name" class="form-control" placeholder="name.." value="{{ old('name') ? old('name') : Auth::user()->name }}">
                      @if($errors->has('name'))
                          <div class="alert alert-danger">
                              {{ $errors->first('name') }}
                          </div>
                      @endif
                  </div>
      
                  <div class="col-md-12 form-group">
                    <label class="form-label">
                      Email
                    </label>
                    <input type="text" name="email" class="form-control" placeholder="email@example.com" value="{{ old('email') ? old('email') : Auth::user()->email }}">
                      @if($errors->has('email'))
                          <div class="alert alert-danger">
                              {{ $errors->first('email') }}
                          </div>
                      @endif
                  </div>
      
                  <div class="col-md-12 form-group">
                    <label class="form-label">
                      Address
                    </label>
                    <input type="text" name="address" class="form-control" placeholder="address.." value="{{ old('address') ? old('address') : Auth::user()->address }}">
                      @if($errors->has('address'))
                          <div class="alert alert-danger">
                              {{ $errors->first('address') }}
                          </div>
                      @endif
                  </div>
      
                  <div class="col-md-12 form-group">
                      <label class="form-label">
                          Phone Number
                      </label>
                      
                      <div class="input-group">
                          <span class="input-group-text" id="basic-addon1" >+233</span>
                          <input name="phone" type="text" name="phone" class="form-control" placeholder="User's Contact.." aria-label="Username" aria-describedby="basic-addon1" value="{{ old('phone') ? old('phone') : Auth::user()->phone }}">
                          
                      </div>
                      @if($errors->has('phone'))
                              <div class="alert alert-danger">
                                  {{ $errors->first('phone') }}
                              </div>
                      @endif
                  </div>
      
      
      
                  
                
              </div>
                
                <div class="mt-5 text-center">
                  <button class="btn btn-primary w-100 profile-button" type="submit">
                    Save Profile
                  </button>
                </div>
              </div>
            </div>
            
          </div>
      </form>
      <div class="col-4 profile-part3 mt-5 pe-5 ps-5">
        <h3 style="color:#fc7400;font-weight: 510">Change Password</h3>
        <form action="" method="" class="pt-2">
          @csrf
          <div class="col-md-12 mt-4" style="text-align: left;">
            <label for="input_Password" class="form-label">Old Password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="input_Password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12 mt-4" style="text-align: left;">
            <label for="input_Password" class="form-label">New Password</label>
            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="input_Password" required>
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="col-md-12 mt-4" style="text-align: left;">
            <label for="input_Password" class="form-label">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="input_Password" required>
            @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="mt-5 text-center">
            <button class="btn btn-primary w-100 profile-button" type="submit">
              Change Password
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
     
    
</x-guest-layout>