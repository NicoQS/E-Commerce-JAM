<div wire:loading.delay>
    <div id="loading" {{ $attributes->merge(['class' => 'fixed top-0 left-0 z-50 block w-full h-full bg-white opacity-75']) }}>
        <span class="relative block w-0 h-0 mx-auto my-0 opacity-75 top-1/2">
            <svg class="w-10 h-10 mr-3 -ml-1 text-indigo-500 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </span>
    </div>
</div>
