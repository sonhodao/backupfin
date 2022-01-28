<?php

// Trang chủ
Breadcrumbs::for(
    'fe.home', function ($trail) {
        $trail->push('Trang chủ', route('fe.home'));
    }
);

Breadcrumbs::for(
    'fe.contact', function ($trail) {
        $trail->parent('fe.home');
        $trail->push('Liên hệ với chúng tôi');
    }
);



/**
 * ---------- Bài viết -------------
**/

// Home > Bài viết > [Category]
Breadcrumbs::for(
    'fe.post.category', function ($trail, $category) {
        $trail->parent('fe.home');
        $trail->push($category->title, route('fe.post.category', ['slug'=>$category->slug,'id'=>$category->id]));
    }
);

// Home > Bài viết > [Category] > [Post]
Breadcrumbs::for(
    'fe.post', function ($trail, $post) {
        $trail->parent('fe.home');
        foreach($post->categories as $category){
            $trail->push($category->title, route('fe.post.category', ['slug'=>$category->slug,'id'=>$category->id]));
        }
        $trail->push($post->title, route('fe.post', ['slug'=>$post->slug,'id'=>$post->id]));
    }
);

Breadcrumbs::for(
    'fe.search', function ($trail,$p) {
        $trail->parent('fe.home');
        $trail->push($p, route('fe.search.index'));
    }
);

Breadcrumbs::for(
    'fe.post.tag', function ($trail,$tag) {
        $trail->parent('fe.home');
        $trail->push($tag->name, route('fe.post.tag', ['slug'=>$tag->slug]));
    }
);

Breadcrumbs::for(
    'fe.page.show', function ($trail, $page) {
        $trail->parent('fe.home');
        $trail->push($page->title, route('fe.page.show', ['slug'=>$page->slug,'id'=>$page->id]));
    }
);

Breadcrumbs::for(
    'fe.login', function ($trail) {
        $trail->parent('fe.home');
        $trail->push(
            __('Login'), route('fe.login')
        );
    }
);

Breadcrumbs::for(
    'fe.update.pass', function ($trail) {
        $trail->parent('fe.home');
        $trail->push(
            __('New Password'), route('fe.update.pass')
        );
    }
);

Breadcrumbs::for(
    'fe.resetPassword', function ($trail) {
        $trail->parent('fe.home');
        $trail->push(
            __('Reset Password'), route('fe.resetPassword')
        );
    }
);


Breadcrumbs::for(
    'fe.register', function ($trail) {
        $trail->parent('fe.home');
        $trail->push(
            __('Register'), route('fe.register')
        );
    }
);

Breadcrumbs::for(
    'fe.account.address', function ($trail) {
        $trail->parent('fe.account.info');
        $trail->push(
            __('Address'), route('fe.account.address')
        );
    }
);

Breadcrumbs::for(
    'fe.account.detail', function ($trail) {
        $trail->parent('fe.account.info');
        $trail->push(
            __('My Account'), route('fe.account.detail')
        );
    }
);

Breadcrumbs::for(
    'fe.account.info', function ($trail) {
        $trail->parent('fe.home');
        $trail->push(
            __('Thông tin tài khoản'), route('fe.account.info')
        );
    }
);
Breadcrumbs::for(
    'fe.account.wishlist', function ($trail) {
        $trail->parent('fe.account.info');
        $trail->push(
            __('Wish List'), route('fe.account.wishlist')
        );
    }
);




