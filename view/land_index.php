<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-condensed">
            <thead>
            <tr>
                <th>Country</th>
                <th>Language</th>
                <th>Population(in Millions)</th>
            </tr>
            </thead>
            <tbody>
            <?php
            // Schleife über alle Kontakte, die jeweils in einer Tabellenzeile angezeigt werden.
            foreach($countries as $country) {
                echo "<tr>
				<td><a class='land_a' href='recipe?country=$country->country'>".$country->country."</a></td>
				<td>".$country->language."</td>
				<td>".$country->population."</td>
				</tr>\n";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>