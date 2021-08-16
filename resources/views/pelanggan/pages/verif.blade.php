{{-- @include('pelanggan.layouts.head')
        <!-- about begin -->
        <div class="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">Verify Your Email Address</div>
                                      <div class="card-body">
                                       @if (session('resent'))
                                            <div class="alert alert-success" role="alert">
                                               {{ __('A fresh verification link has been sent to your email address.') }}
                                           </div>
                                       @endif
                                       <a href="http://localhost:8000/reset-password/{{$token}}">Click Here</a>.
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about end --> --}}

    <div class="container">
     <div class="row justify-content-center">
         <div class="col-md-8">
             <div class="card">
                 <div class="card-header">Verify Your Email Address</div>
                   <div class="card-body">
                    @if (session('resent'))
                         <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                   <a href="http://localhost:8000/reset-password/{{$token}}/{{$email}}">Click Here</a>.
                </div>
            </div>
        </div>
    </div>
</div>