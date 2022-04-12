@extends('layouts.master')
@section('content')
    <style>
        table.dataTable td {
            padding: 15px 8px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }

    </style>
    <section class="section">
        <div class="card">
            <div class="card-header">
                Data Post
            </div>
            <div class="card-body">
                <table class="table" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Content</th>
                            <th>Tittle</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($post as $pos)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $pos->content }} </td>
                                <td> {{ $pos->title }} </td>
                                <td> {{ $pos->date }} </td>
                                <td> <a href="{{ route('post.edit', $pos->idpost) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('post.delete', $pos->idpost) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
@endsection
