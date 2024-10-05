<?php

namespace App\View\Components;

use App\Models\Bookmark;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public Posts $post,
        public Collection $bookmarks,
        public User $user,
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
