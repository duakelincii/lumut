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
                <table class="table" id="tableuser">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->username }} </td>
                                <td> {{ $user->role }} </td>
                                <td> <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Edit</a>
                                    <form action="{{ route('user.delete', $user->id) }}" method="POST">
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
