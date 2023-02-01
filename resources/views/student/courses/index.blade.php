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
                @include('general.partials.alert')

                <div href="#"
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                        Welcome, {{ ucfirst(auth()->user()->name) }} </h5>
                    <p class="font-normal text-center text-gray-700 dark:text-gray-200"> View all registered courses
                        here.</p>

                </div>

                <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
                    <div class="grid grid-cols-2 gap-10">
                        @foreach ($courses as $course)
                            <div
                                class=" p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                                <a href="#">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                        {{ $course->title }} ({{ $course->code }})</h5>
                                </a>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                    Course Code : {{ $course->code }} <br>
                                    Course Title : {{ $course->title }} <br>
                                    Credits : {{ $course->credits }} <br>
                                    Status : {{ $course->core }} <br>
                                </p>
                                <div class="flex justify-between">
                                    <a href="#" caption='Come back next Year to register this course'
                                        title="Semester is currently closed, come back next year"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        View this course today
                                        <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('student_courses.destroy', ['course' => $course->id]) }}"
                                        method="post">
                                        @csrf @method('delete')
                                        <button caption='Come back next Year to register this course' type="submit"
                                            title="Semester is currently closed, come back next year"
                                            class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-red-500 dark:hover:bg-red-400 dark:focus:ring-blue-800">
                                            Unregister
                                            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
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
