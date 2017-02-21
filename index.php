<?php
session_start();
require_once'helpers/security.php';
$errors=isset($_SESSION['errors'])?$_SESSION['errors']:[];
$fields=isset($_SESSION['fields'])?$_SESSION['fields']:[];
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <script src="jquery-3.1.1.min.js"></script>
        <title>Contact Form</title>
    </head>
    <body>
        <div class="container">
            <div class="contact">
                <div class="panel">
                    <?php if(!empty($errors)):?>
                    <div class="panel">
                        <ul><li><?php echo implode('</li> <li>', $errors)?></li></ul>
                    </div>
                <?php endif; ?>
                </div>
                <h3>Contact Form</h3>
                <form action="contact.php" method="post">
                    <div class="form-group">
                        <label for="name">Your Name *</label>
                        <input type="text" name="name" autocomplete="off" class="form-control" placeholder="Enter Name" <?php echo isset ($fields['name'])? 'value="'.e($fields['name']).'"':''?>>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email address * </label>
                            <input type="email" name="email" autocomplete="off" class="form-control" placeholder="Enter Email"<?php echo isset ($fields['email'])? 'value="'.e($fields['email']).'"':''?>>
                    </div>
                    <div class="form-group" >
                        <label for="message">Your Message *</label>
                            <textarea class="form-control" rows="8" id="comment" name="message"<?php echo isset ($fields['message'])? e($fields['message']):''?>></textarea>
                        <br>

                        <input type="submit" value="Send" class="form-control" class="btn btn-primary">
                    </div>
                    <p class="muted">* means a required field</p>
                </form>
            </div>
        </div>
    </body>
</html>

<?php
unset($_SESSION['errors']);
unset($_SESSION['fields']);
?>