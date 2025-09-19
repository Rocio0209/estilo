<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-institucionalescudo">
    <div class="d-flex flex-column align-items-center">
        {{ $logo }}
    </div>

    @isset($titulo)
        <div class="d-flex justify-content-start w-full sm:max-w-md">
            {{ $titulo }}
        </div>
    @endisset
    <div class="bg-institucional2 w-full sm:max-w-md px-6 py-4  shadow-md overflow-hidden sm:rounded-lg" @isset($titulo)
        style=" border-radius: 0px 10px 10px 10px; "
    @endisset >
        {{ $slot }}
    </div>
</div>
