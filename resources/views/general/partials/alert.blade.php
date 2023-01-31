@if (session('warning') or session('success') or session('danger') or session('status'))
    @php $message = session('warning') ?? session('success') ?? session('danger') ?? session('status') @endphp
        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-2xl p-4 text-gray-600 bg-blue-400">
            {{ $message }}</p>
@endif
