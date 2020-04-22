@extends('layouts.app')

@section('content')
    <section class="section is-fullheight">
        <div class="container">
            <div class="columns is-multiline">
                <div class="card custom-card column is-half is-offset-one-quarter">
                    <header class="card-header">
                        <h1 class="card-header-title is-centered">{{ __('Sign In') }}</h1>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            @if (session('status'))
                                <article class="message is-success">
                                    <div class="message-body">
                                        {{ session('status') }}
                                    </div>
                                </article>
                            @endif

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="field">
                                    <label class="label" for="email">Email</label>
                                    <div class="control">
                                        <input id="email" title="email" name="email" type="email" required
                                               autocomplete="email" autofocus
                                               class="input @error('email') is-danger @enderror"
                                               value="{{old('email')}}">
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Email is not valid</p>
                                    @enderror
                                </div>

                                <div class="field">
                                    <label class="label" for="password">Password</label>
                                    <div class="control">
                                        <input id="password" title="password" name="password" type="password" required
                                               autocomplete="current-password"
                                               class="input @error('password') is-danger @enderror">
                                    </div>
                                    @error('email')
                                    <p class="help is-danger">Password is not valid</p>
                                    @enderror
                                </div>

                                <div class="level">
                                    <div class="level-left">
                                        <div class="level-item field is-horizontal no-space">
                                            <div class="field-body">
                                                <div class="field no-space">
                                                    <div class="control">
                                                        <label class="checkbox">
                                                            <input type="checkbox" name="remember"
                                                                   id="remember"
                                                                {{ old('remember') ? 'checked' : '' }}>
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="level-right">
                                        <p class="level-item has-text-centered">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link level-right"
                                                   href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <button type="submit" class="button is-large is-primary is-outlined is-fullwidth">
                                    {{ __('Login') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
