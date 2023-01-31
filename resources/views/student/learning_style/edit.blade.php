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
                    class="block w-full p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-xl font-lighter tracking-tight text-gray-900 dark:text-white">
                        Welcome, {{ ucfirst(auth()->user()->name) }} </h5>
                    <small class="font-normal text-gray-700 dark:text-gray-400"> Here's what happened with your learning
                        system.</small>
                </div>

                <div class="p-10 grid-cols-3 bg-gray-200 rounded-lg">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('student.learning_style.partials.edit-preferences-form')
                            </div>
                        </div>
                </div>

            </div>

        </div>
</x-app-layout>
