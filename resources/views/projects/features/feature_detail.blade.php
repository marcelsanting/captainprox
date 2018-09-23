@extends('admin.backend')

@section('content')
    <div class="container-fluid">
        <h4>Feature overview</h4>
        <div class="row">
            <div class="masonry-item col-12">
                <!-- #Project Detail ==================== -->
                <div class="bd bgc-white">
                    <div class="peers fxw-nw@lg+ ai-s">
                        <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                            <div class="layers">
                                <div class="layer w-100 mB-10">
                                    <h6 class="lh-1">{{ $feature->title }}</h6>
                                </div>
                                <div class="layer w-100">
                                    <p>
                                        {!! $feature->body !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                            <div class="layers">
                                <div class="layer w-100">
                                    <h6 class="lh-1">TO DO</h6>
                                    <!-- Progress Bars -->
                                    <div class="layers">
                                        <div class="list-group col-md-12">
                                            @if(count($feature->tasks) >= "0")
                                                @foreach($feature->tasks->where('closed', '=', '0') as $task)
                                                    <a class="list-group-item list-group-item-action" href="{{ route('tasks.edit', $task->id) }}">{{ $task->title }} <i>{{ $task->statustitle }}</i></a>
                                                @endforeach
                                            @else
                                                No features added
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Pie Charts -->
                                    <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                                        @include('projects.assets.easy-pie', ['title' => "feature complete", "complete" => $feature->completed()])
                                    </div>
                                    @if(Auth::user()->hasAnyRole(['administrator', 'Developer', 'Manager']))
                                        <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                                            <a class="btn btn-primary" href="{{ route('tasks.create', $feature->id) }}">Create a new Task</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

