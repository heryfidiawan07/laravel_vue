@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="ml-auto">
                            <a href="{{route('questions.index')}}" class="btn btn-outline-secondary btn-sm">Back to All Questions</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{route('questions.store')}}" method="POST">
                        @include('questions._form_question', ['buttonText' => 'Ask this question'])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
