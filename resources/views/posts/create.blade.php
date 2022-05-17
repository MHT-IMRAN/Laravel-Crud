@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Post Title</label>
                        <input type="text" name="title" value="{{ old('title') }}"
                            class="form-control @error('title') is-invalid @enderror" id="exampleFormControlInput1"
                            placeholder="Title">
                    </div>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Post Description</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                            id="exampleFormControlTextarea1" rows="3">
                            {{ old('description') }}
                        </textarea>
                    </div>

                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <input type="submit" name="submit" value="SUBMIT" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
@endsection
