@extends('layouts.common')

@section('title', 'Tourist Spots')



@section('content')

    @include('common.pages.home.caraousel')
    {{--    @include('common.pages.home.offers')
        @include('common.pages.home.spots')
        @include('common.pages.home.tour_plan')--}}
    @include('common.pages.home.search')
    {{--@include('common.pages.home.about')--}}
    @include('common.pages.home.video')
    @include('common.pages.home.trip_album')
    @include('common.pages.home.blog')
@endsection
