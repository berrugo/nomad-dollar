<div wire:init="loadCurrencies">
    @if(! is_array($currencies))
        <div class="flex justify-center items-center h-screen">
            <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
            </svg>
        </div>
    @else
        <ul class="relative z-0 divide-y divide-gray-200 border-b border-gray-200">
            @foreach($currencies as $currency)
                <li
                    class="relative pl-4 pr-6 py-5 hover:bg-gray-50 sm:py-6 sm:pl-6 lg:pl-8 xl:pl-6"
                    wire:key="{{ $currency['name'] }}"
                >
                    <a
                        href="https://www.google.com/finance/quote/{{ $currency['name'] }}"
                        wire:click.prevent="openCurrency('{{ $currency['name'] }}')"
                        class="flex items-center justify-between space-x-4"
                    >
                        <div class="min-w-0 space-y-3">
                            <div class="flex items-center space-x-3">
                                <div>
                                    @if($currency['status'] != 'up')
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-400 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.71,9.29l-7-7a1,1,0,0,0-1.42,0l-7,7a1,1,0,0,0,1.42,1.42L11,5.41V21a1,1,0,0,0,2,0V5.41l5.29,5.3a1,1,0,0,0,1.42,0A1,1,0,0,0,19.71,9.29Z" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="w-6 h-6 text-green-400 mr-2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.71,13.29a1,1,0,0,0-1.42,0L13,18.59V3a1,1,0,0,0-2,0V18.59l-5.29-5.3a1,1,0,0,0-1.42,1.42l7,7a1,1,0,0,0,1.42,0l7-7A1,1,0,0,0,19.71,13.29Z" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <h2 class="text-sm font-medium text-gray-600">
                                        {{ $currency['name'] }}
                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col flex-shrink-0 items-end space-y-3">
                            <p class="flex items-center space-x-4">
                        <span class="relative text-sm text-gray-500 font-medium">
                            {{ $currency['value']}}
                        </span>
                            </p>
                            <p class="flex text-gray-500 text-sm space-x-2 items-center">
                                <span title="last release" class="ml-[3px]">
                                    {{ (new \Carbon\Carbon($currency['date']))->toDateString()}}
                                </span>
                            </p>
                        </div>
                    </a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
