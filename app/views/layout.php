<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>3 Column Layout</title>
    <style type="text/css">

        body {
            min-width: 630px;
        }

        * html body {
            overflow: hidden;
        }

        * html {
            float: left;
            position: relative;
            width: 100%;
            padding-bottom: 10010px;
            margin-bottom: -10000px;
            background: #fff;
        }

        body {
            margin: 0;
            padding: 0;
            font-family:Sans-serif;
            line-height: 1.5em;
        }

        header {
            background-color: #f0f;
            margin: 0;
            padding: 15px 10px;
        }

        nav {
            margin: 30px;
            padding: 20px 75px;
            border: 1px solid #537D71;
            background-color: #B6DED2;
        }

        .pull-left {
            float: left;
        }

        .clear {
            clear: both;
        }


    </style>

</head>

<body>

<header>
    <h1>DezByte</h1>
</header>

<div id="container">

    <nav class="column pull-left">
        <h3>Left heading</h3>
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
            <li><a href="#">Link 5</a></li>
        </ul>
        <h3>Left heading</h3>
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
            <li><a href="#">Link 5</a></li>
        </ul>
    </nav>

    <main class="column pull-left">
        <article>

            <h1>Heading</h1>
            <p>
                <?= $this->section( 'content' ); ?>
            </p>

        </article>
    </main>

</div>

</body>

</html>