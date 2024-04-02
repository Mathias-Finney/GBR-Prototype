<x-guest-layout>

    <style>
        .profile-part1 {
            border-right: 1px solid #0155C2;
        }

        .profile-part2 {
            border-right: 1px solid #fc7400;

        }


        .profile-button {

            box-shadow: none;
            border: none
        }

        .profile-part2 .profile-button {
            background: #0155C2;
        }

        .profile-part2 .profile-button:hover {
            background: #fc7400;
        }

        .profile-part3 .profile-button {
            background: #0155C2;
        }

        .profile-part3 .profile-button:hover {
            background: #fc7400;
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



        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>

    <div class="container rounded bg-white mt-5 mb-5 shadow pt-4 pb-4">
        <div class="row">
            <form action="{{ route('profile.update') }}" class="col-8" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="row">
                    <div class="col-md-5 border-right profile-part1">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" height="150px"
                                src="{{ !empty(Auth::user()->photo) ? url('uploads/admin_images/' . Auth::user()->photo) : url('uploads/no_image.jpg') }}">

                            <span class=" mt-3" style="width: 88px">

                                <input type="file" id="image" class="form-control form-control-sm shadow-sm "
                                    aria-label="Upload" name="photo">

                            </span>
                            <span class="mt-2">
                                <img id="showImage" class="wd-80 rounded-circle" width="70px" height="70px"
                                    src="{{ !empty(Auth::user()->photo)
                                        ? url('uploads/admin_images/' . Auth::user()->photo)
                                        : url('uploads/no_image.jpg') }}"
                                    alt="profile">
                                {{-- <img id="showImage" class="wd-80 rounded-circle" width="70px" height="70px"
                                    src="buslogo.png"> --}}
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
                                        Username
                                    </label>
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror"
                                        placeholder="username.."
                                        value="{{ old('username') ? old('username') : Auth::user()->username }}">
                                    @error('username')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 form-group">
                                    <label class="form-label">
                                        Name
                                    </label>
                                    <input type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="name.."
                                        value="{{ old('name') ? old('name') : Auth::user()->name }}">
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="form-label">
                                        Email
                                    </label>
                                    <input type="text" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="email@example.com"
                                        value="{{ old('email') ? old('email') : Auth::user()->email }}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="form-label">
                                        Address
                                    </label>
                                    <input type="text" name="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="address.."
                                        value="{{ old('address') ? old('address') : Auth::user()->address }}">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 form-group">
                                    <label class="form-label">
                                        Phone Number
                                    </label>

                                    <div class="input-group">
                                        <span class="input-group-text @error('phone') border-danger @enderror"
                                            id="basic-addon1">+233</span>
                                        <input name="phone" type="tel" maxlength="9" name="phone"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="User's Contact.." aria-label="Username"
                                            aria-describedby="basic-addon1"
                                            value="{{ old('phone') ? old('phone') : Auth::user()->phone }}">

                                    </div>
                                    @error('phone')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                <form action="{{ route('password.update') }}" method="POST" class="pt-2">
                    @csrf
                    @method('put')

                    <div class="col-md-12 mt-4" style="text-align: left;">
                        <label for="current_Password" class="form-label">Current Password</label>
                        <input type="password" name="current_password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="current_Password"
                            required>
                        @error('current_password', 'updatePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-4" style="text-align: left;">
                        <label for="input_Password" class="form-label">New Password</label>
                        <input type="password" name="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="input_Password"
                            required>
                        @error('password', 'updatePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-4" style="text-align: left;">
                        <label for="input_Password_confirmation" class="form-label">Confirm New Password</label>
                        <input type="password" name="password_confirmation"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}  id="input_Password"
                            required>
                        @error('password_confirmation', 'updatePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary w-100 profile-button" type="submit">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="text-center mt-5 ">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-danger  w-50" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Delete Account
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{ route('profile.destroy') }}">
                            @csrf
                            @method('delete')
                            <div class="modal-header me-0">
                                <h2 class="modal-title fs-5" id="exampleModalLabel">Are you sure you want to delete
                                    your account?</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ms-0">

                                <p class="text-start mb-4 text-gray-600 dark:text-gray-400" style="font-size: 14px;">
                                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                                </p>
                                <div class="mb-3 text-start mt-4">
                                    <label for="exampleInputUsername1" class="form-label"
                                        style="font-size: 18px;font-weight: 510">Password</label>
                                    <input type="password"
                                        class="form-control @error('password', 'userDeletion') is-invalid @enderror"
                                        name="password">
                                    @error('password', 'userDeletion')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex mb-3 ms-auto pe-4" style="justify-content: right">
                                <button type="button" class="btn btn-secondary me-2"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>

    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#image').change(function(e) {
        //         var reader = new FileReader();
        //         reader.onload = function(e) {
        //             $('#showImage').attr('src', e.target.result);
        //         }
        //         reader.readAsDataURL(e.target.files['0']);
        //     });
        // });

        let showImage = document.getElementById('showImage');
        let image = document.getElementById('image');

        image.onchange = (e) => {
          if (image.files[0])
          showImage.src = URL.createObjectURL(image.files[0]);
        };
    </script>


</x-guest-layout>
