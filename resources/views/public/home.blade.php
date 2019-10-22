@extends('layouts.app')

@section('title',$page[0]->name)

@push('styles')
<link href="{{$urlFont}}" rel="stylesheet">
<style>

    h2, p{
        color: {{$page[0]->color_font}};
        font-size:{{$page[0]->font_size}}px !important;   
    }
    #header {
        font-family: {{$font}};
        
    }
</style>
@endpush
@section('content')

<div id="header">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            @foreach ($media as $item => $key)
                @if ($item==0)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$item}}" class="active"></li>
                @else
                <li data-target="#carouselExampleIndicators" data-slide-to="{{$item}}"></li>
                @endif
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            @foreach ($media as $item => $key)
            @if ($item==0)
                <div class="carousel-item active"
                style="background-image: url({{URL::asset('/media/pages/'.$key->src)}})">
            @else
             <div class="carousel-item"
                style="background-image: url({{URL::asset('/media/pages/'.$key->src)}})">
            @endif

                
            </div>
            @endforeach
            

        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
@endsection