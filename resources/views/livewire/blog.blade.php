<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}



  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" wire:navigate href="#">Add Post</a>
        </li>

      </ul>
    </div>
  </nav>
  <button type="button" class="btnp btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
    Open modal
  </button>

  <!-- The Modal -->
<div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Blog</h4>
          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"></button> --}}
        </div>

        <!-- Modal body -->
        <form wire:submit='save'>

        <div class="modal-body">
                <div class="mt-3 mb-3">
                  <label for="text" class="form-label">UserID:</label>
                  <input type="text" wire:model='user_id' class="form-control" id="text" value="1" >
                </div>
                <div class="mb-3">
                  <label for="text" class="form-label">Title:</label>
                  <input type="text" wire:model='title' class="form-control" id="text" placeholder="Enter text" >
                </div>
                <div class="mb-3">
                    <label for="text" class="form-label">Body:</label>
                   <textarea wire:model='body' class="form-control" id="" cols="30" rows="10"></textarea>
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- The Modal -->

  <div class="container mt-5">
    <div class="row">
        @foreach ($blogs as $blog)
      <div class="col-sm-4 card ring-offset-2">
        <h2>{{ $blog->title }}</h2>

        <div class="fakeimg">Fake Image</div>
        <p>Some text..</p>
        <p>{{ $blog->body }}.</p>


        <button wire:click='Like' >
            like
        </button>
        <button wire:navigate href="/blogsingle/{{ $blog->id }}">
            read more
        </button>
        </div>
        @endforeach
    </div>
  </div>
  <div class="p-4 mt-5 text-center text-white bg-dark">
    <p>Footer</p>
  </div>
</div>
