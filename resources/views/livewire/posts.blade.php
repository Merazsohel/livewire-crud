<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if($updateMode)
        @include('livewire.update')
    @else
        @include('livewire.create')
    @endif

        <div class="mt-2">
            <input wire:model="search" type="text" placeholder="Search posts by title..." class="form-control">
        </div>

    <table class="table table-bordered mt-5">
        <thead>
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Body</th>
            <th>Photo</th>
            <th width="150px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->body }}</td>
                <td> <img src="{{ url('storage/'.$post->file) }}" width="150px" height="150px" alt="No Image"/></td>
                <td>
                    <button wire:click="edit({{ $post->id }})" class="btn btn-primary btn-sm">Edit</button>
                    <button wire:click="delete({{ $post->id }})" class="btn btn-danger btn-sm">Delete</button>
                    <button wire:click="export" class="btn btn-info btn-sm mt-1">Download</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
