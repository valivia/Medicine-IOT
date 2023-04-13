@extends('index')

@section('content')
    <div class="authWrapper">
        <h1>Welcome</h1>

        <form class="form" method="post">
            @method('POST')
            @csrf

            @include('partials/input', [
                'name' => 'email',
                'label' => 'Email',
                'placeholder' => 'E.g. John@gmail.com',
                'value' => old('email'),
                'required' => true,
            ])

            @include('partials/input', [
                'name' => 'password',
                'label' => 'Password',
                'placeholder' => 'E.g. HKJFhs7fs&*',
                'value' => old('password'),
                'required' => true,
            ])

            <section class="authButtons">
                <a class="button" data-variant="secondary" href="/register">Register</a>
                <button class="button" data-variant="primary" type="submit">Log in</button>
            </section>
        </form>
    </div>
@endsection
