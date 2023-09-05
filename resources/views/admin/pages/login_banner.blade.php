<?php
$icon_list = \App\Models\Icon::whereNotNull('image')
    ->where('tag', 'like', '%cod%')
    ->inRandomOrder()
    ->take(10)
    ->get();
?>
<div class="login_banner">
    <div class="login_banner_list_img">
        @foreach ($icon_list as $icon)
            <img class="login_banner_img" src="{{ asset($icon->image) }}">
        @endforeach
    </div>
</div>
