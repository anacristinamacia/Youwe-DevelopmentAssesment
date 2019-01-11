<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Analyze</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type= "text/javascript" src="<?php echo e(asset('js/jquery.js')); ?>"></script>
        <script type= "text/javascript" src="<?php echo e(asset('tab_divider/tab_divider.js')); ?>"></script>
        <script type= "text/javascript" src="<?php echo e(asset('tab_divider/tab_divider_bootstrap.js')); ?>"></script>


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

<form method="POST" action="/InsertPhrase">
    <?php echo csrf_field(); ?>
        <div class="title m-b-md">
            Analyzer
        </div>
    <div class="section-title">
        Phrase to analyze: <b><?php echo e(Session::get('analyzer')->getStringPhrase()); ?></b><br><br>
    </div>
    <div class="section-title" align="center">
                <table class="table table-striped table-bordered table-sm" align="center" width="1000px">
                    <thead>
                    <tr class="table-secondary">
                        <th style="text-align:center" width="150px">
                            Char
                        </th>
                        <th style="text-align:center" width="150px">
                            Times
                        </th>
                        <th style="text-align:center" width="250px">
                            Before
                        </th>
                        <th style="text-align:center" width="250px">
                            After
                        </th>
                        <th style="text-align:center" width="200px">
                            Max-Distance
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = Session::get('analyzer')->getPhrase(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $phrase): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td style="text-align:center" width="150px">
                            <?php echo e($phrase->getChar()); ?>

                        </td>
                        <td style="text-align:center" width="150px">
                            <?php echo e($phrase->getTimes()); ?>

                        </td>
                        <td style="text-align:center" width="250px">
                            <?php if(empty($phrase->getBefore())): ?>
                                none
                            <?php else: ?>
                                <?php for($i = 0; $i < sizeof($phrase->getBefore()); $i++): ?>
                                    <?php echo e($phrase->getBefore()[$i]); ?>

                                    <?php if($i + 1 < sizeof($phrase->getBefore())): ?>
                                        ,
                                    <?php endif; ?>
                                <?php endfor; ?>
                            <?php endif; ?>

                        </td>
                        <td style="text-align:center" width="250px">
                            <?php if(empty($phrase->getAfter())): ?>
                                none
                            <?php else: ?>
                                <?php for($i = 0; $i < sizeof($phrase->getAfter()); $i++): ?>
                                    <?php echo e($phrase->getAfter()[$i]); ?>

                                    <?php if($i + 1 < sizeof($phrase->getAfter())): ?>
                                        ,
                                    <?php endif; ?>
                                <?php endfor; ?>
                            <?php endif; ?>
                        </td>
                        <td style="text-align:center" width="200px">
                            <?php echo e($phrase->getMaxDist()); ?>

                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>

                </table>
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