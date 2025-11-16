@extends('layouts.app')

@section('title', 'Home')
@section('meta_description', 'Home')

@section('content')

<x-herosection />
@livewire('homepage-sections')
<x-ctaform />






@endsection