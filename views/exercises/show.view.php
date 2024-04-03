<?php view('partials/head.php'); ?>
<?php view('partials/nav.php'); ?>

<div class="container mx-auto px-4">
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Exercise Information</h2>

        <!-- Exercise details -->
        <table class="table-auto w-full bg-gray-100 rounded-lg p-4 mb-4">
            <tbody>
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Exercise Name:</td>
                    <td class="text-gray-700"><?= htmlspecialchars($exercise['name']) ?></td>
                </tr>
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Target:</td>
                    <td class="text-gray-700"><?= htmlspecialchars($exercise['target']) ?></td>
                </tr>
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Body Part:</td>
                    <td class="text-gray-700"><?= htmlspecialchars($exercise['bodyPart']) ?></td>
                </tr>
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Equipment:</td>
                    <td class="text-gray-700"><?= htmlspecialchars($exercise['equipment']) ?></td>
                </tr>               
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Secondary Muscles:</td>
                    <td>
                      <ul>
  
                        <?php foreach ($exercise['secondaryMuscles'] as $secondary) : ?>
                          <li>
                            <?=   htmlspecialchars($secondary) ?>
                          </li>
                        <?php endforeach; ?>   
                      
                      </ul>
                    </td>
                </tr>
                <tr class="hover:bg-blue-300">
                    <td class="font-semibold">Instructions:</td>
                    <td>
                      <ul>
  
                        <?php foreach ($exercise['instructions'] as $instructions) : ?>
                          <li>
                            <?=   htmlspecialchars($instructions) ?>
                          </li>
                        <?php endforeach; ?>   
                      
                      </ul>
                    </td>
                </tr>
                
            </tbody>

        </table>

        <picture>
          <img src="<?= htmlspecialchars($exercise['gifUrl']) ?>" alt="Excersise">
        </picture>

    </div>
</div>


<?php view('partials/footer.php'); ?>