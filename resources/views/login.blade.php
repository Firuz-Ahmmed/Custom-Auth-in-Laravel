@extends('layout');
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="mt-1">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
            @endif
            @if (session()->has('error1'))
                <li class="">{{ session('error1') }}</li>
            @endif
            @if (session()->has('success'))
                <li>{{ session('success') }}</li>
            @endif
        </div>

    </div>
    <form action="{{ route('login.post') }}" method="POST" class="ms-auto me-auto mt-auto" style="width: 50%">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email">

        </div>
        <div class="mb-3">
            <label for="" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
@endsection
