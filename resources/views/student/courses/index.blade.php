<x-app-layout>
   <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
         {{ $this_route }}
      </h2>
   </x-slot>

   <div class="p-12">
      <div class="grid grid-cols-5 grid-flow-col gap-4">
         {{-- side bar --}}
         <div class="col-span-1 ">
            <a href="{{ route('dashboard') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
               @if (request()->routeIs('dashboard'))  bg-gray-200 @endif   ">
               Dashboard
            </a>
            <a href="{{route('courses.index')}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
               @if (request()->routeIs('courses.index'))  bg-gray-200 @endif   ">
               Courses
            </a>
            <a href="{{ route('learning_preference.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
               @if (request()->routeIs('learning_preference.index'))  bg-gray-200 @endif   ">
               Learning preference
            </a>

         </div>

         {{-- main content --}}
         <div class="col-span-4 rounded-lg">

            <div href="#"
               class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
               <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                  Welcome, {{ ucfirst(auth()->user()->name) }} </h5>
               <small class="font-normal text-gray-700 dark:text-gray-400"> Here's what happened with your learning
                  system.</small>
            </div>

            <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
               <div class="grid grid-cols-2 gap-10">
                  @foreach ($_GET as $item)
                  ww
                  @endforeach
                  <div
                     class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                     <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Numerical
                           Analysis (MTH211)</h5>
                     </a>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                     <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register this course
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                  </div>


                  <div
                     class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                     <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Numerical
                           Analysis (MTH211)</h5>
                     </a>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                     <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register this course
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                  </div>

                  <div
                     class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                     <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Numerical
                           Analysis (MTH211)</h5>
                     </a>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                     <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register this course
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                  </div>

                  <div
                     class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                     <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Numerical
                           Analysis (MTH211)</h5>
                     </a>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                     <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register this course
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                  </div>

                  <div
                     class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                     <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Numerical
                           Analysis (MTH211)</h5>
                     </a>
                     <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                        technology acquisitions of 2021 so far, in reverse chronological order.</p>
                     <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Register this course
                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                           <path fill-rule="evenodd"
                              d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                        </svg>
                     </a>
                  </div>


               </div>

               <div class="flex gap-3 mt-4">
                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Total Content.</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">80 Contents</h5>
                  </a>

                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Total Courses.</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">42</h5>
                  </a>

                  <a href="#"
                     class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                     <p class="font-normal text-gray-700 dark:text-gray-400">Total Quiz</p>
                     <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">30</h5>
                  </a>

               </div>

            </div>
         </div>

      </div>

   </div>
</x-app-layout>