<form>
    <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" placeholder="Enter Title" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput2">Body:</label>
        <textarea class="form-control" rows="5" wire:model="body"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label>File:</label>
        <input type="file" class="form-control" wire:model="file">
        @error('file') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-success">Save</button>

</form>
