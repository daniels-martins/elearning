<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ thisRoute() }}
        </h2>
    </x-slot>

    <div class="p-12">
        <div class="grid grid-cols-5 grid-flow-col gap-4">
            {{-- dynamic side bar --}}
            @if (auth()->user()->isLearner())
                @include('student.partials.sidebar')
            @else
                @include('instructor.partials.sidebar')
            @endif

            {{-- main content --}}
            <div class="col-span-4 rounded-lg">
                @include('general.partials.alert')
                <div href="#"
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                        Welcome, {{ ucfirst(auth()->user()->name) }} </h5>
                    <p class="font-normal text-center text-gray-700 dark:text-gray-200 capitalize">
                        View all courses here.
                    </p>

                </div>

                <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
                    <div class="grid grid-cols-2 gap-10">
                        @foreach ($courses as $course)
                            @if (Auth::user()->isLearner())
                                @include('student.partials.display_course')
                            @else
                                @include('instructor.partials.display_course')
                            @endif
                        @endforeach



                    </div>

                    <div class="flex gap-3 mt-4">
                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Content.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">30 Contents
                            </h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Courses.</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">55</h5>
                        </a>

                        <a href="#"
                            class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                            <p class="font-normal text-gray-700 dark:text-gray-400">Total Quiz</p>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">55</h5>
                        </a>

                    </div>

                </div>
            </div>

        </div>

    </div>
</x-app-layout>
