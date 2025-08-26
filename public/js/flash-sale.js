// <!-- Script countdown + swiper -->
function countdown() {
    const end = new Date().getTime() + 1000 * 60 * 60 * 24;
    const timer = document.getElementById("countdown-timer");
    setInterval(() => {
        const now = new Date().getTime();
        const diff = end - now;
        const hrs = Math.floor(
            (diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
        );
        const min = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const sec = Math.floor((diff % (1000 * 60)) / 1000);
        timer.innerText = `${hrs.toString().padStart(2, "0")} : ${min
            .toString()
            .padStart(2, "0")} : ${sec.toString().padStart(2, "0")}`;
    }, 1000);
}
countdown();

new Swiper(".product-carousel", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        0: { slidesPerView: 1 },
        576: { slidesPerView: 2 },
        768: { slidesPerView: 3 },
        992: { slidesPerView: 4 },
        1200: { slidesPerView: 5 },
    },
});

// Swiper hiển thị 2 banner một lúc
new Swiper(".banner-top-swiper", {
    loop: true,
    spaceBetween: 20,
    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },
    speed: 1000, // mượt mà hơn
    slidesPerView: 2,
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 2,
        },
    },
});
