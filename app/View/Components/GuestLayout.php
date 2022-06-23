<?php

namespace App\View\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class GuestLayout extends Component
{
    /**
     * The page title.
     *
     * @var string
     */
    public $title;

    /**
     * Create the component instance.
     *
     * @param  string  $type
     * @param  string  $message
     * @return void
     */
    public function __construct($title = '')
    {
        $pageTitle = Str::of(config('app.name'))
            ->when($title !== '', function ($str) use ($title) {
                return $str
                    ->prepend(' - ')
                    ->prepend($title);
            });

        $this->title = $pageTitle;
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('layouts.guest');
    }
}
