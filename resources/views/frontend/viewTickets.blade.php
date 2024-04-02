<x-guest-layout>


    <div class="viewTickets-page">

        <div class="viewTickets-head">
            <h1>YOUR TICKETS</h1>
        </div>
        <div class="viewTickets-body">
            <div class="activeTickets">
                {{-- <h2 class="activeTickets-head">ACTIVE TICKETS</h2> --}}
                <div class="row mb-5">
                    <hr class="rule1 col-md-4">
                    <h2 class="activeTickets-head col-md-4">ACTIVE TICKETS</h2>
                    <hr class="rule2 col-md-4">
                </div>
                <div class="activeTickets-body">
                    @foreach ($activeTickets as $ticket)
                        <?php
                        $trip = App\Models\Trip::findOrFail($ticket->trip_id);
                        $route = App\Models\Route::findOrFail($trip->route_id);
                        $terminal = App\Models\Terminal::findOrFail($route->st_tem_id);
                        $ticketID = $ticket->id;
                        
                        ?>
                        <div class="card mb-3 p-3 me-4">
                            @if ($ticket->expiry_date < $current_date)
                                <img class=" card-img-overlay" style="width: 100%;height: 100%" src="expiredimage.png"
                                    alt="" />
                            @endif
                            <div
                                @if ($ticket->expiry_date > $current_date) class="bd-placeholder-img bd-placeholder-img-lg card-img" @endif>
                                <div class="logo1">
                                    <img src="buslogo.png" style="" />
                                </div>
                                <div class="row g-0" id="ticket{{ $ticketID }}">
                                    <div class="col-md-4 qrcode">
                                        {{ QrCode::size(170)->color(1, 85, 194)->generate($ticketID) }}
                                    </div>
                                    <div class="col-md-8 ps-2">
                                        <div class="card-body pt-0 pb-0">
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Start Location</b></h6>
                                                <p class="mt-0 mb-1">{{ $terminal->name }}({{ $terminal->location }})
                                                </p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>End Location</b></h6>
                                                <p class="mt-0 mb-1">{{ $route->end_terminal }}</p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Issue Date</b></h6>
                                                <p class="mt-0 mb-1">{{ $ticket->issue_date }}</p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Expiry Date</b></h6>
                                                <p class="mt-0 mb-1">{{ $ticket->expiry_date }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-center row mt-4 card-buttons pe-2">
                                    <div class="col-md-2 logo">
                                        <img src="buslogo.png" style="" />
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-danger w-100 " data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $ticketID; ?>">
                                            Delete
                                        </button>
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary w-100" type="button"
                                            onclick="printContent('ticket{{ $ticketID }}')">Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- delete ticket modal  --}}
                        @include('frontend.components.deleteTicketModal')
                    @endforeach
                </div>
            </div>
            <div class="inActiveTickets">
                {{-- <h2 class="inActiveTickets-head">INACTIVE TICKETS</h2> --}}
                <div class="row mb-5">
                    <hr class="rule1 col-md-4">
                    <h2 class="inActiveTickets-head col-md-4">INACTIVE TICKETS</h2>
                    <hr class="rule2 col-md-4">
                </div>
                <div class="inActiveTickets-body">
                    @foreach ($inActiveTickets as $ticket)
                        <?php
                        $trip = App\Models\Trip::findOrFail($ticket->trip_id);
                        $route = App\Models\Route::findOrFail($trip->route_id);
                        $terminal = App\Models\Terminal::findOrFail($route->st_tem_id);
                        $ticketID = $ticket->id;
                        
                        ?>
                        <div class="card mb-3 p-3 me-4" style="max-width: 600px;">
                            @if ($ticket->expiry_date < $current_date)
                                <img class=" card-img-overlay" style="width: 100%;height: 100%" src="expiredimage.png"
                                    alt="" />
                            @endif
                            <div
                                @if ($ticket->expiry_date > $current_date) class="bd-placeholder-img bd-placeholder-img-lg card-img" @endif>
                                <div class="logo1">
                                    <img src="buslogo.png" style="" />
                                </div>
                                <div class="row g-0">
                                    <div class="col-md-4 qrcode">
                                        {{ QrCode::size(170)->color(1, 85, 194)->generate($ticketID) }}
                                    </div>
                                    <div class="col-md-8 ps-2">
                                        <div class="card-body pt-0 pb-0">
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Start Location</b></h6>
                                                <p class="mt-0 mb-1">{{ $terminal->name }}({{ $terminal->location }})
                                                </p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>End Location</b></h6>
                                                <p class="mt-0 mb-1">{{ $route->end_terminal }}</p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Issue Date</b></h6>
                                                <p class="mt-0 mb-1">{{ $ticket->issue_date }}</p>
                                            </div>
                                            <div class="card-info mb-0">
                                                <h6 class="mb-0"><b>Expiry Date</b></h6>
                                                <p class="mt-0 mb-1">{{ $ticket->expiry_date }}</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="text-center row mt-4 card-buttons pe-2">
                                    <div class="col-md-2 logo">
                                        <img src="buslogo.png" style="" />
                                    </div>
                                    <div class="col-md-5">
                                        <button type="button" class="btn btn-danger w-100" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal<?php echo $ticketID; ?>">
                                            Delete
                                        </button>
                                    </div>
                                    <div class="col-md-5">
                                        <button class="btn btn-primary w-100" type="button" disabled>Download</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- delete ticket modal  --}}
                        @include('frontend.components.deleteTicketModal')
                    @endforeach
                </div>
            </div>
        </div>

        <script>
            //print ticket function
            function printContent(id) {
                str = document.getElementById(id).innerHTML
                newwin = window.open('', 'printwin', 'left=100,top=100,width=400,height=400')
                newwin.document.write('<HTML>\n<HEAD>\n')
                newwin.document.write('<TITLE>Print Page</TITLE>\n')
                newwin.document.write('<script>\n')
                newwin.document.write('function chkstate(){\n')
                newwin.document.write('if(document.readyState=="complete"){\n')
                newwin.document.write('window.close()\n')
                newwin.document.write('}\n')
                newwin.document.write('else{\n')
                newwin.document.write('setTimeout("chkstate()",2000)\n')
                newwin.document.write('}\n')
                newwin.document.write('}\n')
                newwin.document.write('function print_win(){\n')
                newwin.document.write('window.print();\n')
                newwin.document.write('chkstate();\n')
                newwin.document.write('}\n')
                newwin.document.write('<\/script>\n')
                newwin.document.write('</HEAD>\n')
                newwin.document.write('<BODY onload="print_win()">\n')
                newwin.document.write(str)
                newwin.document.write('</BODY>\n')
                newwin.document.write('</HTML>\n')
                newwin.document.close()
            }
        </script>

    </div>
</x-guest-layout>
