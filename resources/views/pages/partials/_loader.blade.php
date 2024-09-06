<style media="all">
    .loader{
        background: #d6d6d6;
        background: -moz-radial-gradient(center, ellipse cover,  #d6d6d6 0%, #f0f0f0 101%);
        background: -webkit-radial-gradient(center, ellipse cover,  #d6d6d6 0%,#f0f0f0 101%);
        background: radial-gradient(ellipse at center,  #d6d6d6 0%,#f0f0f0 101%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d6d6d6', endColorstr='#f0f0f0',GradientType=1 );
        overflow:hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 100000000;
    }
    .loader img{
        filter: drop-shadow(0 2px 1px rgba(0,0,0,0.2));
        transform-origin: center top;
        animation: treco 1s ease-out infinite;
    }
    @keyframes  treco {
        0%   { transform: rotatez(0deg);filter: drop-shadow(0 2px 1px rgba(0,0,0,0.2)); }
        40%  { transform: rotatez(5deg);filter: drop-shadow(2px 2px 1px rgba(0,0,0,0.2)); }
        60%  { transform: rotatez(-5deg);filter: drop-shadow(-2px 2px 1px rgba(0,0,0,0.2)); }
        100% { transform: rotatez(0deg);filter: drop-shadow(0 2px 1px rgba(0,0,0,0.2)); }
    }
</style>
<div class="loader">
    <img src="{{ asset('theme/imagens/favicon.png') }}" alt="Laboratório Cortez Moreira">
</div>
