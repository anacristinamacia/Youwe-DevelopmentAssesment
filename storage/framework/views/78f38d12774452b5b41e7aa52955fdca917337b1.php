<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game</title>

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
    <?php if(Session::get('success')): ?>
        <div class="row">
            <div class="alert alert-dismissible alert-success" align="center" style="font-size: 18px;">
                <strong>Got it!</strong> The chance of getting <?php echo e(Session::get('selectedSuit')); ?><?php echo e(Session::get('selectedValue')); ?> was <?php echo e(Session::get('prob')); ?>%
            </div>
        </div>
    <?php endif; ?>
<form method="POST" action="/FirstDraft">
    <?php echo csrf_field(); ?>
        <div class="title m-b-md">
            Test 1: Poker chance calculator
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <table align="center" width="100%">
                    <tr>
                        <td align="right" width="35%"></td>
                        <td align="center" width="15%">
                            Insert the desired card:
                        </td>
                        <td align="center" width="7%">
                            <select class="form-control" id="suit" name="suit">
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="H">H</option>
                                <option value="S">S</option>
                            </select>
                        </td>
                        <td align="center" width="7%">
                            <select class="form-control" id="value" name="value">
                                <option value="A">A</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="J">J</option>
                                <option value="Q">Q</option>
                                <option value="K">K</option>
                            </select>
                        </td>
                        <td align="right" width="40%"></td>
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
                        Start
                    </button>
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