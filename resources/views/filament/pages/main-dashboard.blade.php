<?php
 use Filament\Widgets\StatsOverviewWidget\Stat;
 use App\Models\User;
?>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<style>
    .swiper-container {
        overflow: hidden;
        position: relative;
    }
    .swiper-container2 {
        overflow: hidden;
        position: relative;
    }
</style>
<x-filament-panels::page>
    <div>
        <div>
            @livewire('bienvenida')
        </div>
    </div>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div style="width: 80%; margin-left:90px; padding:40px;" >
                    @livewire('user.conteouser1')
                </div>
            </div>
            <div class="swiper-slide">
                <div style="width: 80%; margin-left:90px; padding:40px;" >
                    @livewire('user.conteouser2')
                </div>
            </div>
            <div class="swiper-slide">
                <div style="width: 80%; margin-left:90px; padding:40px;" >
                    @livewire('user.conteouser3')
                </div>
            </div>
            <div class="swiper-slide">
                <div style="width: 80%; margin-left:90px; padding:40px;" >
                    @livewire('user.conteouser4')
                </div>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>

    </div>

    <div class="swiper-container2">
        <div class="swiper-wrapper">
            <div class="swiper-slide" style="width: 75%;">
                <div style="width: 90%; float:left; height: 200px; margin-left: 5%;">
                    @livewire('user.produccionusermeses')
                </div>
            </div>
            <div class="swiper-slide" style="width: 75%;">
                <div style="width: 90%; height: 400px; float:right; margin-left: 1%; margin-right: 4%;">
                    @livewire('user.produccionusertrimestre')
                </div>
            </div>
            <div class="swiper-slide" style="width: 75%;">
                <div style="width: 90%; float:left; height: 230px; margin-left: 5%;">
                    @livewire('user.produccionusergeneral')
                </div>
            </div>
            @if(auth()->user()->es_admin == 1)
                <div class="swiper-slide">
                    <div style="width: 75%; margin-left:90px; padding:40px;">
                        @livewire('producciondepartamentodocentes')
                    </div>
                </div>
            @endif
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div><br><br><br>
        <div class="swiper-pagination"></div>
    </div>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        var swiper2 = new Swiper('.swiper-container2', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</x-filament-panels::page>