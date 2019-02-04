@extends('ws-app')

@section('content')

    <div id="3d-tour"></div>

    <script>
        document.addEventListener("DOMContentLoaded", function(){
            $(function(){
                $('#3d-tour').html('<iframe src="http://www.visitor.ee/360/pc/html5/main.html" style="width: 100%; height: 470px; border: none; margin-bottom: -5px" frameborder="none"></iframe>');
            });
        });
    </script>

@stop