<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game</title>

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
            <div class="form-group row">
                <label for="card" class="col-md-2 col-form-label text-md-right">Desired card: </label>

                <select class="form-control" id="suit" name="suit">
                    <option value="<?php echo e($selectedSuit); ?>"><?php echo e($selectedSuit); ?></option>
                </select>
                <select class="form-control" id="value" name="value">
                    <option value="<?php echo e($selectedValue); ?>"><?php echo e($selectedValue); ?></option>

                </select>

            </div>
            <div class="section-title">
                The probability of getting the <?php echo e($selectedSuit); ?><?php echo e($selectedValue); ?> is <?php echo e($prob); ?> %
            </div>
            <div class="section-title">
                Drafted Cards:
                <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($card[2] == true): ?>
                        <?php echo e($card[0]); ?><?php echo e($card[1]); ?>

                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-2 offset-md-10">
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">
                        Draft
                    </button>

                </div>
            </div>
        </form>

    </div>


</div>
</body>
</html>