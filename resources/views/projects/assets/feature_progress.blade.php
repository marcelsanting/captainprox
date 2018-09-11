<div class="layer w-100">
    <small class="fw-600 c-grey-700">{{ $title }}</small>
    <span class="pull-right c-grey-600 fsz-sm">{{ round($complete, '1') }}%</span>
    <div class="progress mT-10">
        <div class="progress-bar bgc-deep-purple-500" role="progressbar" aria-valuenow="{{ $complete }}" aria-valuemin="0" aria-valuemax="100" style="width:{{ $complete }}%;">
            <span class="sr-only">{{ $complete }}% Complete</span></div>
    </div>
</div>
