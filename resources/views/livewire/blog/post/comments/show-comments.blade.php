<div>
        @foreach($comments as $comment)
            <!-- Comment -->
            <!-- Single comment-->

            <div wire:key="{{ $comment->id }}" class="d-flex mb-3">
                <div class="flex-shrink-0"><img class="rounded-circle"
                                                src="https://dummyimage.com/50x50/ced4da/6c757d.jpg"
                                                alt="..."/>
                </div>
                <div class="ms-3">
                    <div class="fw-bold">{{$comment->user->name}}
                        <span
                            class="fw-normal text-muted float-right">{{$comment->dateAsCarbon->diffForHumans()}}</span>
                    </div>
                    {{$comment->message}}
                </div>
            </div>
        @endforeach
            {{ $comments->links(data: ['scrollTo' => false]) }}

</div>
