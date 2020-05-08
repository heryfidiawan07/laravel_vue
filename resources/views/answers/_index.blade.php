<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="card-title">
                    <h2>{{$answersCount . "" . str_plural('Answer', $question->answers_count)}}</h2>
                </div>
                <hr>
                @include('layouts._messages')
                @foreach ($answers as $answer)
                    <div class="media">
                        <div class="d-flex flex-column vote-controls">
                            <a title="This answer is useful" class="vote-up"><i class="fas fa-caret-up fa-3x"></i></a>
                            <span class="votes-count">1230</span>
                            <a title="This answer in not useful" class="vote-down off"><i class="fas fa-caret-down fa-3x"></i></a>
                            @can('accept', $answer)
                                <a title="Mark this answer as best answer" 
                                class="{{$answer->status}} mt-2"
                                onCLick="event.preventDefault(); document.getElementById('accept-answer-{{$answer->id}}').submit();"
                                >
                                    <i class="fas fa-check fa-2x"></i>
                                    <span class="favorites-count">123</span>
                                </a>
                                <form id="accept-answer-{{$answer->id}}" action="{{ route('answers.accept', $answer->id) }}" method="POST" style="display: none;">
                                    @csrf 
                                </form>
                            @else
                                @if ($answer->is_best)
                                    <a title="The question owner accepted this answer as best answer" 
                                    class="{{$answer->status}} mt-2"
                                    >
                                        <i class="fas fa-check fa-2x"></i>
                                        <span class="favorites-count">123</span>
                                    </a>
                                @endif
                            @endcan
                        </div>
                        <div class="media-body">
                            {!! $answer->body_html !!}
                            <div class="row">
                                <div class="col-4">
                                    <div class="ml-auto">
                                        @if (Auth::check())
                                            @can('update', $answer)
                                                <a href="{{ route('questions.answers.edit', [$question->id, $answer->id]) }}" class="btn btn-outline-info btn-sm">edit</a>
                                            @endcan
                                            @can('delete', $answer)
                                                <form method="POST" action="{{ route('questions.answers.destroy', [$question->id, $answer->id]) }}" class="form-delete">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure ?')">Delete</button>
                                                </form>
                                            @endcan
                                        @endif
                                    </div>
                                </div>
                                <div class="col-4"></div>
                                <div class="col-4">
                                    <span class="text-muted">Answer {{$answer->created_date}} </span>
                                    <div class="media">
                                        <a href="{{$answer->user->url}}" class="pr-2">
                                            <img src="{{$answer->user->avatar}}">
                                        </a>
                                        <div class="media-body">
                                            <a href="{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>