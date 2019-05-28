<?php
/**
 * Created by PhpStorm.
 * User: abuzar
 * Date: 3-3-2019
 * Time: 20:43
 */

require "view/partials/header.php";
?>

    <div class="container mt-5">
            <div class="card">
            <h1 align="center">Reserveren</h1>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="naam">Naam</label>
                            <input type="text" class="form-control" id="naam" placeholder="naam" name="naam">
                        </div>
                        <div class="form-group">
                            <label for="telefoon">Telefoon nummer</label>
                            <input type="text" class="form-control" id="telefoon" placeholder="telefoon" name="telefoon">
                        </div>
                        <div class="form-group">
                            <label for="aantal">Aantal personen</label>
                            <input type="number" class="form-control" id="aantal" placeholder="aantal" name="aantal">
                        </div>

                        <div class="form-group">
                            <label for="date">Datum & Tijd</label>
                            <input type="datetime-local" class="form-control" id="date" name="date">
                        </div>


                        <div class="form-group">
                            <label for="tafel">Tafel</label>
                            <input type="number" class="form-control" id="tafel" name="tafel">
                        </div>

                        <div class="form-group">
                            <label for="opmerking">Opmerking</label>
                            <textarea type="text" class="form-control" id="opmerking" placeholder="opmerking" name="opmerking">
                            </textarea>
                        </div>

                        <button name="submit" type="submit" name="submit" class="btn btn-success btn-lg btn-block">Done</button>

                        <?php if ($_GET['success'] ?? false): ?>
                            <br>
                            <br>
                            <div class="alert alert-success">
                                Reservering geplaatst.
                            </div>
                        <?php endif; ?>
                        <?php if ($_GET['fail'] ?? false): ?>
                            <br>
                            <br>
                            <div class="alert alert-success">
                                Bericht is niet verzonden!
                            </div>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
    </div>

<?php
require "view/partials/footer.php";
?>