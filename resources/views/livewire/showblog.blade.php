<div>
    {{-- In work, do what you enjoy. --}}
    <div class="text-center card">
        <div class="card-header">
            <h4>
                {{ $blog->title }}
            </h4>
        </div>
        <div class="card-footer">
            {{-- <button wire:click='toggleLike({{ $blog->id }})' >
            like  {{ $likeCount }}
        </button> --}}
            <button
                class="btn {{ isset($likeStatus[$blog->id]) && $likeStatus[$blog->id] ? 'btn-primary' : 'btn-secondary' }}"
                wire:click='toggleLike({{ $blog->id }})'>
                Like {{ $likeCount }}
            </button>
            <button wire:navigate href="/blogs">
                back
            </button>
        </div>
    </div>
</div>
