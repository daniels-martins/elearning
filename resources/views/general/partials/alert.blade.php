@if (session('warning') or session('success') or session('danger') or session('status'))
    <?php
    $icon = '';
    $title = '';
    if (session('warning')) {
        $icon = 'warning';
        $title = 'Oops!';
    } elseif (session('success')) {
        $icon = 'success';
        $title = 'Good job!';
    } elseif (session('info') or session('status'))  {
        $icon = 'info';
        $title = 'Info!';
    } elseif (session('error') or sesion('danger')) {
        $icon = 'error';
        $title = 'Oops!';

    }
    
    ?>
    @php $message = session('warning') ?? session('success') ?? session('danger') ?? session('status') @endphp
    {{-- <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
        class="text-2xl p-4 text-gray-600 bg-blue-400">
        {{ $message }}</p> --}}
    <script>
        swal({
            title: "{{ $title }}",
            text: "{{ $message }}",
            icon: "{{ $icon }}",
            button: false,
            timer: 1000,
        });
    </script>
@endif
