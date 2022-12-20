{{-- side bar --}}
<div class="col-span-1 ">
   <a href="{{ route('dashboard') }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg 
   shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('dashboard'))  bg-gray-200 @endif   ">
      Dashboard
   </a>
   <a href="{{route('courses.index')}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg 
   shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('courses.index'))  bg-gray-200 @endif   ">
      Courses
   </a>

   <a href="{{route('student.index')}}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg 
   shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('student.index'))  bg-gray-200 @endif   ">
      Students
   </a>

   {{-- These routes are not meant for instructors --}}
   {{-- <a href="{{ route('learning_preference.index') }}" class="block max-w-sm p-6 bg-white border border-gray-200 
   rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('learning_preference.index'))  bg-gray-200 @endif   ">
      Learning preference
   </a>

   <a href="{{ route('learning_preference.edit', auth()->user()->preferences()->first()->id ) }}" class="block max-w-sm p-6 bg-white border border-gray-200 
   rounded-lg shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700
      @if (request()->routeIs('learning_preference.edit'))  bg-gray-200 @endif   ">
      Configure Preferences
   </a> --}}

</div>