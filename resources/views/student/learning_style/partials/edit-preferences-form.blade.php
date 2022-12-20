<section>
   <header>
      @if (session('status') === 'preference-updated')
      <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 7000)"
         class="text-sm text-gray-600">{{ __('Saved.') }}</p>
      @endif

      <h2 class="text-lg font-medium text-gray-900">
         {{ __('Configure your preferences for a better educational experience') }}
      </h2>

   </header>

   <form method="post" action="{{ route('learning_preference.update', $preference) }}" class="mt-6 space-y-6">
      @csrf
      @method('patch')
      @foreach ($preference_iterator as $i)
      {{-- we don't want to see the student_id field, this should not be editable --}}
      @php if ($i == 'student_id') continue; @endphp


      {{-- format label --}}
      <div>
         @if (in_array($i, $needs_message))
         <x-input-label for="{{ $i }}" :value=" $i . ' based learning' . ' (0-10)' " class="uppercase" />
         @else
         <x-input-label for="{{ $i }}" :value="__($i) . ' (0-10)' " class="uppercase" />
         @endif

         <x-text-input id="{{ $i }}" name="{{ $i }}" type="number" min=1 max=10 class="mt-1 block w-full"
            :value="old($i, $preference[$i])" required autofocus
            placeholder="{{ $preference[$i] ?? 'not evaluated' }}" />
         <x-input-error class="mt-2" :messages="$errors->get($i)" />
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