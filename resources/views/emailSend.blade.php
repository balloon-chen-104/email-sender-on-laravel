<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Email</title>
</head>
<body>
    <div class="container">
        
        <?php if(!empty($_SESSION['email_message'])) echo '<br>'; ?>
        <?php flash('email_message'); ?>

        {!! $data['body'] !!}

        <div class="card card-body bg-light mt-3">
            <h3>Send Email</h3>
            <p>Send an email with this form</p>
            <form action="/send" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_error'])) ? 'is-invalid' : ''; ?>" value="{{ $data['name'] }}">
                    <span class="invalid-feedback">{{ $data['name_error'] }}</span>
                </div>
                <div class="form-group">
                    <label for="sendTo">SendTo: <sup>*</sup></label>
                    <input type="text" name="sendTo" class="form-control form-control-lg <?php echo (!empty($data['sendTo_error'])) ? 'is-invalid' : ''; ?>" value="{{ $data['sendTo'] }}">
                    <span class="invalid-feedback">{{ $data['sendTo_error'] }}</span>
                </div>
                <div class="form-group">
                    <label for="title">Title: <sup>*</sup></label>
                    <input type="text" name="title" class="form-control form-control-lg <?php echo (!empty($data['title_error'])) ? 'is-invalid' : ''; ?>" value="{{ $data['title'] }}">
                    <span class="invalid-feedback">{{ $data['title_error'] }}</span>
                </div>
                <div class="form-group">
                    <label for="body">Body: <sup>*</sup></label>
                    <textarea rows="3" name="body" class="form-control form-control-lg <?php echo (!empty($data['body_error'])) ? 'is-invalid' : ''; ?>">{{ $data['body'] }}</textarea>
                    <span class="invalid-feedback">{{ $data['body_error'] }}</span>
                </div>
                <input type="submit" class="btn btn-success" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
