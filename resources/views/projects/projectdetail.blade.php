@extends('admin.backend')

@section('content')
            <h4>Project overview</h4>
                <div class="row gap-20 masonry pos-r">
                    <div class="masonry-sizer col-md-6"></div>
                    <div class="masonry-item  w-100">
                        <div class="row gap-20">
                            @include('projects.assets.sparkiline', ['title' => "All tasks", "number" => count($project->tasks), "line" => 1])
                            @include('projects.assets.sparkiline', ['title' => "All Features", "number" => count($project->features), "line" => 2])
                        </div>
                    </div>
                    <div class="masonry-item col-12">
                        <!-- #Project Detail ==================== -->
                        <div class="bd bgc-white">
                            <div class="peers fxw-nw@lg+ ai-s">
                                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                                    <div class="layers">
                                        <div class="layer w-100 mB-10">
                                            <h6 class="lh-1">{{ $project->title }}</h6>
                                        </div>
                                        <div class="layer w-100">
                                            <p>
                                                {{ $project->body }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                                    <div class="layers">
                                        <div class="layer w-100">
                                            <h6 class="lh-1">Features</h6>
                                            <!-- Progress Bars -->
                                            <div class="layers">
                                                @if(count($project->features) >= "0")
                                                        @foreach($project->features as $feature)
                                                            @include('projects.assets.feature_progress', ['title' => $feature->title, "complete" => $feature->completed()])
                                                        @endforeach
                                                    @else
                                                    No features added
                                                @endif
                                            </div>

                                            <!-- Pie Charts -->
                                            <div class="peers pT-20 mT-20 bdT fxw-nw@lg+ jc-sb ta-c gap-10">
                                                @include('projects.assets.easy-pie', ['title' => "Project complete", "complete" => $project->completed()])
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="masonry-item col-md-12">
                        <div class="bd bgc-white">
                            <div class="peers fxw-nw@lg+ ai-s">
                                <div class="peer peer-greed w-70p@lg+ w-100@lg- p-20">
                                    <div class="layers">
                                        <div class="layer w-100 mB-10">
                                            <ul class="nav nav-tabs nav-justified layer w-100 mB-10" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" href="#features" role="tab" data-toggle="tab">All features</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#tasksopen" role="tab" data-toggle="tab">All Open tasks</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#mytasks" role="tab" data-toggle="tab">Assigned to you</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#taskscomplete" role="tab" data-toggle="tab">All ccmpleted tasks</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="tab-content layer w-100 mB-10">
                                            <div role="tabpanel" class="tab-pane fade in active" id="features">
                                                @include(
                                                    'projects.assets.datatable',
                                                    ['tablename' => 'ProjectFeatures',
                                                        'heads' => [
                                                            'id',
                                                            'title',
                                                            'status',
                                                            'last update'
                                                        ]
                                                    ]
                                                )
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tasksopen">bbb</div>
                                            <div role="tabpanel" class="tab-pane fade" id="mytasks">ccc</div>
                                            <div role="tabpanel" class="tab-pane fade" id="taskscomplete">ccc</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="peer bdL p-20 w-30p@lg+ w-100p@lg-">
                                    <div class="layers">
                                        <div class="layer w-100">
                                            <h6 class="lh-1">Project files</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
