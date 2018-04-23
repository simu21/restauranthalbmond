<div class="row">
    <div class="col-sm-4" id="ingridients">
        <h2>My profile picture</h2>
        <div id="recipepic">
            <?php
            foreach($userdata as $user) {
                echo "<img id='recipepic' src=$user->user_picture>";
            }
            ?>
        </div>
        <h2>Change Profile picture</h2>
        <form class="upload_form" action="upload" method="post" enctype="multipart/form-data">
            <input class="input_format" type="file" name="datei"><br>
            <input class="input_format" type="submit" value="Hochladen">
        </form>
        <?php
        if(isset($_GET['uploaderror'])) {
            if($_GET['uploaderror'] == 'type') {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                <p>Diese Datei ist als Bild nicht geeignet.</p>
             </div>";
            } else {
                echo "<div class=\"alert alert-danger\" role=\"alert\">
                <p>Diese Datei ist zu gross.</p>
             </div>";
            }

        }
        ?>
    </div>
    <div class="col-sm-4" id="ingridients">
        <h2>Userdata</h2>
        <?php foreach ($userdata as $user): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $user->firstname; ?> <?= $user->lastname; ?></div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $user->email; ?> </div>
            </div>
        <?php endforeach ?>
        <button id='delete_profile_btn' class="input_format">Delete my Profile</button>
        <button id='update_profile_btn' onclick="location.href='/user/update'" class="input_format">Update my Profile</button>
    </div>
<script>
    jQuery(function() {
        $('#delete_profile_btn').click(function() {

            var r = confirm("Do you really wanna DELETE your profile?");
            console.log(r);
            if (r) {
                document.location.href = '/user/delete';
            }
        });
    });
</script>