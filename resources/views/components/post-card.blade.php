<div class="col-md-3 d-flex">
    <div class="card mb-4 flex-fill shadow-sm border-0 rounded-lg overflow-hidden">
        <div class="position-relative">
            <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}">
                <img src="{{ asset('images/posts/' . $post->image) }}" 
                     class="card-img-top img-fluid" 
                     alt="{{ $post->image }}" 
                     style="height: 220px; object-fit: cover; transition: transform 0.3s;">
            </a>
            <span class="badge bg-danger position-absolute top-0 start-0 m-2 px-3 py-2 shadow">
                <?= date('d/m/Y', strtotime($post['created_at'])) ?>
            </span>
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate" title="<?= $post['title'] ?>">
                <?= $post['title'] ?>
            </h5>
            <p class="card-text text-muted small mb-3">
                <?= \Illuminate\Support\Str::limit(strip_tags($post['detail'] ?? ''), 80, '...') ?>
            </p>
            <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}" 
               class="btn btn-outline-primary btn-sm mt-auto align-self-start rounded-pill">
                Đọc tiếp »
            </a>
        </div>
    </div>
</div>
