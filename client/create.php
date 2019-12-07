<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <title>Nouveau client</title>
</head>
<body>
    <?php
        if (!empty($_POST)) {
            include './classes/client.class.php';
            $client = new Client;
            $client->addNewClient($_POST['cid'],$_POST['name'], $_POST['email'], $_POST['pwd'], $_POST['phone'], $_POST['adresse']);
            header('Location:index.php?notif=add');
            exit();
        }
    ?>
    <div class="container py-3">
        <div class="jumbotron text-center">
            <h3>Ajouter un nouveau client</h3>
        </div>
        <fieldset>
            <legend>Nouveau client</legend>
            <form action="" method="post">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                            <label for="cid">cid</label>
                            <input type="text" required name="cid" class="form-control" id="cid">
                        </div>
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" required name="name" class="form-control" id="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">email</label>
                            <input type="text" required name="email" class="form-control" id="email">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="dateN">pwd</label>
                            <input type="text" required name="pwd" class="form-control" id="pwd">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" required name="phone" class="form-control" id="phone">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="adresse">Adresse</label>
                            <input type="text" name="adresse" id="adresse" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-block btn-outline-primary">Enregistrer</button>
                    </div>
                    <div class="col-md-6">
                        <button type="reset" class="btn btn-block btn-outline-secondary">Annuler</button>
                    </div>
                </div>
            </form>
        </fieldset>
    </div>
</body>
</html>