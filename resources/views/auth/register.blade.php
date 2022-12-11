<x-guest-layout>
   <x-auth-card>
      <x-slot name="logo">
         <a href="/">
            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
         </a>
      </x-slot>

      <form method="POST" action="{{ route('register') }}">
         @csrf

         <!-- Name -->
         <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input required id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
               autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
         </div>

         <!-- Email Address -->
         <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input required id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
             />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
         </div>


         {{--
         <!-- Role -->
         <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <x-text-input required id="role" class="block mt-1 w-full" type="text" name="name"
               placeholder="eg. student, instructor" :value="old('role')" autofocus />
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
         </div> --}}

         <!-- Password -->
         <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input required id="password" class="block mt-1 w-full" type="password" name="password"
               autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
         </div>

         <!-- Confirm Password -->
         <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input required id="password_confirmation" class="block mt-1 w-full" type="password"
               name="password_confirmation" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
         </div>

          <!-- Role -->
          <div class="mt-4 flex justify-around">
            <label for="">Role</label>
            <div class="">
               <x-input-label for="student" :value="__('Student')" />
               <input type="radio" name="role" value="student" id="student" 
               @if (old('role') == 'student')   checked @endif />
            </div>
            <div>
               <x-input-label for="instructor" :value="__('Instructor')" />
               <input type="radio" name="role" value="instructor" id="instructor" 
               @if (old('role') == 'instructor')  checked @endif />
            </div>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />

         </div>


         <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
               href="{{ route('login') }}">
               {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
               {{ __('Register') }}
            </x-primary-button>
         </div>
      </form>
   </x-auth-card>
</x-guest-layout>