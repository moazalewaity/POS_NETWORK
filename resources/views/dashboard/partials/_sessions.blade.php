@if (session('success'))
    <script>
        new Noty({
            type: 'success',
            layout: 'topLeft',
            text: "{{session('success') }}",
            killer: true,
            timeout: 2000,
        }).show();
    </script>
@endif