{{-- @if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000) 
    " x-show="show" class="message">
   <p> 
      {{session('message')}}
   </p>

</div>
@endif --}}


  
            @if (Session::get('fail'))
                <div class="alert alert-danger messaga"
                x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000) 
                " x-show="show" class="message"
                >
                    {{ Session::get('fail') }}
                </div>
            @endif

            @if (Session::get('info'))
                <div class="alert alert-info messaga"
                x-data="{show: true}" x-init="setTimeout(()=> show = false, 3000) 
                " x-show="show" class="message"
                >
                    {{ Session::get('info') }}
                </div>
            @endif

            @if (Session::get('success'))
                <div class="alert alert-success messaga"
                x-data="{show: true}" x-init="setTimeout(()=> show = false, 4000) 
                " x-show="show" class="message"
                >
                    {{ Session::get('success') }}
                </div>
            @endif
 