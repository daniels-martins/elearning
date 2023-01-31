{{-- side bar --}}
<div class="col-span-1">
    <a href="{{ route('dashboard') }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg 
   shadow-md hover:bg-gray-500 hover:text-white @if (request()->routeIs('dashboard')) bg-gray-400 @endif ">
        Dashboard
    </a>
    <a href="{{ route('student_courses.index') }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg m-4 
   shadow-md hover:bg-gray-500 hover:text-white @if (request()->routeIs('student_courses.index')) bg-gray-400 @endif ">
        My Courses
    </a>

    <a href="{{ route('courses.index') }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg m-4 
shadow-md hover:bg-gray-500 hover:text-white @if (request()->routeIs('courses.index')) bg-gray-400 @endif ">
        Register Course
    </a>
    <a href="{{ route('learning_preference.index') }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg m-4 
    shadow-md hover:bg-gray-500 hover:text-white @if (request()->routeIs('learning_preference.index')) bg-gray-400 @endif ">
        Learning preference
    </a>
    {{-- dark:bg-gray-800 dark:border-gray-500 dark:hover:bg-gray-700 --}}
    <a href="{{ route('learning_preference.edit',auth()->user()->preferences()->first()->id) }}"
        class="block max-w-sm p-6 bg-white border border-gray-200 
   rounded-lg m-4 shadow-md hover:bg-gray-500 hover:text-white @if (request()->routeIs('learning_preference.edit')) bg-gray-400 @endif ">
        Configure Preferences
    </a>

</div>
