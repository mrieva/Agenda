{{-- <div id="loader" class="flex items-center justify-center h-screen bg-white fixed inset-0 z-50">
    <div class="book">
        <div class="cover front"></div>
        <div class="page first-page">
            <span class="page-content"></span>
        </div>
        <div class="page second-page">
            <span class="page-content"></span>
        </div>
        <div class="page third-page">
            <span class="page-content"></span>
        </div>
        <div class="cover back"></div>
    </div>
    <div class="text-animation">EDUNOTE</div>
</div>

<style>
    body {
        margin: 0;
        padding: 0;
        background-color: #f3f4f6;
        font-family: Arial, sans-serif;
    }

    .book {
        position: relative;
        width: 160px;
        height: 200px;
        transform-style: preserve-3d;
        transform-origin: left center;
        perspective: 1200px;
        animation: shake 0.5s ease-in-out infinite alternate;
    }

    .cover, .page {
        position: absolute;
        width: 100%;
        height: 100%;
        border-radius: 5px;
        backface-visibility: hidden;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.3), 0 0 15px rgba(94, 158, 178, 0.8);
        border: 2px solid #7097c3;
    }

    .cover {
        background-color: #5E9EB2;
        background-image: url('/img/logo.png'), url('/img/texture.jpg');
        background-position: center, center;
        background-repeat: no-repeat, repeat;
        background-size: 120px 120px, cover; /* Ubah dari 80px menjadi 120px */
        transition: transform 0.5s ease;
    }

    .cover.front {
        z-index: 10;
        animation: openCover 1s ease forwards;
        transform-origin: left center;
    }

    .cover.back {
        z-index: 0;
        transform: rotateY(180deg);
        animation: closeCover 0.75s ease forwards;
        animation-delay: 2s;
        background-color: #5E9EB2;
    }

    .page {
        z-index: 2;
        transform-origin: left center;
        animation: flipPage 1s ease forwards;
        animation-fill-mode: forwards;
        transform-style: preserve-3d;
        background-color: #fff;
        background-image: repeating-linear-gradient(
            0deg,
            transparent,
            transparent 10px,
            #ccc 10px,
            #ccc 12px
        );
        border-right: 4px solid #e0e0e0;
    }

    .first-page {
        z-index: 9;
        animation-delay: 0.2s;
    }

    .second-page {
        z-index: 8;
        animation-delay: 0.5s;
    }

    .third-page {
        z-index: 7;
        animation-delay: 0.8s;
    }

    .text-animation {
        position: absolute;
        bottom: 100px;
        left: 50%;
        transform: translateX(-50%);
        font-weight: bold;
        font-size: 48px;
        color: #5E9EB2;
        opacity: 0;
        animation: slideIn 0.75s ease forwards 1.5s; /* Dipersingkat dan delay disesuaikan */
    }

    @keyframes slideIn {
        from {
            transform: translate(-50%, 30px); /* Pergerakan lebih panjang */
            opacity: 0;
        }
        to {
            transform: translate(-50%, 0);
            opacity: 1;
        }
    }

    @keyframes openCover {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-150deg); }
    }

    @keyframes flipPage {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(-180deg); }
    }

    @keyframes closeCover {
        0% { transform: rotateY(180deg); }
        100% { transform: rotateY(0deg); }
    }

    @keyframes shake {
        0% { transform: rotateY(0deg); }
        100% { transform: rotateY(5deg); }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

    .fadeOut {
        animation: fadeOut 0.5s forwards; /* Durasi fade-out */
    }

    .hide {
        display: none;
    }
</style>

<script>
    window.addEventListener('load', function() {
        const loader = document.getElementById('loader');
        const pages = document.querySelectorAll('.page');

        const flipDurations = [1000, 1250, 1500];

        pages.forEach((page, index) => {
            setTimeout(() => {
                page.classList.add('hide');
            }, flipDurations[index]);
        });

        setTimeout(() => {
            loader.classList.add('fadeOut'); // Tambahkan kelas fadeOut
            setTimeout(() => {
                loader.style.display = 'none'; // Sembunyikan loader setelah fade-out
            }, 500); // Sesuaikan dengan durasi fade-out
        }, 2500);
    });
</script> --}}
