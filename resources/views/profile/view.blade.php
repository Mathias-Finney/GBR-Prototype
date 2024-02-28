<x-guest-layout>
<style>

.modal .card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s;
}

.modal .image img {
    transition: all 0.5s;
    border-radius: 50%;
}

.modal .card:hover .image img {
    transform: scale(1.5)
}

.modal .btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.modal .name {
    font-size: 22px;
    font-weight: bold
}

.modal .idd {
    font-size: 14px;
    font-weight: 600
}

.modal .idd1 {
    font-size: 12px
}

.modal .number {
    font-size: 22px;
    font-weight: bold
}

.modal .follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.modal .btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.modal .text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.modal .icons i {
    font-size: 19px
}

.modal hr .new1 {
    border: 1px solid
}

.modal .join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.modal .date {
    background-color: #ccc
}
</style>

@auth
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
                    <div class="card p-4">
                      <div class=" image d-flex flex-column justify-content-center align-items-center">
                        <button class="btn btn-secondary">
                            
                                <img src="@if(Auth::user()->userProfile->profile_pic === null) {{env('APP_URL')}}/images/user.png @else {{ Auth::user()->userProfile->getUserProfilePic()}} @endif" height="100" width="100" />
                            
                          
                          
                        </button>
                        <span class="name mt-3">
                          {{ Auth::user()->name }}
                        </span>
                        <span class="idd">
                            <i class="bi bi-envelope"></i> {{ Auth::user()->email}}
                        </span>
                        <div class="d-flex flex-row justify-content-center align-items-center gap-2">
                          
                          
                        </div>
                        <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                            <span class="idd">
                                <i class="bi bi-geo-alt"></i>@if(Auth::user()->userProfile->address == '')address not set @else {{ Auth::user()->userProfile->address}} @endif
                            </span>
                        </div>
                        <div class="d-flex flex-row justify-content-center align-items-center mt-3">
                            <span class="idd">
                                <i class="bi bi-telephone"></i> @if(Auth::user()->userProfile->phone == '')address not set @else {{ Auth::user()->userProfile->phone}} @endif
                            </span>
                        </div>
                        <div class=" d-flex mt-2">
                          <a href="{{ route('customer.profiles.edit', ['profile' => Auth::user()->id]) }}"><button class="btn1 btn-primary">
                            Edit Profile
                          </button></a>
                        </div>
                        <div class="text mt-3">
                          <span>
                            Eleanor Pena is a creator of minimalistic x bold graphics and digital
                            artwork.
                            <br>
                            <br>
                            Artist/ Creative Director by Day #NFT minting@ with FND night.
                          </span>
                        </div>
                       
                        <div class=" px-2 rounded mt-4 date ">
                          <span class="join">
                            Joined {{ Auth::user()->formatedDate() }}
                          </span>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
            
        </div>
    </div>
</div>
@endauth
</x-guest-layout>