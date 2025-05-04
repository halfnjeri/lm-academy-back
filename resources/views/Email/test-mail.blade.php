<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ypur site description">
    <meta name="keywords" content="your, keywords, here">
    <title>{{{config ('app.name')}}}</title>

<body>
   <main>
        <section>
            <h1>welcome to our web: {{{config ('app.name')}}}</h1>
            <h2>{{ $data['title']}}</h2>
            <h3>{{ $data['message']}}</h3>
            <h2>This is a test e-mail.</h2>
            <p style="color:red;">Please do not replay.</p>
            <h2>{{$data ['session_title']}}</h2>
        </section>
   </main>

   <footer>
        <p>you so cool</p>
   </footer>

</body>
</html>
