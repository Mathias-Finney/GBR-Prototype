<x-guest-layout>

    
    <div class="viewTickets-page">

        

        {{-- <div class="page-footer">
        @include('frontend.footer')
        </div> --}}
        {{$payment}}
        {{$trip}}
        {{$route}}
        {{-- {{$ticket}} --}}

        @foreach ($ticket as $item)
            {{$item}}
        @endforeach

    </div>
</x-guest-layout>
