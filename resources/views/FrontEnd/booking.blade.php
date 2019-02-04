@extends('ws-app')

@section('content')

    <div>

        <script type="text/javascript">
            var myEventMethod = window.addEventListener ? "addEventListener"
                    : "attachEvent";
            var myEventListener = window[myEventMethod];
            var myEventMessage = myEventMethod == "attachEvent" ? "onmessage"
                    : "message";
            myEventListener(myEventMessage, function(e) {
                if (e.data === parseInt(e.data)) {
                    document.getElementById('my-iframe-id').height = e.data + "px";
                    console.log(e.data);
                }
            }, false);
        </script>
        <div style="margin: 0px;">
            <iframe id="my-iframe-id" style="border: 0"
                    src="http://premium-clcom-book.otelms.com/bookit/step1?inline=true&lang={{ App::getLocale() }}{{ $from ? '&datein='.$from : '' }}{{ $to ? '&dateout='.$to : '' }}" width="100%" scrolling="no"></iframe>
        </div>


    </div>

@stop