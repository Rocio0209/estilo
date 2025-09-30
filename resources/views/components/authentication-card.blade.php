<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-institucionalescudo">
    <div class="d-flex flex-column align-items-center">
        {{ $logo }}
    </div>

    @isset($titulo)
        <div class="d-flex justify-content-start w-full sm:max-w-xl">
            {{ $titulo }}
        </div>
    @endisset
    <div class="bg-institucionalfondo w-full sm:max-w-xl px-6 pt-4 pb-1  shadow-md overflow-hidden sm:rounded-lg" @isset($titulo)
        style=" border-radius: 0px 10px 10px 10px; "
    @endisset >
        {{ $slot }}
    </div>
</div>
