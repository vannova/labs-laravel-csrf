<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CSRF</title>
    </head>
    <body>
        <form id="form">
            <input type="text" name="foo" value="bar"/>
            <input type="submit"/>
        </form>
        <div id="result"></div>

        <script src="https://code.jquery.com/jquery-3.4.1.js" crossorigin="anonymous"></script>
        <script>
            $('#form').submit(function (e) {
                e.preventDefault();
                
                $.ajax({
                    type: 'POST',
                    url: 'welcome',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'foo': $('input[name="foo"]').val()
                    },
                    success: function (res) {
                        $('#result').text(res);
                    }
                });
            });
        </script>
    </body>
</html>
