@extends('layouts.app')
@section('content')
    <div class="px-4 pt-4 my-1 text-center border-bottom">
        <h1 class="display-4 fw-bold text-danger">Laravel Crud</h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                This tutorial is for beginners. In this article, i will share with you how to make a simple CRUD operation
                application in laravel 9 with
                example. as you know laravel 9 already release with the many new features and functionality.
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-primary btn-lg px-4 me-sm-3 shadow shadow-lg">
                    First Fake Button
                </button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4 shadow shadow-lg">
                    Fake Secondary
                </button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh">
            <div class="container px-5">
                <img src="images/laravel-9.jpg" alt="Laravel Logo" class="img-fluid border rounded-3 shadow-lg mb-4"
                    width="700" height="500" loading="lazy" />
            </div>
        </div>
    </div>
@endsection
