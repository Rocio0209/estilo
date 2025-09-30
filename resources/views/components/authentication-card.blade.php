<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-institucionalescudo">
    <div class="d-flex flex-column align-items-center">
        {{ $logo }}
    </div>

    @isset($titulo)
        <div class="d-flex justify-content-start w-full sm:max-w-2xl">
            {{ $titulo }}
        </div>
    @endisset
    <div class="bg-institucionalfondo w-full sm:max-w-2xl px-6 py-4  shadow-md overflow-hidden sm:rounded-lg" @isset($titulo)
        style=" border-radius: 0px 10px 10px 10px; "
    @endisset >
        {{ $slot }}
    </div>
    <div class="d-flex justify-content-center align-items-center w-full sm:max-w-2xl mt-3">
        <p class="text-center font-institucional-re sm:max-w-2xl text-white text-xs">Sus datos personales (nombre y CURP) serán tratados de manera confidencial y utilizados únicamente para validar su identidad como parte del personal de la institución, conforme a la Ley General de Protección de Datos Personales en Posesión de Sujetos Obligados. Consulte el <span class="font-institucional-b">Aviso de Privacidad Integral.</span></p>
    </div>
    
</div>
