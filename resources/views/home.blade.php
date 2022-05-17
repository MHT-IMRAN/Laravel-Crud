@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-sm-11 col-md-11 col-lg-11 col-xl-11">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->description }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                                <td>{{ \Carbon\Carbon::parse($post->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info mb-2"
                                        href="{{ route('update_form', ['post' => $post->id]) }}"><i
                                            class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('delete', ['post' => $post->id]) }}" id="delete"
                                        data-confirm="Do you wanna delete?" class="btn btn-sm btn-danger">
                                        <i class='fas fa-trash'></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger text-uppercase fw-bold">
                                    <i class="fas fa-trash-alt"></i>
                                    No Post
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $posts->links() }}
            </div>
        </div>
    </div>
    <script>
        var Links = document.querySelectorAll('#delete');
        for (var i = 0; i < Links.length; i++) {
            Links[i].addEventListener('click', function(event) {
                event.preventDefault();
                var answer = confirm(this.getAttribute('data-confirm'));
                if (answer) {
                    window.location.href = this.getAttribute('href');
                }
            });
        }
    </script>
@endsection
