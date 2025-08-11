
<div class="col-md-3 d-flex">
    <div class="card mb-4 flex-fill">
        <div class="position-relative">
            <a href="{{route('site.post.detail',['slug'=>$post->slug])}}">
                <img src="{{asset('images/posts/'.$post->image)}}" class="card-img-top" alt="{{$post->image}}">
            </a>
            <span class="badge bg-danger position-absolute top-0 start-0 m-2">
                <?= date('d/m/Y', strtotime($post['created_at'])); ?>
            </span>
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title"><?= $post['title']; ?></h5>
            <a href="{{route('site.post.detail',['slug'=>$post->slug])}}" class="btn btn-link mt-auto p-0">Đọc tiếp »</a>
        </div>
    </div>
</div>

    

<style>
            /* Card container */
    .card {
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        overflow: hidden; /* Đảm bảo các phần tử không vượt ra ngoài biên giới của card */
        transition: box-shadow 0.3s ease, transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px); /* Hiệu ứng di chuyển lên khi hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Tăng độ đổ bóng khi hover */
    }

    .card-title {
    font-size: 16px;
    margin-bottom: 10px;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2; /* Giới hạn tối đa 2 dòng */
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    word-break: break-word;
}

.card-body {
    padding: 15px;
    display: flex;
    flex-direction: column;
}

.btn-link {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    margin-top: auto; /* đẩy nút xuống đáy card */
}

</style>