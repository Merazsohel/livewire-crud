<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\WithFileUploads;
use Livewire\Component;

class Posts extends Component
{
    use WithFileUploads;

    public $posts, $title, $body, $post_id, $file;
    public $updateMode = false;

    public function render()
    {
        $this->posts = Post::orderBy('created_at', 'desc')->get();
        return view('livewire.posts');
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->body = '';
        $this->file = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'body' => 'required',
            'file' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);

        $filename = $this->file->store('file','public');

        $validatedData['file'] = $filename;

        Post::create($validatedData);

        session()->flash('message', 'Post Created Successfully.');

        $this->resetInputFields();
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $this->post_id = $id;
        $this->title = $post->title;
        $this->body = $post->body;
        $this->file = $post->file;

        $this->updateMode = true;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $post = Post::find($this->post_id);
        $post->update([
            'title' => $this->title,
            'body' => $this->body,
            'file' => $this->file->store('file','public'),
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Post Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        session()->flash('message', 'Post Deleted Successfully.');
    }
}
