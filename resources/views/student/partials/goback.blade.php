<div class="mb-7">
    <span class="cursor-pointer hover:bg-gray-300" onclick="goback()">&#8592;
        Back</span>
</div>

<script>
    function goback() {
        let source_and_destination_areTheSame = document.referrer == window.location.href;
        let numofRedirects = 0;
        if (source_and_destination_areTheSame)
            window.location.href = '/dashboard'
        else
            window.history.back()
    }
</script>
