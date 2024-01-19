<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
   <div class="container">
    <div class="row">
        <div class="col-lg-12 card">
            <h1>image upload</h1>
            <br>
            <br>
            <form wire:submit.prevent='save'>
                @if ($image)
                    <div>
                        @foreach ($image as $im)
                            <img src="{{ $im->temporaryUrl() }}" alt=""  width="100px">
                        @endforeach
                    </div>
                @endif

                <input type="file" wire:model='image' multiple id="" />

                @error('image')
                    <span class="error">{{ $message }}</span>
                @enderror
  <br>
  <br>

                <button class="btn btn-primary" type="submit">Save Image</button>
            </form>



        </div>
        <div class="col-lg-12">
            <div class="card">
                @foreach ($images as $image)
                    <img src="{{ $image }}" alt="" width="200px">
                @endforeach
            </div>
        </div>
    </div>
   </div>

</div>
