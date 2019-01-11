<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Phrase</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
html, body {
    background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
    height: 100vh;
            }

            .flex-center {
    align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
    position: relative;
}

            .top-right {
    position: absolute;
    right: 10px;
                top: 18px;
            }

            .content {
    text-align: center;
            }

            .title {
    font-size: 84px;
            }

            .links > a {
    color: #636b6f;
    padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
    margin-bottom: 30px;
            }

            .alert-success {
    color: #1d643b;

            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
<div class="content">
    <?php if(Session::get('error')): ?>
        <div class="row">
            <div class="alert alert-dismissible alert-danger" align="center" style="font-size: 18px;">
                <strong>Error!</strong> The phrase can't be longer than 255 characters.
            </div>
        </div>
    <?php endif; ?>
<form method="POST" action="/InsertPhrase">
    <?php echo csrf_field(); ?>
        <div class="title m-b-md">
            Test 2: Phrase Analyzer
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <table align="center" width="100%">
                    <tr>
                        <td align="right" width="10%"></td>
                        <td align="center" width="30%">
                            Insert the phrase you want to analyze:
                        </td>
                        <td align="center" width="50%">
                            <input id="phrase" type="text" class="form-control<?php echo e(Session::has('phrase') ? ' is-invalid' : ''); ?>" name="phrase" value="<?php echo e(old('phrase')); ?>">
                            <?php if(Session::has('phrase')): ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e(Session::get('phrase')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </td>
                        <td align="right" width="10%"></td>
                    </tr>
                </table>
            </div>


        </div>
    <div class="form-group row" align="center">
    <div class="col-md-12" align="center">
        <br>
        <table width="100%" align="center">
            <tr width="100%" align="center">
                <td width="40%" align="center"></td>
                <td width="20%" align="center">
                    <button type="submit" class="btn btn-primary btn-block">
                        Analyze
                    </button>
                </td>
                <td width="40%" align="center"></td>
            </tr>
        </table>

    </div>
    </div>
    <div class="form-group row" align="center">
        <div class="col-md-12" align="center">
            <br>
            <table width="100%" align="center">
                <tr width="100%" align="center">
                    <td width="40%" align="center"></td>
                    <td width="20%" align="center">
                        <div class="links">
                            <a href="/">Go Home</a>
                        </div>
                    </td>
                    <td width="40%" align="center"></td>
                </tr>
            </table>

        </div>
    </div>

</form>

</div>


</div>
</body>
</html>