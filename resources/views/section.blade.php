@php
    $section = \App\Models\PackageSection::where('slug', $slug)->active()->first();
    $pageTitle = $section ? ($section->meta_title ?? $section->title ?? 'Section') : 'Section';
    $pageDescription = $section ? ($section->meta_description ?? $section->description ?? 'Explore our tour packages') : 'Explore our tour packages';
@endphp

@extends('layouts.app')

@section('title', $pageTitle)
@section('meta_description', $pageDescription)

@section('content')

@livewire('section-detail', ['slug' => $slug])

@endsection