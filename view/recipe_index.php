<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Picture</th>
                <th>Name</th>
                <th>Culture</th>
                <th>History</th>
                <th>Description</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($recipes as $recipe) {
                echo "<tr>
                <td><img id='foodpic' src=$recipe->recipe_picture></td>
				<td><a class='land_a' href='recipe/ingredients?recipe=$recipe->recipe&rid=$recipe->recipe_id'>".$recipe->recipe."</a></td>
				<td>".$recipe->culture."</td>
				<td>".$recipe->history."</td>
				<td>".$recipe->description."</td>
				</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>