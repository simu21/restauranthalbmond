<div class="row">
        <div class="col-sm-4" id="ingridients">
            <div id="recipepic">
                <?php
                foreach($recipes as $recipe) {
                    echo "<img id='recipepic' src=$recipe->recipe_picture>";
                }
                ?>
            </div>
        </div>
        <div class="col-sm-4" id="ingridients">
            <h2>Recipe</h2>
            <?php
            foreach($ingredients as $ingredient) {
                echo "
                 ".$ingredient->ingredient." ".$ingredient->quantity."<br>
                 \n ";
            }
            ?>
        </div>
    <div class="col-sm-4" id="ingridients">
        <h3>Description</h3>
        <?php
        foreach($recipes as $recipe) {
            echo $recipe->description;
        }
        ?>
    </div>
    <div class="col-sm-4" id="ingridients">
        <h3>History</h3>
        <?php
        foreach($recipes as $recipe) {
            echo $recipe->history;
        }
        ?>
    </div>
</div>