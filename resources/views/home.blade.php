@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <example-component title="Dashboard">
            @if (session('status'))
                <query-message :success="true" :fail="false" message="{{ session('status') }}"></query-message>
            @endif
            <p>Welcome <strong>{{ auth()->user()->name }}</strong></p>
            <a href="{{ route('term.index') }}">To the dictionary</a>
        </example-component>

    </section>
@endsection
