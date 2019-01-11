<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Draft</title>

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
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">

        <form method="POST" action="/Statistics">
            <?php echo csrf_field(); ?>
            <div class="title m-b-md">
                Drafting...
            </div>
            <div class="section-title">
                Desired card: <b><?php echo e(Session::get('selectedSuit')); ?><?php echo e(Session::get('selectedValue')); ?></b><br><br>
            </div>
            <div class="section-title">
                The probability of getting the <?php echo e(Session::get('selectedSuit')); ?><?php echo e(Session::get('selectedValue')); ?> is <?php echo e(Session::get('prob')); ?> %<br><br>
            </div>
            <div class="section-title">
                Drafted Cards:<br>
                <table style="width:100%" align="center">
                    <tr>
                        <?php for($i = 0; $i < 13; $i++): ?>
                        <td align="center">
                            <?php if(Session::get('game')->getCards()[$i][2]): ?>
                                <img src="<?php echo e(URL::asset('img/check.png')); ?>" class="img-fluid" style="max-height:30px; vertical-align: bottom;"><br><br>
                            <?php else: ?>
                                <img src="<?php echo e(URL::asset('img/backside.png')); ?>" class="img-fluid" style="max-height:50px;"><br>
                            <?php endif; ?>
                            <?php echo e(Session::get('game')->getCards()[$i][0]); ?><?php echo e(Session::get('game')->getCards()[$i][1]); ?>

                        </td>
                        <?php endfor; ?>
                    </tr>
                    <tr>
                        <?php for($i = 13; $i < 26; $i++): ?>
                            <td align="center">
                                <?php if(Session::get('game')->getCards()[$i][2]): ?>
                                    <img src="<?php echo e(URL::asset('img/check.png')); ?>" class="img-fluid" style="max-height:30px; vertical-align: bottom;"><br><br>
                                <?php else: ?>
                                    <img src="<?php echo e(URL::asset('img/backside.png')); ?>" class="img-fluid" style="max-height:50px;"><br>
                                <?php endif; ?>
                                <?php echo e(Session::get('game')->getCards()[$i][0]); ?><?php echo e(Session::get('game')->getCards()[$i][1]); ?>

                            </td>
                        <?php endfor; ?>
                    </tr>
                    <tr>
                        <?php for($i = 26; $i < 39; $i++): ?>
                            <td align="center">
                                <?php if(Session::get('game')->getCards()[$i][2]): ?>
                                    <img src="<?php echo e(URL::asset('img/check.png')); ?>" class="img-fluid" style="max-height:30px; vertical-align: bottom;"><br><br>
                                <?php else: ?>
                                    <img src="<?php echo e(URL::asset('img/backside.png')); ?>" class="img-fluid" style="max-height:50px;"><br>
                                <?php endif; ?>
                                <?php echo e(Session::get('game')->getCards()[$i][0]); ?><?php echo e(Session::get('game')->getCards()[$i][1]); ?>

                            </td>
                        <?php endfor; ?>
                    </tr>
                    <tr>
                        <?php for($i = 39; $i < 52; $i++): ?>
                            <td align="center">
                                <?php if(Session::get('game')->getCards()[$i][2]): ?>
                                    <img src="<?php echo e(URL::asset('img/check.png')); ?>" class="img-fluid" style="max-height:30px; vertical-align: bottom;"><br><br>
                                <?php else: ?>
                                    <img src="<?php echo e(URL::asset('img/backside.png')); ?>" class="img-fluid" style="max-height:50px;"><br>
                                <?php endif; ?>
                                <?php echo e(Session::get('game')->getCards()[$i][0]); ?><?php echo e(Session::get('game')->getCards()[$i][1]); ?>

                            </td>
                        <?php endfor; ?>
                    </tr>
                </table>
            </div>
            <div class="form-group row" align="center">
                <div class="col-md-12" align="center">
                    <br>
                    <table width="100%" align="center">
                        <tr width="100%" align="center">
                            <td width="40%" align="center"></td>
                            <td width="20%" align="center">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Draft
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
                            <td width="30%" align="center"></td>
                            <td width="40%" align="center">
                                <div class="links">
                                    <a href="/">Go Home</a>
                                </div>
                            </td>
                            <td width="30%" align="center"></td>
                        </tr>
                    </table>

                </div>
            </div>

        </form>



    </div>


</div>
</body>
</html>