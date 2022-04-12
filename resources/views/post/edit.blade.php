@extends('layouts.master')
@section('content')
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Input Post</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="{{ route('post.update') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <input type="hidden" name="idpost" value="{{ $data->idpost }}">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="first-name-column">Content</label>
                                            <input type="text" id="first-name-column" class="form-control"
                                                placeholder="Content" value="{{ $data->content }}" name="content">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="last-name-column">Tittle</label>
                                            <input type="text" id="last-name-column" class="form-control"
                                                placeholder="Tittle" value="{{ $data->title }}" name="title">
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="form-group">
                                            <label for="city-column">Date</label>
                                            <input type="date" id="city-column" class="form-control" placeholder="Date"
                                                value="{{ $data->date }}" name="date">
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
