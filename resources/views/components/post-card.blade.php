<div class="col-md-3 d-flex">
    <div class="card mb-4 flex-fill">
        <div class="position-relative">
            <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}">
                <img src="{{ asset('images/posts/' . $post->image) }}" class="card-img-top" alt="{{ $post->image }}">
            </a>
            <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                <?= date('d/m/Y', strtotime($post['created_at'])) ?>
            </span>
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $post['title'] ?></h5>
            <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}" class="btn btn-link mt-auto p-0">Đọc tiếp
                »</a>
        </div>
    </div>
</div>
