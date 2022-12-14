@extends('layout.app')

@push('customcss')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/modules/index.css') }}">
@endpush

@section('content')
    <h1>
        <a class="btn btn-outline-light" href="{{ route('home') }}"><i class="fa-solid fa-angles-left"></i></a>
        Modules
    </h1>

    @if (Auth::user()->admin)
        <a href="{{ route('modules.create') }}" class="btn btn-outline-primary float-right mb-2">
            <i class="bi bi-plus-square-fill"></i>
            Ajouter un module
        </a>
    @endif

    <div id="module-index-view" class="container mt-5">
        @foreach ($modules as $module)
            <a href="{{ route('modules.show', $module->id) }}"
                class="cm-card {{ $module->isPassed() ? '' : 'cm-unsuccess' }}">
                <div class="cm-card-title px-2 h3">
                    <div>
                        {{ $module->id }}
                    </div>
                    <div>
                        {{ $module->name }}
                    </div>
                </div>
                <div class="cm-card-content">
                    <i class="fa-solid fa-calculator"></i>
                    {{ sprintf('%01.2f', $module->mean()) }}
                </div>
            </a>
        @endforeach
    </div>
@endsection
