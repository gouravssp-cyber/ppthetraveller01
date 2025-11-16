@extends('layouts.app')

@section('title', $section->section_name . ' - E-Commerce Store')

@section('content')
    @livewire('filter-section-products', ['sectionId' => $section->id])
@endsection