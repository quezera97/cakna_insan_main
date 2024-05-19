<?php

namespace App\Livewire\Admin\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class PostEdit extends Component
{
    use WithPagination;

    public $selectedPost;

    public $title;
    public $details;
    public $author;
    public $date;
    public $featured;

    public $showAlertModal = false;

    public $alertModalType = '';
    public $alertModalDescription = '';


    public function openAlertModal()
    {
        $this->showAlertModal = true;
    }

    public function closeAlertModal()
    {
        $this->showAlertModal = false;
    }

    public $showConfirmationModal = false;

    public $functionPassed;
    public $paramPassed;

    public $confirmationModalTitle = '';

    public function openConfirmationModal($function, $param)
    {
        $this->functionPassed = $function;
        $this->paramPassed = $param;

        $this->confirmationModalTitle = 'Are you sure?';

        $this->showConfirmationModal = true;
    }

    public function closeConfirmationModal()
    {
        $this->showConfirmationModal = false;
    }

    public function acceptConfirmationModal()
    {
        if (method_exists($this, $this->functionPassed)) {
            call_user_func_array([$this, $this->functionPassed], [$this->paramPassed]);
        }

        $this->showConfirmationModal = false;
    }

    public function postRender()
    {
        return Post::paginate(5);
    }

    public function render()
    {
        return view('livewire.admin.post.post-edit', [
            'paginatedPost' => $this->postRender()
        ]);
    }

    //create new post
    public $showPostModal = false;

    public function openUploadPostModal()
    {
        $this->title = null;
        $this->details = null;
        $this->author = null;
        $this->date = null;
        $this->featured = null;

        $this->showPostModal = true;
    }

    public function closeUploadPostModal()
    {
        $this->showPostModal = false;
    }

    //edit post details
    public $showEditPostDetailsModal = false;

    public function openEditPostDetailsModal($postId)
    {
        $this->selectedPost = Post::find($postId);

        $this->title = $this->selectedPost->title;
        $this->details = $this->selectedPost->details;
        $this->author = $this->selectedPost->author;
        $this->date = $this->selectedPost->date;
        $this->featured = $this->selectedPost->featured;

        $this->showEditPostDetailsModal = true;
    }

    public function closeEditPostDetailsModal()
    {
        $this->showEditPostDetailsModal = false;
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|min:6',
            'featured' => 'required|unique:posts',
        ],[],[
            'title' => __('ui_text.title'),
            'featured' => __('ui_text.featured'),
        ]);

        try {
            DB::beginTransaction();

            Post::create([
                'title' => $this->title,
                'details' => $this->details,
                'folder_path' => null,
                'image_path' => null,
                'date' => $this->date,
                'author' => $this->author,
                'featured' => $this->featured,
            ]);

            DB::commit();

            return redirect()->route('post.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }

    public function editPostDetail()
    {
        $this->validate([
            'title' => 'required|string|min:6',
            'featured' => [
                'required',
                Rule::unique('posts')->ignore($this->selectedPost->id),
            ],
        ],[],[
            'title' => __('ui_text.title'),
            'featured' => __('ui_text.featured'),
        ]);

        try {
            DB::beginTransaction();

            $this->selectedPost->update([
                'title' => $this->title,
                'details' => $this->details,
                'folder_path' => null,
                'image_path' => null,
                'date' => $this->date,
                'author' => $this->author,
                'featured' => $this->featured,
            ]);

            DB::commit();

            $this->alertModalType = 'success';
            $this->alertModalDescription = 'Post has been saved';

            $this->openAlertModal();

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }

    }

    public function deletePost($postId)
    {
        $selectedPost = Post::find($postId);

        try {
            DB::beginTransaction();

            $selectedPost->delete();

            DB::commit();

            return redirect()->route('post.index');

        } catch (\Throwable $th) {
            DB::rollback();
            throw $th;
        }
    }
}
