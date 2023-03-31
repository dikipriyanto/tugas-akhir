       
       <!-- JAVASCRIPT -->
        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

        <script src="{{asset('assets/libs/select2/js/select2.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js')}}"></script>

        <script src="{{asset('assets/js/app.js')}}"></script>
        <!-- form wizard -->
        <script src="{{asset('assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>

        <!-- form wizard init -->
        <script src="{{asset('assets/js/pages/form-wizard.init.js')}}"></script>
        <script src="{{asset('assets/js/pages/form-advanced.init.js')}}"></script>

         <!-- Sweet Alerts js -->
         <script src="{{asset('assets/libs/sweetalert2/sweetalert2.min.js')}}"></script>

        <!-- Sweet Alerts js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
       
        <!-- Required datatable js -->
<script src="{{asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}" ></script>
<script src="{{asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Responsive examples -->
<script src="{{asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<!-- Datatable init js -->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
<script src="https://js.pusher.com/3.1/pusher.min.js"></script>

<script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('087e69e743471c00c4b8', {
         cluster : 'ap1'
        });

        var channel = pusher.subscribe('notification-pemesanan');

        channel.bind('App\\Events\\notif', function(data){
                console.log(JSON.stringify(data.message))
                var link =`{{ route('daftarpemesanan') }}`
                var countNotif = $('#count-notification').html();
                var existingNotifications = $('#container-notification').html();
                var newNotificationHtml = `
                <a href="${link}" class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs mr-3">
                                    <span class="avatar-title bg-primary rounded-circle font-size-16">
                                        <i class="bx bx-cart"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">${data.message.nama_pemesan}</h6>
                                    <div class="font-size-12 text-muted">
                                        <p class="mb-1">Pesanan masuk</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                `
                $('#container-notification').html(existingNotifications + newNotificationHtml)
                $('#count-notification').html(parseInt(countNotif) + 1);
                // $('.notification-dropdown#container-notification').html("TEST")
        })

</script>