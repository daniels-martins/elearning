<section>
    <header>
        @if (session('status') === 'preference-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 7000)" class="text-sm text-gray-600">
                {{ __('Saved.') }}</p>
        @endif

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Configure your preferences for a better educational experience') }}
        </h2>

    </header>
    {{-- {{ dd($preference) }} --}}
    <form method="post" action="{{ route('learning_preference.update', $preference) }}" class="mt-6 space-y-6">
        
        @csrf
        @method('patch')
        <script>
            "use strict";
        </script>
        @foreach ($preference_iterator as $i)
            {{-- format label --}}
            <div>
                @if (in_array($i, $needs_message))
                    <x-input-label for="{{ $i }}" :value="$i . ' based learning' . ' (0-10)'" class="uppercase" />
                @else
                    <x-input-label for="{{ $i }}" :value="__($i) . ' (0-10)'" class="uppercase" />
                @endif

                <x-text-input id="{{ 'myRange_' . $i }}" name="{{ $i }}" type="range" min=1 max=10
                    class="mt-1 block w-full" :value="old($i, $preference[$i])" required autofocus
                    placeholder="{{ $preference[$i] ?? 'not evaluated' }}" />
                <x-input-error class="mt-2" :messages="$errors->get($i)" />
                <br>
                <div id="{{ 'demo_' . $i }}"></div>
                <script>
                    // js dynamic programming with php
                    // dynamic variable declaration just like $$key = $value in php
                    var {{ $i . '_input' }} = document.getElementById('myRange_' + '{{ $i }}');
                    var {{ $i . '_output' }} = document.getElementById('demo_' + '{{ $i }}');
                    {{ $i . '_output' }}.innerHTML = {{ $i . '_input' }}.value + '/10'; // Display the default slider value

                    // Update the current slider value (each time you drag the slider handle)
                    {{ $i . '_input' }}.oninput = function() {
                        {{ $i . '_output' }}.innerHTML = this.value + '/10';;
                    }
                </script>
            </div>
        @endforeach



        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'preference-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 7000)"
                    class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
