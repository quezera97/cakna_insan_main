@extends('layouts.app')

@section('content')
    @livewire('admin.project.projects-edit', ['project' => $project])
@endsection
