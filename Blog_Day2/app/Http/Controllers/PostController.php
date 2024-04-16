<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
  public function index()
  {
    $posts = [
      [
        'id' => 1,
        'title' => 'Lorem Ipsum Dolor Sit Amet',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et turpis non quam tincidunt fringilla vel a eros. Nam malesuada convallis lorem, ut blandit velit bibendum vel.',
        'publisher' => 'John Doe'
      ],
      [
        'id' => 2,
        'title' => 'Nulla Malesuada Massa In Felis Tincidunt',
        'description' => 'Nulla malesuada massa in felis tincidunt, id gravida leo aliquam. Vivamus vitae tempor quam. In hac habitasse platea dictumst.',
        'publisher' => 'Jane Smith'
      ],
      [
        'id' => 3,
        'title' => 'Fusce Non Aliquet Ligula',
        'description' => 'Fusce non aliquet ligula. Donec maximus ante ac velit feugiat, eget eleifend sapien vestibulum. Mauris posuere libero ut ligula feugiat finibus.',
        'publisher' => 'Michael Johnson'
      ],
      [
        'id' => 4,
        'title' => 'Pellentesque Habitasse Morbi Tristique',
        'description' => 'Pellentesque habitasse morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer ac est vel nisl placerat aliquam. Nam in purus fermentum, ultricies tortor vel, hendrerit magna.',
        'publisher' => 'Emily Davis'
      ],
      [
        'id' => 5,
        'title' => 'Vestibulum Ante Ipsum Primis',
        'description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce nec velit sed lorem dictum venenatis vel ac magna. Nam dapibus fermentum ligula, nec efficitur magna consequat nec.',
        'publisher' => 'Christopher Brown'
      ],
    ];
    return view('posts.index', ["posts" => $posts]);
  }

  public function create()
  {
    return view('posts.create');
  }

  public function store()
  {
    return redirect('/posts');
  }

  public function show($id)
  {
    $post = [
      'id' => $id,
      'title' => 'Vestibulum Ante Ipsum Primis',
      'description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce nec velit sed lorem dictum venenatis vel ac magna. Nam dapibus fermentum ligula, nec efficitur magna consequat nec.',
      'publisher' => 'Christopher Brown'
    ];

    return view('posts.show', ['post' => $post]);
  }

  public function edit($id)
  {
    $post = [
      'id' => $id,
      'title' => 'Vestibulum Ante Ipsum Primis',
      'description' => 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Fusce nec velit sed lorem dictum venenatis vel ac magna. Nam dapibus fermentum ligula, nec efficitur magna consequat nec.',
      'publisher' => 'Christopher Brown'
    ];

    return view('posts.edit', ['post' => $post]);
  }

  public function update($id, Request $request)
  {
    return redirect('/posts');
  }

  public function destroy($id)
  {
    return redirect('/posts');
  }
}
