<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ thisRoute() }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="grid grid-cols-5 grid-flow-col gap-4">
            {{-- side bar --}}
            @include('student.partials.sidebar')

            {{-- main content --}}
            <div class="col-span-4 rounded-lg">

                <div href="#"
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 
               dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                        Welcome, {{ ucfirst(auth()->user()->name) }} </h5>
                    <small class="font-normal text-gray-700 dark:text-gray-400"> Here's what happened with your learning
                        system.</small>
                </div>

                <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
                    <div class="flex gap-3">
                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800
                      dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Profile Summary.</p>
                            <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white"> {{ $full_sms }}</h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800
                      dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Average Learning time.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">42 Minutes
                            </h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
                     dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Average Access time.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">52 Minutes
                            </h5>
                        </a>
                    </div>
                    <div class="flex gap-3 mt-4">
                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
                     dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Content.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">80 Contents
                            </h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
                     dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Courses.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">42</h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
                     dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Quiz</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">30</h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 
                  dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Quiz</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">30</h5>
                        </a>

                    </div>
                    @for ($a = 0; $a < 3; $a++)
                        <div class="flex gap-3 mt-4">
                            @for ($i = 0; $i < 3; $i++)
                                <a href="#"
                                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md 
                                hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                    <object width="400" height="350" data="http://www.youtube.com/v/Ahg6qcgoay4"
                                        type="application/x-shockwave-flash">
                                        <param name="src" value="http://www.youtube.com/v/Ahg6qcgoay4" />
                                        <h2 class="capitalize"> Video is currently unavailable</h2>
                                    </object>
                                </a>
                            @endfor
                        </div>
                    @endfor
                </div>
            </div>

        </div>

    </div>
</x-app-layout>
