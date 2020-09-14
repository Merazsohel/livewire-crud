<form>
    <input type="hidden" wire:model="post_id">

    <div class="form-group">
        <label>Title:</label>
        <input type="text" class="form-control" wire:model="title">
        @error('title') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group">
        <label>Body:</label>
        <textarea type="email" class="form-control" wire:model="body"></textarea>
        @error('body') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>
    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
</form>
