<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container margin-top-20">
    <h3>Add New App</h3>
    <hr />
    <form method="post" action="/applications-list/create">
        <?php
        if ($msg == 'error') { ?>
            <div class="alert alert-danger" role="alert">
                There is something wrong, please try again later...
            </div>
        <?php
        }
        elseif ($msg == 'success') { ?>
            <div class="alert alert-success" role="alert">
                Data was added successfully
            </div>
        <?php
        }
        ?>        
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">App Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" required />
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="link" placeholder="http://example.com" required />
            </div>
        </div>
        <input class="btn btn-primary" type="submit" value="submit"/>
    </form>
</div>