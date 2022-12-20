<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ thisRoute() }}
      </h2>
   </x-slot>

   <div class="p-12">
      <div class="grid grid-cols-5 grid-flow-col gap-4">
         {{-- side bar --}}
         @include('instructor.partials.sidebar')
         {{-- main content --}}
         <div class="col-span-4 rounded-lg">

            <div href="#"
               class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
               {{-- <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                  Welcome, {{ ucfirst(auth()->user()->name) }} </h5> --}}
               <p class="font-normal text-xl text-center capitalize font-lighter text-gray-700 dark:text-gray-400">Learning Preferences for {{ normalizeKebab($student->fname) }}</p>
            </div>

            <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
               <div class="grid grid-cols-2 gap-3">
                  @foreach ($preference_iterator as $i)
                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">
                        {{-- {{ Auth::user()->learningPreference->$i ?? 'nil data for '. $i}} --}}

                        <b class="text-2xl uppercase">{{ $i }} Lessons</b> <br>
                        {{-- smart web agent for education content creation --}}
                        <b class="capitalize">{{ $student->fname }}</b> {{ $student->presentLearningPreference($i) }}
                     </p>
                     <h5 class="mt-4 text-2xl  tracking-tight text-gray-900 dark:text-white">{{
                        $student->learningPreference->$i * 10 }}% of {{ $student->fname }}'s courses are tailored this
                        way</h5>
                  </a>
                  @endforeach
               </div>
            </div>

         </div>

      </div>
</x-app-layout>