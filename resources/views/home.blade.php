<!-- @extends('app')

@section('title', 'Beranda')

@section('content')
<div class="d-flex flex-column justify-content-center align-items-center vh-100 text-center px-3 home-background">

    <!-- Judul -->
    <h1 class="fw-bold mb-3 home-title">Pet <span class="home-title-accent">Supplies</span></h1>
    <p class="lead home-subtitle mb-4">Tempat terbaik untuk kebutuhan hewan peliharaanmu 🐾</p>
    

        </a>
    </div>
</div>

<!-- CSS langsung di file Blade -->
<style>
/* Import Google Fonts */
@import url('https://fonts.googleapis.com/css2?family=Beth+Ellen&family=Henny+Penny&display=swap');



.home-background::before {
    
    content: "🐾 🐾 🐾 🐾 🐾 🐾 🐾 🐾";
    position: absolute;
    top: 0;
    right: -50%;
    left: -50%;
    width: 200%;
    height: 100%;
    font-size: 5rem;
    color: rgba(255, 183, 77, 0.15);
    display: flex;
    flex-wrap: wrap;
    align-content: space-around;
    justify-content: space-around;
    pointer-events: none;
    z-index: 0;
    animation: movePaws 30s linear infinite;
}

/* Animasi paw bergerak */


/* Judul utama */
.home-title {
    font-family: 'Henny Penny', cursive;
    font-size: 4rem;
    letter-spacing: 1px;
    color: #333;
    transition: transform 0.3s ease;
    position: relative;
    z-index: 1;
}

.home-title:hover {
    transform: scale(1.05);
}



</style>
@endsection -->
